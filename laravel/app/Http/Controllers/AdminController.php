<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->admin) {
            return redirect('/')->with('error', 'You are not an admin');
        }

        return view('admin.index');
    }
}
