<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearningCollection;
use App\Models\PaymentRequest;
use App\Models\UpgradeRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserBalance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages/AdminPages/dashboard');
    }

    public function user_dashboard()
    {
        $users = User::paginate(10);
        return view('pages/AdminPages/user_dashboard', compact(['users']));
    }

    public function learning()
    {
        $learning = LearningCollection::paginate(10);
        return view('pages/AdminPages/learning_page', compact(['learning']));
    }

    public function payment_request()
    {
        // $data = DB::table('users')->join('payment_requests', 'users.id', '=', 'payment_requests.user_id')->where('payment_request', 'request')->get();
        $data = DB::table('users')->join('payment_requests', 'users.id', '=', 'payment_requests.user_id')->get();
        return view('pages/AdminPages/payment_request')->with('datas', $data);
    }
    public function premium_request()
    {
        // $data = DB::table('users')->join('payment_requests', 'users.id', '=', 'payment_requests.user_id')->where('payment_request', 'request')->get();
        $data = DB::table('users')->join('premium_requests', 'users.id', '=', 'premium_requests.user_id')->get();
        return view('pages/AdminPages/premium_request')->with('datas', $data);
    }

    public function decline_request(Request $request)
    {
        $request = PaymentRequest::find($request->id);
        $request->payment_request = 'failed';
        $request->save();
        return redirect('/payment-request');    
    }

    public function accept_request(Request $request)
    {
        // Ambil data request top-up
        $prData = PaymentRequest::find($request->prid);

        if ($prData->balance !=null) {
            $balanceToAdd = $prData->balance;

            // Update balance user
            $user = User::find($prData->user_id);
            $userBalance = UserBalance::where('user_id', $user->id)->first();
            $newBalance = $userBalance->balance + $balanceToAdd;
            $userBalance->update(['balance' => $newBalance]);

            // Ubah status request menjadi 'success'
            $prData->payment_request = 'success';
            $prData->save();

            // Redirect kembali ke halaman payment request
            return redirect('/payment-request');
        }
    }

    public function accept_request_premium (Request $request)
    {
        $prData = UpgradeRequest::find($request->prid);
        $ExpiredDateToAdd = $prData->expired_at;
        $user = User::find($prData->user_id);
        $userBalance = UserBalance::where('user_id', $user->id)->first();
        $newBalance = $userBalance->is_premium = '1';
        $newExpired = $userBalance->expired_at = $ExpiredDateToAdd;
        $userBalance->update(['is_premium' => $newBalance, 'expired_at' => $newExpired]);

        // Ubah status request menjadi 'success'
        $prData->upgrade_request = 'success';
        $prData->save();

        // Redirect kembali ke halaman payment request
        return redirect('/premium-request');
    }
}
