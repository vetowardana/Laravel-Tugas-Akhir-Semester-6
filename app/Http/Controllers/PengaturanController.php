<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PengaturanController extends Controller
{
    public function index() {
    	$user = auth()->user();

    	return view('layouts.user.pengaturanakun', compact('user'));
    }

    public function ubahNama(Request $request) {
    	// dd($request->all());
    	$user = auth()->user();
    	$this->validate($request, [
            'name' => 'required|string|min:1|max:100',
            'password' => 'required_with:konfirmasi|same:konfirmasi|min:8|max:24',
            'konfirmasi' => 'min:8'
        ]);

        if (Hash::check($request->input('password'), $user->password)) {
		    $user->update([
        		'name' => $request->name,
        	]);
        	return redirect(route('pengaturan'))->with(['success' => 'Nama berhasil diganti !']);
		}
        return redirect(route('pengaturan'))->with(['error' => 'Password salah !']);
    }

    public function ubahPassword(Request $request) {
    	// dd($request->all());
    	$user = auth()->user();
    	$this->validate($request, [
            'passwordL' => 'required|min:8|max:24',
            'passwordB' => 'required_with:konfirmasiP|same:konfirmasiP|min:8|max:24',
            'konfirmasiP' => 'min:8'
        ]);

        if (Hash::check($request->input('passwordL'), $user->password)) {
		    $user->update([
        		'password' => bcrypt($request->passwordB),
        	]);
        	return redirect(route('pengaturan'))->with(['success' => 'Password berhasil diganti !']);
		}
        return redirect(route('pengaturan'))->with(['error' => 'Password salah !']);
    }

    public function ubahGambar(Request $request) {
        // dd($request->all());
        $user = auth()->user();
        $this->validate($request, [
            'image' => 'required|image|mimes:png,jpeg,jpg',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($user->name) . '.' . $file->getClientOriginalExtension();
            //MAKA UPLOAD FILE TERSEBUT
            $file->storeAs('public/user', $filename);
            //DAN HAPUS FILE GAMBAR YANG LAMA
            File::delete(storage_path('app/public/user/' . $user->image));
        }

        $user->update([
            'image' => $filename,
            'slug' => $user->name,
        ]);
        return redirect(route('pengaturan'))->with(['success' => 'Gambar berhasil diganti !']);
    }
}
