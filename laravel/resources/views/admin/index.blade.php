@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin panel') }}</div>

                <div class="card-body">
                    <ul>
                        <li>
                            <a href="{{ route('products.index') }}">{{ __('Products') }} </a>
                        </li>
                        <li>
                            <a href="{{ route('users.index') }}">{{ __('Users') }} </a>
                        </li>
                    </ul
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
