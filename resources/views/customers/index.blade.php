@extends('layouts.app')

@section('title', 'Customers')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Customers List</h1>
        </div>
    </div>

    @can('create', App\Customer::class)
        <div class="row">
            <div class="col-12">
                {{--            <p><a href="/customers/create">Add New Customer</a></p>--}}
                <p><a href="{{route('customers.create')}}">Add New Customer</a></p>
            </div>
        </div>
    @endcan

    <hr>

    @foreach($customers as $customer)
        <div class="row">
            <div class="col-2">
                {{ $customer->id }}
            </div>
{{--            @can('create', App\Customer::class)--}}
{{--                <div class="col-4"><a href="/customers/{{$customer->id}}">{{ $customer->name }}</a></div>--}}
{{--            @else--}}
{{--                <div class="col-4">{{ $customer->name }}</div>--}}
{{--            @endcan--}}

            <div class="col-4">
            @can('view', $customer)
                <a href="/customers/{{$customer->id}}">
                    {{ $customer->name }}
                </a>
            @endcan

            @cannot('view', $customer)
                    {{ $customer->name }}
            @endcannot


            </div>

            <div class="col-4">{{ $customer->company->name }}</div>
            <div class="col-2">{{ $customer->active }}</div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center mt-3">
            {{ $customers->links() }}
        </div>
    </div>

@endsection