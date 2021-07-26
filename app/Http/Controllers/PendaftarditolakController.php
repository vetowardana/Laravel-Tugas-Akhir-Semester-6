<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pendaftar;
Use App\User;
use App\Profileperusahaan;

class PendaftarditolakController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$p_ditolak = Pendaftar::where('perusahaan_id', $user_id);
    	$pendaftarditolak = $p_ditolak->orderBy('created_at', 'asc')->get()->where('status', 'Ditolak');

    	return view('layouts.manajemen_pendaftar.pendaftar_ditolak.index',compact('profileperusahaan','pendaftarditolak'));
    }

    public function show($id) {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$pendaftarditolak = Pendaftar::find($id);

        return view('layouts.manajemen_pendaftar.pendaftar_ditolak.detail', compact('pendaftarditolak','profileperusahaan'));
    }
}
