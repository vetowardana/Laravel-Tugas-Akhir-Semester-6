<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Pasanglowongan;
use App\Profileperusahaan;
use DateTime;
use DateTimeZone;
Use \Carbon\Carbon;
use Auth;
use File;

class PasangController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
        $pasanglowongan = Pasanglowongan::get()->where('user_id', $user_id)->all();
        $profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	return view('layouts.pasanglowongan.index',compact('pasanglowongan','profileperusahaan'));
    }

    public function store(Request $request) {
        $user_id = auth()->user()->id;
        $user = auth()->user();
        $profileperusahaan = Profileperusahaan::where('user_id', $user_id)->first();

        $this->validate($request, [
            'nama_lowongan' => 'required|unique:pasanglowongans|string|max:100',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:png,jpeg,jpg',
            'lowongan_selesai' => 'required|string',
        ]);

        $timezone ='Asia/Jakarta';
        $date =new DateTime('now', new DateTimeZone($timezone));
        $lowongan_mulai = $date->format('y-m-d');

        $tanggal = Carbon::now();

        //jika ada file
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->nama_lowongan) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/pasanglowongan', $filename);
            $pasanglowongan = Pasanglowongan::create([
                'user_id' => $user_id,
                'nama_lowongan' => $request->nama_lowongan,
                'deskripsi' => $request->deskripsi,
                'image' => $filename,
                'slug' => $request->nama_lowongan,
                'lowongan_mulai' => $tanggal->format('Y-m-d'),
                'lowongan_selesai' => $request->lowongan_selesai,
                'name' => $user->name,
                'email' => $user->email,
                'nama_perusahaan' => $profileperusahaan->nama_perusahaan,
                'jenis_perusahaan' => $profileperusahaan->jenis_perusahaan,
                'no_telp' => $profileperusahaan->no_telp,
                'alamat' => $profileperusahaan->alamat,
                'kota' => $profileperusahaan->kota,
                'status' => 'Belum Aktif',
            ]);
            return redirect(route('pasanglowongan.index'))->with(['success' => 'Lowongan Baru Ditambahkan, tunggu maksimal 3x24 jam untuk mengaktifkan lowongan :)']);
        }
    }

    public function edit($id) {
        $pasanglowongan = Pasanglowongan::find($id);
        $user_id = auth()->user()->id;
        $profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

        return view('layouts.pasanglowongan.edit', compact('pasanglowongan','profileperusahaan'));
    }

    public function update(Request $request, $id) {
        $user_id = auth()->user()->id;
        $this->validate($request, [
            'nama_lowongan' => 'required|string|max:100',
            'deskripsi' => 'required',
            'image' => 'nullable|image|mimes:png,jpeg,jpg',
            'lowongan_selesai' => 'required|string',
        ]);
        $pasanglowongan = Pasanglowongan::find($id);
        $filename = $pasanglowongan->image;

        //JIKA ADA FILE GAMBAR YANG DIKIRIM
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->nama_lowongan) . '.' . $file->getClientOriginalExtension();
            //MAKA UPLOAD FILE TERSEBUT
            $file->storeAs('public/pasanglowongan', $filename);
            //DAN HAPUS FILE GAMBAR YANG LAMA
            File::delete(storage_path('app/public/pasanglowongan/' . $pasanglowongan->image));
        }

        $pasanglowongan->update([
            'user_id' => $user_id,
            'nama_lowongan' => $request->nama_lowongan,
            'deskripsi' => $request->deskripsi,
            'image' => $filename,
            'slug' => $request->nama_lowongan,
            'lowongan_selesai' => $request->lowongan_selesai,
        ]);
        return redirect(route('pasanglowongan.index'))->with(['success' => 'Data Lowongan Diperbaharui']);
    }

    public function lowonganSelesai($id) {
        $pasanglowongan = Pasanglowongan::find($id);

        $pasanglowongan->update([
            'status' => 'Selesai',
        ]);
        return redirect(route('pasanglowongan.index'))->with(['success' => 'Data Lowongan Diperbaharui']);
    }

    public function destroy($id) {
        $pasanglowongan = Pasanglowongan::find($id);
        File::delete(storage_path('app/public/pasanglowongan/' . $pasanglowongan->image));
        $pasanglowongan->delete();
        return redirect(route('pasanglowongan.index'))->with(['success' => 'Lowongan Sudah Dihapus']);
    }
}
