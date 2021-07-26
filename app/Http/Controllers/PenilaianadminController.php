<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pasanglowongan;
use App\Profileadmin;
Use \Carbon\Carbon;
use Auth;
use App\Pendaftar;
use App\Penilaianmagang;

class PenilaianadminController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

        $a = Pasanglowongan::orderBy('nama_lowongan', 'asc')->get();
        $lowongan_selesai = $a->where('status', 'Selesai');

    	return view('layouts.penilaian_admin.index',compact('lowongan_selesai','profileadmin'));
    }

    public function show($id) {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$lowongan_selesai = Pasanglowongan::find($id);

    	// $a = Pendaftar::orderBy('name', 'asc')->where('lowongan_id', $lowongan_selesai->id)->get();
    	// $pendaftarditerima = $a->where('status', 'Diterima');

    	$penilaian = Penilaianmagang::orderBy('name', 'asc')->where('lowongan_id', $lowongan_selesai->id)->get();

    	return view('layouts.penilaian_admin.detail',compact('lowongan_selesai','profileadmin','penilaian'));
    }

    // public function lihatPenilaian($id) {
    // 	$user_id = auth()->user()->id;
    // 	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    // 	$pendaftar = Pendaftar::find($id);

    // 	$lowongan_selesai = Pasanglowongan::where('id', $pendaftar->lowongan_id)->first();

    // 	$penilaian = Penilaianmagang::orderBy('created_at', 'asc')->where('user_id', $pendaftar->user_id)->get();

    // 	return view('layouts.penilaian_admin.penilaian',compact('pendaftar','profileadmin','penilaian','lowongan_selesai'));
    // }

    public function detailPenilaian($id) {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$penilaian = Penilaianmagang::find($id);

    	$lowongan_selesai = Pasanglowongan::where('id', $penilaian->lowongan_id)->first();

    	// $pendaftar = Pendaftar::where('user_id', $penilaian->user_id)->first();

    	return view('layouts.penilaian_admin.penilaiandetail',compact('profileadmin','penilaian','lowongan_selesai'));
    }
}
