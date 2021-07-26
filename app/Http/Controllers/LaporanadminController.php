<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pasanglowongan;
use App\Profileadmin;
Use \Carbon\Carbon;
use Auth;
use App\Pendaftar;
use App\Laporanmagang;

class LaporanadminController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

        $a = Pasanglowongan::orderBy('nama_lowongan', 'asc')->get();
        $lowongan_selesai = $a->where('status', 'Selesai');

    	return view('layouts.laporan_admin.index',compact('lowongan_selesai','profileadmin'));
    }

    public function show($id) {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$lowongan_selesai = Pasanglowongan::find($id);

    	$a = Pendaftar::orderBy('name', 'asc')->where('lowongan_id', $lowongan_selesai->id)->get();
    	$pendaftarditerima = $a->where('status', 'Diterima');

    	return view('layouts.laporan_admin.detail',compact('lowongan_selesai','profileadmin','pendaftarditerima'));
    }

    public function lihatLaporan($id) {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$pendaftar = Pendaftar::find($id);

    	$lowongan_selesai = Pasanglowongan::where('id', $pendaftar->lowongan_id)->first();

    	$a = Laporanmagang::orderBy('created_at', 'asc')->where('user_id', $pendaftar->user_id)->get();
    	$laporantt = $a->where('status', 'Ditandatangani');
    	$laporanbt = $a->where('status', 'Belum Ditandatangani');
    	$abc = $laporanbt->count();

    	return view('layouts.laporan_admin.laporan',compact('pendaftar','profileadmin','laporantt','lowongan_selesai','laporanbt','abc'));
    }

    public function detailLaporan($id) {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$laporan = Laporanmagang::find($id);

    	$lowongan_selesai = Pasanglowongan::where('id', $laporan->lowongan_id)->first();

    	$pendaftar = Pendaftar::where('user_id', $laporan->user_id)->first();

    	return view('layouts.laporan_admin.laporandetail',compact('pendaftar','profileadmin','laporan','lowongan_selesai'));
    }
}
