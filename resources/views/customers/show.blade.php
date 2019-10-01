@extends('layout')

@section('title', 'Details for ' . $customer->name)

@section('content')

    <div class="row">
        <div class="col12">
            <h3>Details for {{ $customer->name }}</h3>
            <p><a href="/customers/{{ $customer->id }}/edit">Edit</a></p>

            <form action="/customers/{{$customer->id}}" method="POST" class="mb-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
            </form>

        </div>
    </div>

    <div class="row">
        <div class="col12">
            <p><strong>Name</strong> {{$customer->name}}</p>
            <p><strong>Email</strong> {{$customer->email}}</p>
            <p><strong>Company</strong> {{$customer->company->name}}</p>
        </div>
    </div>

@endsection