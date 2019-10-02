@extends('layouts.app')

@section('title', 'Contact Form')

@section('content')

    <h1>Contact Us</h1>

    @if(!session()->has('message'))
        <form action="{{ route('contact.create') }}" method="POST">

            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" name="name" value="{{old('name')}}" id="name" class="form-control">
            </div>
            @if($errors->has('name'))
                <div class="alert alert-danger">
                    {{$errors->first('name')}}
                </div>
            @endif

            <div class="form-group">
                <label for="email">Email: </label>
                <input type="text" name="email" value="{{old('email')}}" id="email" class="form-control">
            </div>
            @if($errors->has('email'))
                <div class="alert alert-danger">
                    {{$errors->first('email')}}
                </div>
            @endif

            <div class="form-group">
                <label for="message">Message: </label>
                <textarea name="message" id="message" class="form-control">{{old('message')}}</textarea>
            </div>
            @if($errors->has('message'))
                <div class="alert alert-danger">
                    {{$errors->first('message')}}
                </div>
            @endif

            @csrf

            <button type="submit" class="btn btn-secondary">Send Message</button>

        </form>
    @endif




@endsection