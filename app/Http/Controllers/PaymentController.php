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
            $paymentDetails['status'] == true ? Session::flash('success', 'Preload Successful!') : Session::flash('info', 'Preload failed!');;
            try {
                $id = $paymentDetails['data']['metadata']['customer_id'];
                $customer_wallet = Wallet::where('customer_id',$id)->first();
                $new_balance = $customer_wallet['balance'] + ($paymentDetails['data']['amount']/100);

                DB::beginTransaction();

                $customer_wallet->update(['balance' => $new_balance]);

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

//        ['data']['amount'];, transaction_date, ['metadata']['customer_id']
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
