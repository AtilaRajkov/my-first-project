@extends('layouts.app')

@section('title', 'Edit Details for ' . $customer->name)

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Edit details for {{ $customer->name }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{route('customers.update', ['customer' => $customer->id])}}" method="POST">
                @method('PATCH')

                @include('customers.form')

                <button type="submit" class="btn btn-secondary">Edit customer</button>

            </form>
        </div>
    </div>



@endsection