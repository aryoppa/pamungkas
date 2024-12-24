<?php

namespace App\Http\Controllers;

use App\Models\PaymentRequest;
use App\Http\Controllers\Controller;
use App\Models\TransactionHistory;
use App\Models\UserBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public static function reduceUserBalance($nominal, $label)
    {
        $user = Auth::user();
        $userBalance = UserBalance::where('user_id', $user->id)->first();
        if ($userBalance) {
            if ($userBalance->is_premium == '1') {
                TransactionHistory::insert([
                    'user_id' => $user->id,
                    'label' => $label,
                    'deducted' => '0',
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            } else {
                $newBalance = $userBalance->balance - $nominal;
                if ($newBalance >= 0) {
                    $userBalance->update(['balance' => $newBalance]);
                    TransactionHistory::insert([
                        'user_id' => $user->id,
                        'label' => $label,
                        'deducted' => $nominal,
                        'created_at' => date('Y-m-d H:i:s'),
                    ]);
                } else {
                    $message = "Saldo Anda tidak mencukupi untuk melakukan Generate. Saldo minimal Rp500 diperlukan.";
                    return redirect()->back()->with('error', $message);
                }
            }

        }
    }


    public function topUp(Request $request)
    {
        $user = Auth::user();
        $topupAmount = $request->input('topup_amount');
        $paymentMethod = $request->input('payment_method');
        $paymentProof = $request->file('payment_proof');

        // Validate the top-up amount (minimum Rp10,000)
        if ($topupAmount < 10000) {
            return redirect()->back()->with('error', 'Minimal top-up Rp10.000');
        }

        // Save the payment proof file
        if ($paymentProof) {
            $filename = $paymentProof->store('payment_proofs', 'public');
        } else {
            return redirect()->back()->with('error', 'Bukti pembayaran belum diunggah.');
        }

        // Create a new payment request entry
        $paymentRequest = new PaymentRequest();
        $paymentRequest->user_id = $user->id;
        $paymentRequest->payment_request = 'request';
        $paymentRequest->payment_receipt = $filename;
        $paymentRequest->balance = $topupAmount;
        $paymentRequest->save();

        return redirect()->back()->with('success', 'Permintaan top-up berhasil diajukan. Tunggu verifikasi dari admin.');
    }

    


}
