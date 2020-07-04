@extends('layouts.default')

@section('content')
    <section class="p-5">
        <h2>Dear {{ ucfirst($customer->firstname).', '.strtoupper($customer->lastname) }}</h2>
        <p>Welcome to your e-Wallet App</p>
        <p class="mt-5">You Can:</p>
        <ul class="ml-4">
            <li>Pre-Load your wallet with your debit card(s) </li>
            <li>Transfer to another customer</li>
        </ul>
        <p>Click on the wallet option in the left nagivation bar to select an option.</p>
    </section>
@endsection
