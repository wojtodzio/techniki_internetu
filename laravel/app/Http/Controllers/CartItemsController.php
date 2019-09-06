<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartItemsController extends Controller
{
    /**
     * Display current user's cart
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = \App\CartItem::where(['user_id' => auth()->user()->id])->with('Product')->get();
        $totalPrice = $cartItems->sum(function($cartItem) {
            return $cartItem->totalPrice();
        });
        return view('cart_items.index', compact('cartItems', 'totalPrice'));
    }

    /**
     * Add item to cart
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \App\CartItem::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request['productID'],
            'quantity' => $request['quantity'],
        ]);

        return redirect('/products')->with('success', 'Product was added to your cart!');
    }

    /**
     * Remove the specified item from the cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\CartItem::where('user_id', auth()->user()->id)->where('id', $id)->delete();

        return redirect('/cart_items')->with('success', 'Product was removed from your cart!');
    }
}
