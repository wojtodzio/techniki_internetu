@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your profile') }}</div>

                <div class="card-body">
                    <p>Email: {{auth()->user()->email}}</p>
                    <p>Name: {{auth()->user()->name}}</p>
                    <p>Surname: {{auth()->user()->surname}}</p>
                    <p>Login: {{auth()->user()->login}}</p>
                    <p>Country: {{auth()->user()->country}}</p>
                    <p>City: {{auth()->user()->city}}</p>
                    <p>Street Address: {{auth()->user()->street_address}}</p>
                    <p>Education Level: {{auth()->user()->education}}</p>
                    <p>Interests: {{auth()->user()->interests()->pluck('name')->join(', ')}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
