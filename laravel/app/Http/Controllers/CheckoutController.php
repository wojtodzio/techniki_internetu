<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Checkout;

class CheckoutController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checkout.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'street_address' => ['required', 'string', 'max:255'],
        ]);

        \Mail::to(config('app.checkout_mails_target'))->send(new Checkout(auth()->user()->cart_items()->get(), $data));

        auth()->user()->cart_items()->delete();

        return redirect('/products')->with('success', 'Your order was created :)');
    }
}
