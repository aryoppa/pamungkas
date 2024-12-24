<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserBalance;
use App\Models\LearningCollection;
use App\Models\PaymentRequest;
use App\Models\UpgradeRequest;
use App\Models\TransactionHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class UserController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function setcookie()
    {
        if (is_null(Cookie::get('uuid'))) {
            return redirect('/demo/dashboard')->withCookie(cookie()->forever('uuid', Str::uuid()));
        } else return redirect('/demo/dashboard');
    }

    public function demo()
    {
        return view('demo');
    }

    public function about()
    {
        return view('pages/UserPages/about');
    }

    public function profile()
    {
        return view('pages/UserPages/profile');
    }
    public function balance()
    {
        $history = TransactionHistory::where('user_id',Auth::id())->get();
        return view('pages/UserPages/balance')->with('history', $history);
    }
    public function top_up()
    {
        return view('pages/UserPages/UserTopUp');
    }

    public function user_guide()
    {
        return view('pages/UserPages/user_guide');
    }

    public function learn()
    {
        $learningCollections = LearningCollection::all();
        return view('pages/UserPages/learn', ['learning' => $learningCollections]);
    }

    public function upgrade_account()
    {
        return view('pages/UserPages/upgrade_account');
    }

    public function user()
    {
        return view('pages/UserPages/user');
    }

    public function account_information()
    {
        return view('pages/UserPages/account_information');
    }

    public function plan_option(Request $request)
    {
        $selectedPlan = null;
        $endDate = null;
        $prize = null;
        $plan = $request->input('plan');

        if ($plan == '1-month') {
            $selectedPlan = '1 BULAN';
            $prize = 50000;
            $endDate = date('Y-m-d', strtotime('+1 month'));
        } elseif ($plan == '3-month') {
            $selectedPlan = '3 BULAN';
            $prize = 120000;
            $endDate = date('Y-m-d', strtotime('+3 months'));
        } elseif ($plan == '6-month') {
            $selectedPlan = '6 BULAN';
            $prize = 180000;
            $endDate = date('Y-m-d', strtotime('+6 months'));
        } elseif ($plan == '12-month') {
            $selectedPlan = '12 BULAN';
            $prize = 240000;
            $endDate = date('Y-m-d', strtotime('+12 months'));
        }

        return view('pages/UserPages.plan_option', compact('selectedPlan', 'endDate', 'prize'));
    }

    public function payment()
    {
        return view('pages/UserPages/payment');
    }

    public function success_upgrade()
    {
        return view('pages/UserPages/success_upgrade');
    }

    public function store_payment(Request $request)
    {
        $paymentReceiptFile = $request->file('payment_receipt');
        $fileName = $paymentReceiptFile->getClientOriginalName();

        // Simpan file ke direktori paymentReceipt di dalam storage/app/public
        $path = $paymentReceiptFile->storeAs('paymentReceipt', $fileName, 'public');

        PaymentRequest::create([
            'user_id' => $request->user_id,
            'email' =>$request->email,
            'payment_request' => 'request',
            'payment_receipt' => $path, // Simpan path file yang dikirimkan oleh pengguna
            'balance' => $request->balance,
        ]);

        return redirect('/upgrade-account/success-upgrade');
    }

    public function checkout(Request $request){
        $order = PaymentRequest::create($request->all());

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->balance,
            ),
            'customer_details' => array(
                'user_id' => $request->user_id,
                'email' => $request->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('pages.UserPages.checkout', [
            'order' => $order,
            'snapToken' => $snapToken,
            'request' => $request
        ]);
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->payment_request.$request->gross_amount.$serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                // Temukan pesanan yang sesuai berdasarkan ID
                $order = PaymentRequest::find($request->order_id);

                if ($order) {
                    // Perbarui status pembayaran menjadi 'success'
                    $order->payment_request = 'success';
                    $order->save();

                    // Perbarui saldo pengguna
                    $user = User::find($order->user_id);
                    $userBalance = UserBalance::where('user_id', $user->id)->first();

                    // Tambahkan saldo baru dengan nilai dari pesanan
                    $newBalance = $userBalance->balance + $order->balance;
                    $userBalance->update(['balance' => $newBalance]);
                }
            }
        }
    }
    
    // public function callback(Request $request){
    //     $serverKey = config('midtrans.server_key');
    //     $hashed = hash("sha512", $request->order_id.$request->payment_request.$request->gross_amount.$serverKey);
    //     if($hashed == $request->signature_key){
    //         if ($request->transaction_status == 'capture' or $request->transaction_status == 'settlement') {
    //             $order = PaymentRequest::find($request->order_id);
    //             $order->update(['payment_request' => 'success']);
    //         }
    //     }
    // }

    public function invoice($id)
    {
        $order = PaymentRequest::find($id);
        return view('pages.UserPages.invoice', compact('order'));
    }

    public function store_upgrade(Request $request)
    {
        $upgradeReceiptFile = $request->file('upgrade_receipt');
        $fileName = $upgradeReceiptFile->getClientOriginalName();

        // Simpan file ke direktori paymentReceipt di dalam storage/app/public
        $path = $upgradeReceiptFile->storeAs('paymentReceipt', $fileName, 'public');

        upgradeRequest::create([
            'user_id' => $request->user_id,
            'upgrade_request' => 'request',
            'upgrade_receipt' => $path, // Simpan path file yang dikirimkan oleh pengguna
            'duration' => $request->duration,
            'expired_at' => $request->expired_at,
        ]);

        return redirect('/upgrade-account/success-upgrade');
    }


    public function view_detail($learning_id)
    {
        $learningCollections = LearningCollection::where('id', $learning_id)->get();
        return view('pages/UserPages/detail_learning', ['learning' => $learningCollections]);
    }

    public function question()
    {
        return view('pages/UserPages/question_type');
    }

    public function dashboard()
    {
        switch(Auth::user()->role_as){
            case 0:
                return Inertia::location('/home');
                break;
            case 1:
                return Inertia::location('/admin-dashboard');
                break;
        }
    }
}
