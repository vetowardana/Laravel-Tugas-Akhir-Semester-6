<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Profileadmin;

class ProfileadminController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	return view('layouts.profile.admin', compact('profileadmin'));
    }

    public function store(Request $request) {
    	// dd($request->all());
    	$user_id = auth()->user()->id;
    	$this->validate($request, [
            'jenKel' => 'required|string|max:100',
            'statusPerkawinan' => 'required|string|max:100',
            'tglLahir' => 'required|string',
            'noTlp' => 'required|string|min:10|max:13',
            'alamat' => 'required',
            'kota' => 'required|string',
            'kPos' => 'required|string',
        ]);

        $profileadmin = Profileadmin::create([
            'user_id' => $user_id,
            'jenis_kelamin' => $request->jenKel,
            'status_perkawinan' => $request->statusPerkawinan,
            'tanggal_lahir' => $request->tglLahir,
            'no_telp' => $request->noTlp,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'kode_pos' => $request->kPos,
        ]);

        return redirect(route('profileadmin.index'))->with(['success' => 'Berhasil menambahkan profile !']);
    }

    public function edit($id) {
        $profileadmin = Profileadmin::find($id);
        return view('layouts.profile.adminedit', compact('profileadmin'));
    }

    public function update(Request $request, $id) {
    	$user_id = auth()->user()->id;
    	$this->validate($request, [
            'jenKelamin' => 'required|string|max:100',
            'statPerkawinan' => 'required|string|max:100',
            'tgLahir' => 'required|string',
            'noTel' => 'required|string|min:10|max:13',
            'alamat2' => 'required',
            'kota2' => 'required|string',
            'kodPos' => 'required|string',
        ]);

        $profileadmin = Profileadmin::find($id);

        $profileadmin->update([
            'user_id' => $user_id,
            'jenis_kelamin' => $request->jenKelamin,
            'status_perkawinan' => $request->statPerkawinan,
            'tanggal_lahir' => $request->tgLahir,
            'no_telp' => $request->noTel,
            'alamat' => $request->alamat2,
            'kota' => $request->kota2,
            'kode_pos' => $request->kodPos,
        ]);
        return redirect(route('profileadmin.index'))->with(['success' => 'Profile Diperbaharui !']);
    }

    public function destroy($id) {
        $profileadmin = Profileadmin::find($id);
        $profileadmin->delete();

        return redirect(route('profileadmin.index'))->with(['success' => 'Profile Berhasil Direset !']);
    }
}
