<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Profileperusahaan;

class ProfileperusahaanController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	return view('layouts.profile.perusahaan', compact('profileperusahaan'));
    }

    public function store(Request $request) {
    	// dd($request->all());
    	$user_id = auth()->user()->id;
    	$this->validate($request, [
            'nama_perusahaan' => 'required|string|max:100',
            'jenis_perusahaan' => 'required|string|max:100',
            'tanggal_berdiri' => 'required|string',
            'no_telp' => 'required|string|min:10|max:13',
            'alamat' => 'required',
            'kota' => 'required|string',
            'kode_pos' => 'required|string',
        ]);

        $profileperusahaan = Profileperusahaan::create([
            'user_id' => $user_id,
            'nama_perusahaan' => $request->nama_perusahaan,
            'jenis_perusahaan' => $request->jenis_perusahaan,
            'tanggal_berdiri' => $request->tanggal_berdiri,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
        ]);

        return redirect(route('profileperusahaan.index'))->with(['success' => 'Berhasil menambahkan profile !']);
    }

    public function edit($id) {
        $profileperusahaan = Profileperusahaan::find($id);
        return view('layouts.profile.perusahaanedit', compact('profileperusahaan'));
    }

    public function update(Request $request, $id) {
    	$user_id = auth()->user()->id;
    	$this->validate($request, [
            'nama_perusahaan' => 'required|string|max:100',
            'jenis_perusahaan' => 'required|string|max:100',
            'tanggal_berdiri' => 'required|string',
            'no_telp' => 'required|string|min:10|max:13',
            'alamat' => 'required',
            'kota' => 'required|string',
            'kode_pos' => 'required|string',
        ]);

        $profileperusahaan = Profileperusahaan::find($id);

        $profileperusahaan->update([
            'user_id' => $user_id,
            'nama_perusahaan' => $request->nama_perusahaan,
            'jenis_perusahaan' => $request->jenis_perusahaan,
            'tanggal_berdiri' => $request->tanggal_berdiri,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
        ]);
        return redirect(route('profileperusahaan.index'))->with(['success' => 'Profile Diperbaharui !']);
    }

    public function destroy($id) {
        $profileperusahaan = Profileperusahaan::find($id);
        $profileperusahaan->delete();

        return redirect(route('profileperusahaan.index'))->with(['success' => 'Profile Berhasil Direset !']);
    }
}
