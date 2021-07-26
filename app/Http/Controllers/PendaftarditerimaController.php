<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pendaftar;
Use App\User;
use App\Profileperusahaan;

class PendaftarditerimaController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$p_diterima = Pendaftar::where('perusahaan_id', $user_id);
    	$pendaftarditerima = $p_diterima->orderBy('created_at', 'asc')->get()->where('status', 'Diterima');

    	return view('layouts.manajemen_pendaftar.pendaftar_diterima.index',compact('profileperusahaan','pendaftarditerima'));
    }

    public function show($id) {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$pendaftarditerima = Pendaftar::find($id);

        return view('layouts.manajemen_pendaftar.pendaftar_diterima.detail', compact('pendaftarditerima','profileperusahaan'));
    }
}
