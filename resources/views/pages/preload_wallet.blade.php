@extends('layouts.default')

@section('content')
    <section class="p-5">
        <h2>Preload Wallet <small>(Debit card is required)</small></h2>
        <div class="row">
            <section class="col-md-6">
                <form class="my-5 pb-5 pr-5" method="post" action="{{ route('customer.preload_wallet',$customer->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="wallet">Wallet to be credited:</label>
                        <input type="text" class="form-control" id="wallet" name="wallet" value="{{ $customer->wallet == null  ? 'Wallet not found' : $customer->wallet->code }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount to Load</label>
                        <input type="number" class="form-control" id="amount" {{ $customer->wallet == null ? 'disabled' : '' }} name="amount" required value="{{ old('amount') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Preload Wallet</button>
                </form>
                @if($amount > 0)
                    <form method="POST" action="{{ route('customer.pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                        <div class="row" style="margin-bottom:40px;">
                            <div class="col-md-8 col-md-offset-2">
                                <div class=" bg-success p-3 text-white font-weight-bold mb-3">
                                    <p class="">
                                        You are about to load your wallet
                                        {{ $customer->wallet->code }} with ₦ {{ $amount }}.
                                    </p>
                                    <p>Click on "Pay Now". <br/>You will be redirected to the payment platform</p>
                                </div>

                                <input type="hidden" name="email" value="taofeek.olalere@feghas.com">
                                <input type="hidden" name="amount" value="{{ $amount*100 }}">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="currency" value="NGN">
                                <input type="hidden" name="metadata" value="{{ json_encode($array = ['customer_id' => $customer->id,]) }}" >
                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                                @csrf

                                <p>
                                    <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                    </button>
                                </p>
                            </div>
                        </div>
                    </form>
                @endif
            </section>
            <section class="col-md-6 text-right">
                <h4>Your wallet details:</h4>
                <p><strong>Code:</strong> {{ $customer->wallet == null ? 'Code not found' : $customer->wallet->code }}</p>
                <p><strong>Balance:</strong> ₦{{ $customer->wallet == null ? 0.0 : number_format((float)$customer->wallet->balance, 2, '.', '') }}</p>
            </section>
        </div>

    </section>
@endsection
