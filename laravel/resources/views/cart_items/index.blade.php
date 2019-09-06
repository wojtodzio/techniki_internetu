@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your cart') }}</div>

                @foreach($cartItems AS $cartItem)
                    <form action="{{ route('cart_items.destroy', $cartItem) }}" method="POST" id="destroy-form-{{ $cartItem->id }}" class="d-none">
                        @csrf
                        @method('DELETE')
                        <input name="cartItemID" value="{{ $cartItem->id }}" />
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
                                <th scope="col">Total Price</td>
                                <th scope="col"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems AS $index => $cartItem)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</td>
                                    <td>{{ $cartItem->Product->name }}</td>
                                    <td>{{ $cartItem->Product->price }} {{ config('app.currency') }}</td>
                                    <td>{{ $cartItem->quantity }}</td>
                                    <td>{{ number_format($cartItem->totalPrice(), 2) }} {{ config('app.currency') }}</td>
                                    <td>
                                        <button type="submit" class="btn btn-primary" form="destroy-form-{{ $cartItem->id }}">Remove</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($cartItems->count() > 0)
                        Total price: {{ number_format($totalPrice, 2) }} {{ config('app.currency') }}
                        <a class="btn btn-primary float-right" href="{{ route('cart_items.index') }}">Checkout</a>
                    @else
                      Your cart is empty!
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
