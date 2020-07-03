@extends('layouts.default')

@section('content')
    <section class="p-5">
        <h2>Send Virtual Gift (Transfer)</h2>
        <div class="row">
            <form class="col-6 mt-3" method="post" action="{{ route('customer.make_transfer') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Receiver's Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <small id="emailHelp" class="form-text text-muted">Must be an active user on this platform.</small>
                </div>
                <div class="form-group">
                    <label for="amount">Amount to Transfer</label>
                    <input type="number" class="form-control" id="amount" name="amount" required>
                </div>
                <button type="submit" class="btn btn-primary">Make Transfer</button>
            </form>
        </div>

    </section>
@endsection
