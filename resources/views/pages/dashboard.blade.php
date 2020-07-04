@extends('layouts.default')

@section('content')
    <section class="pt-3 pl-4">
        <h2>Dear {{ ucfirst($customer->firstname).', '.strtoupper($customer->lastname) }}</h2>
        <p>Welcome to your e-Wallet App</p>
        <p class="mt-2">You Can:</p>
        <ul class="ml-4">
            <li>Pre-Load your wallet with your debit card(s) </li>
            <li>Transfer to another customer</li>
        </ul>
        <p>Click on the wallet option in the left nagivation bar to select an option.</p>

        <div class="pt-3">
            <h5><em>Recent wallet preload operations</em></h5>
            @if(count($customer->preload_transaction) > 0 )
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col">reference</th>
                        <th scope="col">status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach($customer->preload_transaction as $transaction)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $transaction->created_at }}</td>
                            <td>{{ $transaction->amount }}</td>
                            <td>{{ $transaction->reference }}</td>
                            <td>{{ $transaction->status }}</td>
                        </tr>
                        @php($i += 1)
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>No record found.</p>
            @endif
        </div>
    </section>
@endsection
