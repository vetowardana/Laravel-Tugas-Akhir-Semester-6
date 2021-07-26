<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profilemahasiswa;
use App\Sertifikatmagang;
use Auth;

class LihatsertifikatController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profilemahasiswa = Profilemahasiswa::get()->where('user_id', $user_id)->all();
    	$sertifikat_mahasiswa = Sertifikatmagang::get()->where('mahasiswa_id', $user_id)->all();
        $sertifikat = Sertifikatmagang::where('mahasiswa_id', $user_id)->first();

    	return view('layouts.lihat_sertifikat.index', compact('sertifikat','profilemahasiswa','sertifikat_mahasiswa'));
    }
}
