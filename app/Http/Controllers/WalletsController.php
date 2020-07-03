<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
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
            if ($sender->wallet->balance >= $request->amount) {

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
}
