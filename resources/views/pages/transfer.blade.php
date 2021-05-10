@extends('layouts.default')

@section('content')
    <section class="px-4 pt-3">
        <h2>Send Virtual Gift (Transfer)</h2>
        <div class="row">
            <form class="col-md-6 mt-3" method="post" action="{{ route('customer.make_transfer') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Receiver's Email</label>
                    <input type="email" class="form-control" id="email" name="email" {{ $customer->wallet == null ? 'disabled' : '' }} required>
                    <small id="emailHelp" class="form-text text-muted">Must be an active user on this platform.</small>
                </div>
                <div class="form-group">
                    <label for="amount">Amount to Transfer</label>
                    <input type="number" class="form-control" {{ $customer->wallet == null ? 'disabled' : '' }} id="amount" name="amount" required>
                </div>
                <button type="submit" class="btn btn-primary">Make Transfer</button>
            </form>
            <section class="col-md-6 text-right">
                <h5>Your current balance:</h5>
                <p>
                    ₦{{ $customer->wallet == null ? '0' : number_format((float)$customer->wallet->balance, 2, '.', '') }}
                </p>
            </section>
        </div>
        <h4 class="mt-4">Transfer history</h4>
        <div class="row">
            <div class="col-md-6">
                <h6>Sent Gifts</h6>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                        <th scope="col">Receiver</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($gifts_sent as $gift)
                            <tr>
                                <td>₦{{ $gift->amount }}</td>
                                <td>{{ $gift->created_at }}</td>
                                <td>{{ $gift->receiver->firstname }} {{ $gift->receiver->lastname }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h6>Received Gifts</h6>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Sender</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gifts_received as $gift)
                            <tr>
                                <td>₦{{ $gift->amount }}</td>
                                <td>{{ $gift->created_at }}</td>
                                <td>{{ $gift->initiator->firstname }} {{ $gift->initiator->lastname }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
