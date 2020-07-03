@extends('layouts.default')

@section('content')
    <section class="p-5">
        <h2>Dear {{ ucfirst($customer->firstname).', '.strtoupper($customer->lastname) }}</h2>
        <p>Welcome to your dashboard</p>
    </section>
@endsection
