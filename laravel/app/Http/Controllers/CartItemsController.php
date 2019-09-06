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
        //
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
     * Update the specified cart items quantity.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified item from the cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
