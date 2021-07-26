<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Laporanmagang;
Use App\User;
use App\Profileperusahaan;
use File;

class LaporanperusahaanController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$a = Laporanmagang::where('perusahaan_id', $user_id);
    	$laporanbaru = $a->orderBy('created_at', 'asc')->get()->where('status', 'Belum Ditandatangani');
    	$laporantt = $a->orderBy('created_at', 'asc')->get()->where('status', 'Ditandatangani');

    	return view('layouts.laporan_perusahaan.index',compact('laporanbaru','profileperusahaan','laporantt'));
    }

    public function edit($id) {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$laporanbaru = Laporanmagang::find($id);

        return view('layouts.laporan_perusahaan.edit', compact('laporanbaru','profileperusahaan'));
    }

    public function update(Request $request, $id) {
        $user_id = auth()->user()->id;
        $user = auth()->user();
        $this->validate($request, [
            'laporan_magang' => 'required|mimes:pdf',
        ]);
        $laporanbaru = Laporanmagang::find($id);
        $filename = $laporanbaru->laporan_magang;

        //JIKA ADA FILE GAMBAR YANG DIKIRIM
        if ($request->hasFile('laporan_magang')) {
            $file = $request->file('laporan_magang');
            $filename = time() . Str::slug($laporanbaru->judul_laporan) . '.' . $file->getClientOriginalExtension();
            //MAKA UPLOAD FILE TERSEBUT
            $file->storeAs('public/laporanmagang', $filename);
            //DAN HAPUS FILE GAMBAR YANG LAMA
            File::delete(storage_path('app/public/laporanmagang/' . $laporanbaru->laporan_magang));
        }

        $laporanbaru->update([
        	'laporan_magang' => $filename,
            'slug' => $laporanbaru->judul_laporan,
            'status' => 'Ditandatangani',
        ]);
        return redirect(route('laporanperusahaan.index'))->with(['success' => 'Laporan magang berhasil Diperbarui']);
    }

    public function show($id) {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$laporantt = Laporanmagang::find($id);

        return view('layouts.laporan_perusahaan.detail', compact('laporantt','profileperusahaan'));
    }
}
