<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class CustomersController extends Controller
{

    public function login(Request $request) {
        $this->validate($request, [
            'email' => ['required', 'email']
        ]);

        $customer = Customer::where('email', $request->email)->first();
        Session::put('customer', $customer->id);

        if ($customer) {
            Session::flash('success', 'Login successful!');
            return redirect(route('customer.dashboard'));
        } else {
            Session::flash('info', 'Customer not found!');
            return back();
        }
    }

    public function dashboard() {
        $id = Session::get('customer');
        $customer = Customer::where('id', '=', $id)
                                ->with(['wallet', 'preload_transaction' => function($q){
                                        $q->orderBy('paystack_transactions.id', 'desc');}])
                                ->first();
        return view('pages.dashboard', compact('customer'));
    }

    public function logout() {
        Session::forget('customer');
        Session::flash('success', 'logout successful!');
        return view('welcome');
    }

}
