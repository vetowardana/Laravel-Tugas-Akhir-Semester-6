<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\User;

class RegisterController extends Controller
{
    public function index() {
    	return view('layouts.user.register');
    }

    public function postRegister(Request $request){
    	// dd($request->all());
    	$this->validate($request, [
            'name' => 'required|string|min:1|max:100',
            'email' => 'required|unique:users|string|max:100',
            'password' => 'required_with:konfirmasi|same:konfirmasi|min:8|max:24',
            'konfirmasi' => 'min:8',
            'image' => 'required|image|mimes:png,jpeg,jpg',
            'level' =>'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/user', $filename);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'level' => $request->level,
                'image' => $filename,
                'slug' => $request->name,
                'remember_token' => Str::random(60),
            ]);
            return redirect(route('register'))->with(['success' => 'Pendaftaran Berhasil !']);
        }
    }
}
