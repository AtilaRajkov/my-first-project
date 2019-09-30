@extends('layout')

@section('title', 'Customers')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Customer</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/customers" method="POST">
                @csrf

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
                    <input type="text" name="email" value="{{old('email')}}" class="form-control">
                </div>
                @if($errors->has('email'))
                    <div class="alert alert-danger">
                        {{$errors->first('email')}}
                    </div>
                @endif

                <div class="form-group">
                    <label for="active">Status:</label>
                    <select name="active" id="active" class="form-control">
                        <option value="" disabled>Select customer status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                @if($errors->has('active'))
                    <div class="alert alert-danger">
                        {{$errors->first('active') }}
                    </div>
                @endif

                <div class="form-group">
                    <label for="company_id">Company:</label>
                    <select name="company_id" id="company_id" class="form-control">
                        <option value="" disabled>Select your company</option>

                        @if(count($companies) > 0)
                            @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                @if($errors->has('active'))
                    <div class="alert alert-danger">
                        {{$errors->first('active') }}
                    </div>
                @endif


                <button type="submit" class="btn btn-secondary">Add customer</button>

            </form>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-6">
            <h4>Active customers:</h4>
            <ul>
                @foreach($activeCustomers as $customer)
                    <li>{{$customer->name}} <span class="text-muted">({{$customer->company->name}})</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-6">
            <h4>Inactive customers:</h4>
            <ul>
                @foreach($inactiveCustomers as $customer)
                    <li>{{$customer->name}} <span class="text-muted">({{$customer->company->name}})</span></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @foreach($companies as $company)
                <h3>{{ $company->name }}</h3>

                @if(count($company->customers) > 0)
                    <ul>
                    @foreach($company->customers as $customer)
                        <li>{{ $customer->name }}</li>
                    @endforeach
                    </ul>
                @endif

            @endforeach
        </div>
    </div>

@endsection