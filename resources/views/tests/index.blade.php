@extends('layouts.app')

@section('title', 'Customers')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Customers List</h1>
            {{--            <p><a href="/customers/create">Add New Customer</a></p>--}}
            <p><a href="{{route('test.create')}}">Add New Customer</a></p>
        </div>
    </div>

    <hr>

        <div class="row">
            <div class="col-2"><b>Name</b></div>
            <div class="col-2"><b>Email</b></div>
            <div class="col-2"><b>Email Verified</b></div>
            <div class="col-2"><b>Company Name</b></div>
            <div class="col-2"><b>Status</b></div>
        </div>

    @foreach($customers as $customer)
        <div class="row">
            <div class="col-2">{{ $customer->name }}</div>
            <div class="col-2">{{ $customer->email }}</div>

            <div class="col-2">{{ $customer->email_verified }}</div>
            <div class="col-2">{{ $customer->company->name }}</div>
            <div class="col-2">{{ $customer->active }}</div>
        </div>
    @endforeach

@endsection