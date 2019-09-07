<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->admin) {
            return redirect('/')->with('error', 'You are not an admin');
        }

        $users = \App\User::all();
        return view('admin/users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->admin) {
            return redirect('/')->with('error', 'You are not an admin');
        }
        $user = \App\User::find($id);
        return view('admin/users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
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
            'surname' => ['required', 'string'],
            'email' => ['required', 'string'],
            'login' => ['required', 'string'],
            'admin' => ['string'],
        ]);

        \App\User::find($id)->update([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'login' => $data['login'],
            'admin' => $data['admin'] == 'on' ? true : false,
        ]);

        return redirect('/admin/users')->with('success', 'User was edited!');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->admin) {
            return redirect('/')->with('error', 'You are not an admin');
        }

        \App\User::where('id', $id)->delete();

        return redirect('/admin/users')->with('success', 'User was removed!');
    }
}
