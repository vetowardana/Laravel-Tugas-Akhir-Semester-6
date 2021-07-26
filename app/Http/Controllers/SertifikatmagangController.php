<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Pasanglowongan;
use App\Profileperusahaan;
Use \Carbon\Carbon;
use Auth;
use App\Pendaftar;
use App\Sertifikatmagang;
use File;

class SertifikatmagangController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

        $a = Pasanglowongan::orderBy('nama_lowongan', 'asc')->where('user_id', $user_id)->get();
        $lowongan_selesai = $a->where('status', 'Selesai');

    	return view('layouts.sertifikat_magang.index',compact('lowongan_selesai','profileperusahaan'));
    }

    public function show($id) {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$lowongan_selesai = Pasanglowongan::find($id);

    	$a = Pendaftar::orderBy('name', 'asc')->where('lowongan_id', $lowongan_selesai->id)->get();
    	$pendaftarditerima = $a->where('status', 'Diterima');

    	return view('layouts.sertifikat_magang.detail',compact('lowongan_selesai','profileperusahaan','pendaftarditerima'));
    }

    public function buatSertifikat($id) {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$pendaftar = Pendaftar::find($id);

    	$lowongan_selesai = Pasanglowongan::where('id', $pendaftar->lowongan_id)->first();

    	$sertifikat = Sertifikatmagang::orderBy('created_at', 'asc')->where('mahasiswa_id', $pendaftar->user_id)->get();

    	return view('layouts.sertifikat_magang.sertifikat',compact('pendaftar','profileperusahaan','sertifikat','lowongan_selesai'));
    }

    public function simpanSertifikat(Request $request, $id) {
    	$user_id = auth()->user()->id;
    	$pendaftar = Pendaftar::find($id);

    	$this->validate($request, [
            'sertifikat_magang' => 'required|mimes:pdf',
        ]);

        $timezone ='Asia/Jakarta';
        $tanggal = Carbon::now($timezone);

        if ($request->hasFile('sertifikat_magang')) {
            $file = $request->file('sertifikat_magang');
            $filename = time() . Str::slug($pendaftar->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/sertifikatmagang', $filename);
            $sertifikatmagang = Sertifikatmagang::create([
	        	'user_id' => $user_id,
	        	'mahasiswa_id' => $pendaftar->user_id,
	        	'lowongan_id' => $pendaftar->lowongan_id,
	        	'name' => $pendaftar->name,
	        	'nama_perusahaan' => $pendaftar->nama_perusahaan,
	        	'nama_lowongan' => $pendaftar->nama_lowongan,
	        	'tanggal_submit' => $tanggal->format('Y-m-d'),
	        	'waktu_submit' => $tanggal->format('H:i:s'),
	        	'sertifikat_magang' => $filename,
	            'slug' => $pendaftar->name,
	        ]);
	        return redirect()->back()->with(['success' => 'Serifikat magang berhasil ditambah']);
	    }
    }

    public function edit($id) {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$sertifikat = Sertifikatmagang::find($id);

    	$lowongan_selesai = Pasanglowongan::where('id', $sertifikat->lowongan_id)->first();

    	$pendaftar = Pendaftar::where('user_id', $sertifikat->mahasiswa_id)->first();

    	return view('layouts.sertifikat_magang.edit',compact('pendaftar','profileperusahaan','sertifikat','lowongan_selesai'));
    }

    public function update(Request $request, $id) {
        $user_id = auth()->user()->id;
        $this->validate($request, [
            'sertifikat_magang' => 'required|mimes:pdf',
        ]);

        $sertifikat = Sertifikatmagang::find($id);
        $filename = $sertifikat->sertifikat_magang;

        $timezone ='Asia/Jakarta';
        $tanggal = Carbon::now($timezone);

        if ($request->hasFile('sertifikat_magang')) {
            $file = $request->file('sertifikat_magang');
            $filename = time() . Str::slug($sertifikat->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/sertifikatmagang', $filename);
            File::delete(storage_path('app/public/sertifikatmagang/' . $sertifikat->sertifikat_magang));
        }

        $sertifikat->update([
            'user_id' => $user_id,
            'tanggal_submit' => $tanggal->format('Y-m-d'),
        	'waktu_submit' => $tanggal->format('H:i:s'),
        	'sertifikat_magang' => $filename,
            'slug' => $sertifikat->name,
        ]);
        return redirect()->back()->with(['success' => 'Sertifikat berhasil diubah']);
    }

    public function download($id) {
    	$sertifikat = Sertifikatmagang::find($id);

	    $file = storage_path('app/public/sertifikatmagang/' . $sertifikat->sertifikat_magang);

	    return response()->download($file);
	}

    public function destroy($id) {
        $sertifikatmagang = Sertifikatmagang::find($id);
        File::delete(storage_path('app/public/sertifikatmagang/' . $sertifikatmagang->sertifikat_magang));
        $sertifikatmagang->delete();
        return redirect()->back()->with(['success' => 'Sertifikat magang berhasil dihapus']);
    }
}
