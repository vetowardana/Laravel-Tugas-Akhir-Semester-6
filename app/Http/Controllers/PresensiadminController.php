<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pasanglowongan;
use App\Profileadmin;
Use \Carbon\Carbon;
use Auth;
use App\Pendaftar;
use App\Presensi;

class PresensiadminController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

        $a = Pasanglowongan::orderBy('nama_lowongan', 'asc')->get();
        $lowongan_selesai = $a->where('status', 'Selesai');

    	return view('layouts.presensi_admin.index',compact('lowongan_selesai','profileadmin'));
    }

    public function show($id) {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$lowongan_selesai = Pasanglowongan::find($id);

    	$a = Pendaftar::orderBy('name', 'asc')->where('lowongan_id', $lowongan_selesai->id)->get();
    	$pendaftarditerima = $a->where('status', 'Diterima');

    	return view('layouts.presensi_admin.detail',compact('lowongan_selesai','profileadmin','pendaftarditerima'));
    }

    public function lihatPresensi($id) {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$pendaftar = Pendaftar::find($id);

    	$lowongan_selesai = Pasanglowongan::where('id', $pendaftar->lowongan_id)->first();

    	$presensi = Presensi::orderBy('created_at', 'asc')->where('user_id', $pendaftar->user_id)->get();

    	return view('layouts.presensi_admin.presensi',compact('pendaftar','profileadmin','presensi','lowongan_selesai'));
    }
}
