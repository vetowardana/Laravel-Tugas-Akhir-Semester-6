<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Profilemahasiswa;

class ProfilemahasiswaController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profilemahasiswa = Profilemahasiswa::get()->where('user_id', $user_id)->all();

    	return view('layouts.profile.mahasiswa', compact('profilemahasiswa'));
    }

    public function store(Request $request) {
    	// dd($request->all());
    	$user_id = auth()->user()->id;
    	$this->validate($request, [
    		'nama_universitas' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'nim' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string|max:100',
            'status_perkawinan' => 'required|string|max:100',
            'tanggal_lahir' => 'required|string',
            'no_telp' => 'required|string|min:10|max:13',
            'alamat' => 'required',
            'kota' => 'required|string',
            'kode_pos' => 'required|string',
        ]);

        $profilemahasiswa = Profilemahasiswa::create([
            'user_id' => $user_id,
            'nama_universitas' => $request->nama_universitas,
            'prodi' => $request->prodi,
            'nim' => $request->nim,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_perkawinan' => $request->status_perkawinan,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
        ]);

        return redirect(route('profilemahasiswa.index'))->with(['success' => 'Berhasil menambahkan profile !']);
    }

    public function edit($id) {
        $profilemahasiswa = Profilemahasiswa::find($id);
        return view('layouts.profile.mahasiswaedit', compact('profilemahasiswa'));
    }

    public function update(Request $request, $id) {
    	$user_id = auth()->user()->id;
    	$this->validate($request, [
            'nama_universitas' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'nim' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string|max:100',
            'status_perkawinan' => 'required|string|max:100',
            'tanggal_lahir' => 'required|string',
            'no_telp' => 'required|string|min:10|max:13',
            'alamat' => 'required',
            'kota' => 'required|string',
            'kode_pos' => 'required|string',
        ]);

        $profilemahasiswa = Profilemahasiswa::find($id);

        $profilemahasiswa->update([
            'user_id' => $user_id,
            'nama_universitas' => $request->nama_universitas,
            'prodi' => $request->prodi,
            'nim' => $request->nim,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_perkawinan' => $request->status_perkawinan,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
        ]);
        return redirect(route('profilemahasiswa.index'))->with(['success' => 'Profile Diperbaharui !']);
    }

    public function destroy($id) {
        $profilemahasiswa = Profilemahasiswa::find($id);
        $profilemahasiswa->delete();

        return redirect(route('profilemahasiswa.index'))->with(['success' => 'Profile Berhasil Direset !']);
    }
}
