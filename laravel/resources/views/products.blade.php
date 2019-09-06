@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Buy something!') }}</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</td>
                                <th scope="col">Product name</td>
                                <th scope="col">Price</td>
                                <th scope="col" colspan="2">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products AS $index => $product)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }} {{ config('app.currency') }}</td>
                                    <td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
