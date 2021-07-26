<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profilemahasiswa;
use App\Penilaianmagang;
use Auth;

class LihatpenilaianController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profilemahasiswa = Profilemahasiswa::get()->where('user_id', $user_id)->all();
    	$penilaian_mahasiswa = Penilaianmagang::get()->where('mahasiswa_id', $user_id)->all();
        $penilaian = Penilaianmagang::where('mahasiswa_id', $user_id)->first();

    	return view('layouts.lihat_penilaian.index', compact('penilaian','profilemahasiswa','penilaian_mahasiswa'));
    }
}
