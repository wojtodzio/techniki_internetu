@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Buy something!') }}</div>

                @foreach($products AS $product)
                    <form action="{{ route('cart_items.store') }}" method="post" id="product-form-{{ $product->id }}" class="d-none">
                        @csrf
                        <input name="productID" value="{{ $product->id }}" />
                    </form>
                @endforeach

                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</td>
                                <th scope="col">Product name</td>
                                <th scope="col">Price</td>
                                <th scope="col">Quantity</td>
                                <th scope="col"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products AS $index => $product)
                                <form action="{{ route('cart_items.store', ['itemID' => $product->id]) }}" method="post" id="product-form-{{ $product->id }}">
                                    @csrf
                                </form>
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }} {{ config('app.currency') }}</td>
                                    <td>
                                        <div class="form-group">
                                            <input class="form-control" type="number" value="1" name="quantity" form="product-form-{{ $product->id }}"/>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary" form="product-form-{{ $product->id }}">Add to cart</button>
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
