@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Panel: Products') }}</div>

                @foreach($products AS $product)
                    <form action="{{ route('products.destroy', $product) }}" method="POST" id="destroy-form-{{ $product->id }}" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                @endforeach

                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</td>
                                <th scope="col">Product name</td>
                                <th scope="col">Price</td>
                                <th scope="col"></td>
                                <th scope="col"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products AS $index => $product)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }} {{ config('app.currency') }}</td>
                                    <td colspan="2">
                                        <a class="btn btn-primary float-right" href="{{ route('products.edit', $product) }}">Edit product</a>
                                        <button type="submit" class="btn btn-primary float-right" form="destroy-form-{{ $product->id }}">Remove</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-primary" href="{{ route('products.create') }}">Add product</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
