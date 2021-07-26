<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
use App\profileadmin;
use App\profileperusahaan;
use App\profilemahasiswa;
use App\Pasanglowongan;
use App\Pendaftar;
use App\Presensi;
use App\Logbook;
use App\Laporanmagang;
use App\Penilaianmagang;
use App\Sertifikatmagang;

class FrontController extends Controller
{
    public function Index() {
        // User ID
    	$user_id = auth()->user()->id;
        // Profile
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();
    	$profilemahasiswa = Profilemahasiswa::get()->where('user_id', $user_id)->all();
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();
        // Lowongan
    	$lowongan_baru = Pasanglowongan::orderBy('created_at', 'asc')->get()->where('status', 'Belum Aktif');
        $lowonganperusahaan = Pasanglowongan::where('user_id', $user_id)->get();
        $jml_lowongan_ditolak = Pasanglowongan::where('status', 'Ditolak')->get();
        $jumlah_lowongan = Pasanglowongan::count();
        $jumlah_lowongan_ditolak = $jml_lowongan_ditolak->count();
        $lowongan_aktif = $lowonganperusahaan->where('status', 'Diterima')->count();
        $lowongan_ditolak = $lowonganperusahaan->where('status', 'Ditolak')->count();
        // Jumlah User
    	$jumlah_user = User::count();
        // Pendaftar
        $p_baru = Pendaftar::where('perusahaan_id', $user_id);
        $pendaftar_baru = $p_baru->orderBy('created_at', 'asc')->get()->where('status', 'Belum Diterima');
        $pendaftar = Pendaftar::where('perusahaan_id', $user_id)->get();
        $p_user = Pendaftar::where('user_id', $user_id)->get();
        $p_user3 = Pendaftar::where('user_id', $user_id)->first();
        $p_user2 = $p_user->where('status', 'Diterima')->count();
        $pendaftar_diterima = $pendaftar->where('status', 'Diterima')->count();
        $pendaftar_ditolak = $pendaftar->where('status', 'Ditolak')->count();

        // Jumlah arsip
        $jml_laporan = Laporanmagang::count();
        $jml_penilaian = Penilaianmagang::count();
        $jml_sertifikat = Sertifikatmagang::count();
        $jml_pendaftar = Pendaftar::count();
        $jml_presensi = User::has('presensi')->count();
        $jml_logbook = User::has('logbook')->count();

        $jml_arsip = $jml_laporan + $jml_penilaian + $jml_sertifikat + $jml_pendaftar + $jml_presensi + $jml_logbook;

    	return view('layouts.user.dashboard', compact('jumlah_user','jumlah_lowongan','profileadmin','profilemahasiswa','profileperusahaan','lowongan_baru','lowongan_aktif','lowongan_ditolak','jumlah_lowongan_ditolak','pendaftar_baru','pendaftar_diterima','pendaftar_ditolak','p_user','p_user2','p_user3','jml_arsip'));
    }
}
