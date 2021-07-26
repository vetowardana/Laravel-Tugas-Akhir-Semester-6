<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class LoginController extends Controller
{
    public function index() {
    	return view('layouts.user.login');
    }

    public function postLogin(Request $request) {
    	$this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        // dd($request->all());

        if (Auth::attempt($request->only('email', 'password'))) {
        	return redirect(route('dashboard'));
        }
        return redirect()->back()->with('error', 'Password / Email Salah');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect(route('login'));
    }
}
