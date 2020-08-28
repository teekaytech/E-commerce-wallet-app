<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\PaystackTransaction;
use App\Wallet;
use App\WalletTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Paystack;

class PaymentController extends Controller {

    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function handleGatewayCallback() {
        $paymentDetails = Paystack::getPaymentData();

//        dd($paymentDetails['status']);
        if ($paymentDetails) {
            try {
                $id = $paymentDetails['data']['metadata']['customer_id'];
                $customer_wallet = Wallet::where('customer_id',$id)->first();
                $new_balance = $customer_wallet['balance'] + ($paymentDetails['data']['amount']/100);

                DB::beginTransaction();

                if ($paymentDetails['status'] == true) {
                    $customer_wallet->update(['balance' => $new_balance]);
                    Session::flash('success', 'Preload Successful!');
                } else {
                    Session::flash('info', 'Preload failed!');
                };


                PaystackTransaction::create([
                    'customer_id' => $id,
                    'reference' => $paymentDetails['data']['reference'],
                    'status' => $paymentDetails['data']['status'],
                    'amount' => $paymentDetails['data']['amount']/100,
                    'paid_at' => $paymentDetails['data']['paid_at'],
                ]);

                DB::commit();

            } catch (\Exception $exception) {
                DB::rollback();
                Log::info($exception->getMessage());
            }
        }
        return redirect(route('customer.preload_wallet',$id));

    }
}
