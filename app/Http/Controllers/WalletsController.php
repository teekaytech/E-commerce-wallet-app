<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Wallet;
use App\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class WalletsController extends Controller
{
    public function new_transfer($id) {
        $customer = $this->fetch_customer($id);
        return view('pages.transfer', compact('customer'));
    }

    public function make_transfer(Request $request) {
        $this->validate($request, [
            'email' => ['required', 'email'],
            'amount'  => ['required', 'numeric']
        ]);

        $id = Session::get('customer');
        $sender = $this->fetch_customer($id);
        $receiver = Customer::where('email',$request->email)->with(['wallet'])->first();

        if ($receiver) {
            if ($this->update_wallet($sender->wallet->id, $receiver->wallet->id, $request->amount)) {
                Session::flash('success', 'Transfer Successful!');
            } else {
                Session::flash('error', 'Insufficient funds');
            }
        } else {
            Session::flash('error', 'Customer not found on this platform');
        }
        return back();
    }

    public function fetch_customer($id) {
        return Customer::where('id',$id)->with(['wallet'])->first();
    }

    public function update_wallet($sender_wallet_id, $receiver_wallet_id, $amount) {
        try {
            $sender_wallet = Wallet::where('id',$sender_wallet_id)->first();
            if ($sender_wallet->balance >= $amount) {
                DB::beginTransaction();

                $sender_balance = $sender_wallet->balance - $amount;
                $sender_wallet->update(['balance' => $sender_balance]);

                $receiver_wallet = Wallet::where('id', $receiver_wallet_id)->first();
                $receiver_balance = $receiver_wallet->balance + $amount;
                $receiver_wallet->update(['balance' => $receiver_balance]);

                WalletTransaction::create([
                    'sender_id' => $sender_wallet_id,
                    'receiver_id' => $receiver_wallet_id,
                    'amount' => $amount
                ]);

                DB::commit();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $exception) {
            DB::rollback();
            Log::info($exception->getMessage());
            return false;
        }
    }
}
