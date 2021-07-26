<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Profilemahasiswa;
use App\Laporanmagang;
use App\Pendaftar;
use Auth;
Use \Carbon\Carbon;
use File;

class LaporanmagangController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profilemahasiswa = Profilemahasiswa::get()->where('user_id', $user_id)->all();
        $a = Laporanmagang::where('user_id', $user_id)->get();
    	$laporanmagang = $a->where('status', 'Belum Ditandatangani');
        $laporantt = $a->where('status', 'Ditandatangani');

    	return view('layouts.laporan_magang.index', compact('laporanmagang','profilemahasiswa','laporantt'));
    }

    public function store(Request $request) {
    	$user_id = auth()->user()->id;
    	$user = auth()->user();
    	$a = Pendaftar::where('user_id', $user_id);
        $pendaftar = $a->where('status', 'Diterima')->first();
        $b = Pendaftar::where('user_id', $user_id)->get();
        $pendaftar2 = $b->where('status', 'Diterima')->count();
    	$this->validate($request, [
    		'judul_laporan' => 'required|string|max:100',
            'laporan_magang' => 'required|mimes:pdf',
        ]);

    	$timezone ='Asia/Jakarta';
        $tanggal = Carbon::now($timezone);

        if ($pendaftar2 > 0) {
            if ($request->hasFile('laporan_magang')) {
                $file = $request->file('laporan_magang');
                $filename = time() . Str::slug($request->judul_laporan) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/laporanmagang', $filename);
                $laporanmagang = Laporanmagang::create([
                    'user_id' => $user_id,
                    'perusahaan_id' => $pendaftar->perusahaan_id,
                    'lowongan_id' => $pendaftar->lowongan_id,
                    'name' => $user->name,
                    'nama_perusahaan' => $pendaftar->nama_perusahaan,
                    'nama_lowongan' => $pendaftar->nama_lowongan,
                    'judul_laporan' => $request->judul_laporan,
                    'tanggal_dibuat' => $tanggal->format('Y-m-d'),
                    'waktu_dibuat' => $tanggal->format('H:i:s'),
                    'laporan_magang' => $filename,
                    'slug' => $request->judul_laporan,
                    'status' => 'Belum Ditandatangani',
                ]);
                return redirect(route('laporanmagang.index'))->with(['success' => 'Laporan magang berhasil di-submit']);
            }
        }
        return redirect(route('laporanmagang.index'))->with(['error' => 'Cari lowongan terlebih dahulu :)']);
    }

    public function edit($id) {
        $laporanmagang = Laporanmagang::find($id);
        $user_id = auth()->user()->id;
        $profilemahasiswa = Profilemahasiswa::get()->where('user_id', $user_id)->all();

        return view('layouts.laporan_magang.edit', compact('laporanmagang','profilemahasiswa'));
    }

    public function download($id) {
    	$laporanmagang = Laporanmagang::find($id);

	    $file = storage_path('app/public/laporanmagang/' . $laporanmagang->laporan_magang);

	    return response()->download($file);
	}

	public function update(Request $request, $id) {
        $user_id = auth()->user()->id;
        $user = auth()->user();
        $this->validate($request, [
        	'judul_laporan' => 'required|string|max:100',
            'laporan_magang' => 'required|mimes:pdf',
        ]);
        $laporanmagang = Laporanmagang::find($id);
        $filename = $laporanmagang->laporan_magang;

        $timezone ='Asia/Jakarta';
        $tanggal = Carbon::now($timezone);

        //JIKA ADA FILE GAMBAR YANG DIKIRIM
        if ($request->hasFile('laporan_magang')) {
            $file = $request->file('laporan_magang');
            $filename = time() . Str::slug($request->judul_laporan) . '.' . $file->getClientOriginalExtension();
            //MAKA UPLOAD FILE TERSEBUT
            $file->storeAs('public/laporanmagang', $filename);
            //DAN HAPUS FILE GAMBAR YANG LAMA
            File::delete(storage_path('app/public/laporanmagang/' . $laporanmagang->laporan_magang));
        }

        $laporanmagang->update([
        	'judul_laporan' => $request->judul_laporan,
            'tanggal_dibuat' => $tanggal->format('Y-m-d'),
        	'waktu_dibuat' => $tanggal->format('H:i:s'),
        	'laporan_magang' => $filename,
            'slug' => $request->judul_laporan,
        ]);
        return redirect(route('laporanmagang.index'))->with(['success' => 'Laporan magang berhasil Diperbarui']);
    }

	public function destroy($id) {
        $laporanmagang = Laporanmagang::find($id);
        File::delete(storage_path('app/public/laporanmagang/' . $laporanmagang->laporan_magang));
        $laporanmagang->delete();
        return redirect(route('laporanmagang.index'))->with(['success' => 'Laporan magang berhasil Dihapus']);
    }

    public function show($id) {
        $laporantt = Laporanmagang::find($id);
        $user_id = auth()->user()->id;
        $profilemahasiswa = Profilemahasiswa::get()->where('user_id', $user_id)->all();

        return view('layouts.laporan_magang.detail', compact('laporantt','profilemahasiswa'));
    }
}
