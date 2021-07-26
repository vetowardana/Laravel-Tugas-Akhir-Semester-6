<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\User;
use App\profileadmin;

class ManajemenPerusahaanController extends Controller
{
    public function index() {
    	$perusahaan = User::get()->where('level', 'perusahaan')->all();

        $user_id = auth()->user()->id;
        $profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	return view('layouts.manajemen_akun.tambahperusahaan', compact('perusahaan','profileadmin'));
    }

    public function store(Request $request) {
    	// dd($request->all());
    	$this->validate($request, [
            'name' => 'required|string|min:1|max:100',
            'email' => 'required|unique:users|string|max:100',
            'password' => 'required_with:konfirmPass|same:konfirmPass|min:8|max:24',
            'konfirmPass' => 'min:8',
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
            return redirect(route('manajemenperusahaan.index'))->with(['success' => 'Berhasil Ditambahkan !']);
        }
    }

    public function edit($id) {
        $perusahaan = User::find($id);

        $user_id = auth()->user()->id;
        $profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();
        
        return view('layouts.manajemen_akun.editperusahaan', compact('perusahaan','profileadmin'));
    }

    public function update(Request $request, $id) {
    	$this->validate($request, [
            'password' => 'required_with:konfirmPass|same:konfirmPass|min:8|max:24',
            'konfirmPass' => 'min:8',
        ]);

        $perusahaan = User::find($id);

        $perusahaan->update([
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect(route('manajemenperusahaan.index'))->with(['success' => 'Berhasil Diperbaharui']);
    }

    public function destroy($id) {
        $perusahaan = User::find($id);
        $perusahaan->delete();
        return redirect(route('manajemenperusahaan.index'))->with(['success' => 'Berhasil Dihapus']);
    }
}
