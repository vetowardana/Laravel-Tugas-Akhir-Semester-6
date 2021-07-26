<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Pasanglowongan;
use App\Profileperusahaan;
Use \Carbon\Carbon;
use Auth;
use App\Pendaftar;
use App\Penilaianmagang;
use File;

class PenilaianmagangController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

        $a = Pasanglowongan::orderBy('nama_lowongan', 'asc')->where('user_id', $user_id)->get();
        $lowongan_selesai = $a->where('status', 'Selesai');

    	return view('layouts.penilaian_magang.index',compact('lowongan_selesai','profileperusahaan'));
    }

    public function show($id) {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$lowongan_selesai = Pasanglowongan::find($id);

    	$a = Pendaftar::orderBy('name', 'asc')->where('lowongan_id', $lowongan_selesai->id)->get();
    	$pendaftarditerima = $a->where('status', 'Diterima');

    	return view('layouts.penilaian_magang.detail',compact('lowongan_selesai','profileperusahaan','pendaftarditerima'));
    }

    public function buatPenilaian($id) {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$pendaftar = Pendaftar::find($id);

    	$lowongan_selesai = Pasanglowongan::where('id', $pendaftar->lowongan_id)->first();

    	$penilaian = Penilaianmagang::orderBy('created_at', 'asc')->where('mahasiswa_id', $pendaftar->user_id)->get();

    	return view('layouts.penilaian_magang.penilaian',compact('pendaftar','profileperusahaan','penilaian','lowongan_selesai'));
    }

    public function simpanPenilaian(Request $request, $id) {
    	$user_id = auth()->user()->id;
    	$pendaftar = Pendaftar::find($id);

    	$this->validate($request, [
            'penilaian_magang' => 'required|mimes:pdf',
        ]);

        $timezone ='Asia/Jakarta';
        $tanggal = Carbon::now($timezone);

        if ($request->hasFile('penilaian_magang')) {
            $file = $request->file('penilaian_magang');
            $filename = time() . Str::slug($pendaftar->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/penilaianmagang', $filename);
            $penilaianmagang = Penilaianmagang::create([
	        	'user_id' => $user_id,
	        	'mahasiswa_id' => $pendaftar->user_id,
	        	'lowongan_id' => $pendaftar->lowongan_id,
	        	'name' => $pendaftar->name,
	        	'nama_perusahaan' => $pendaftar->nama_perusahaan,
	        	'nama_lowongan' => $pendaftar->nama_lowongan,
	        	'tanggal_submit' => $tanggal->format('Y-m-d'),
	        	'waktu_submit' => $tanggal->format('H:i:s'),
	        	'penilaian_magang' => $filename,
	            'slug' => $pendaftar->name,
	        ]);
	        return redirect()->back()->with(['success' => 'Penilaian magang berhasil ditambah']);
	    }
    }

    public function edit($id) {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$penilaian = Penilaianmagang::find($id);

    	$lowongan_selesai = Pasanglowongan::where('id', $penilaian->lowongan_id)->first();

    	$pendaftar = Pendaftar::where('user_id', $penilaian->mahasiswa_id)->first();

    	return view('layouts.penilaian_magang.edit',compact('pendaftar','profileperusahaan','penilaian','lowongan_selesai'));
    }

    public function update(Request $request, $id) {
        $user_id = auth()->user()->id;
        $this->validate($request, [
            'penilaian_magang' => 'required|mimes:pdf',
        ]);

        $penilaian = Penilaianmagang::find($id);
        $filename = $penilaian->penilaian_magang;

        $timezone ='Asia/Jakarta';
        $tanggal = Carbon::now($timezone);

        if ($request->hasFile('penilaian_magang')) {
            $file = $request->file('penilaian_magang');
            $filename = time() . Str::slug($penilaian->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/penilaianmagang', $filename);
            File::delete(storage_path('app/public/penilaianmagang/' . $penilaian->penilaian_magang));
        }

        $penilaian->update([
            'user_id' => $user_id,
            'tanggal_submit' => $tanggal->format('Y-m-d'),
        	'waktu_submit' => $tanggal->format('H:i:s'),
        	'penilaian_magang' => $filename,
            'slug' => $penilaian->name,
        ]);
        return redirect()->back()->with(['success' => 'Penilaian berhasil diubah']);
    }

    public function download($id) {
    	$penilaian = Penilaianmagang::find($id);

	    $file = storage_path('app/public/penilaianmagang/' . $penilaian->penilaian_magang);

	    return response()->download($file);
	}

    public function destroy($id) {
        $penilaianmagang = Penilaianmagang::find($id);
        File::delete(storage_path('app/public/penilaianmagang/' . $penilaianmagang->penilaian_magang));
        $penilaianmagang->delete();
        return redirect()->back()->with(['success' => 'Penilaian magang berhasil dihapus']);
    }
}
