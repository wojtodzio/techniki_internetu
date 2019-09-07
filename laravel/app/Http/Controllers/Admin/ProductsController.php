<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->admin) {
            return redirect('/')->with('error', 'You are not an admin');
        }

        $products = \App\Product::all();
        return view('admin/products.index', compact('products'));
    }

    /**
     * Show the form for creating a new products.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->admin) {
            return redirect('/')->with('error', 'You are not an admin');
        }
        return view('admin/products.create');
    }

    /**
     * Store a newly created products in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->admin) {
            return redirect('/')->with('error', 'You are not an admin');
        }

        $data = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0.01'],
        ]);

        \App\Product::insert([
            'name' => $data['name'],
            'price' => $data['price'],
        ]);

        return redirect('/admin/products')->with('success', 'Product was added!');
    }

    /**
     * Show the form for editing the specified products.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->admin) {
            return redirect('/')->with('error', 'You are not an admin');
        }
        $product = \App\Product::find($id);
        return view('admin/products.edit', compact('product'));
    }

    /**
     * Update the specified products in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!auth()->user()->admin) {
            return redirect('/')->with('error', 'You are not an admin');
        }

        $data = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0.01'],
        ]);

        \App\Product::find($id)->update([
            'name' => $data['name'],
            'price' => $data['price'],
        ]);

        return redirect('/admin/products')->with('success', 'Product was edited!');
    }

    /**
     * Remove the specified products from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->admin) {
            return redirect('/')->with('error', 'You are not an admin');
        }

        \App\Product::where('id', $id)->delete();

        return redirect('/admin/products')->with('success', 'Product was removed!');
    }
}
