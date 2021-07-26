<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pasanglowongan;
use App\Profileadmin;
Use \Carbon\Carbon;
use Auth;
use App\Sertifikatmagang;

class SertifikatadminController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

        $a = Pasanglowongan::orderBy('nama_lowongan', 'asc')->get();
        $lowongan_selesai = $a->where('status', 'Selesai');

    	return view('layouts.sertifikat_admin.index',compact('lowongan_selesai','profileadmin'));
    }

    public function show($id) {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$lowongan_selesai = Pasanglowongan::find($id);

    	$sertifikat = Sertifikatmagang::orderBy('name', 'asc')->where('lowongan_id', $lowongan_selesai->id)->get();

    	return view('layouts.sertifikat_admin.detail',compact('lowongan_selesai','profileadmin','sertifikat'));
    }

    public function detailSertifikat($id) {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$sertifikat = Sertifikatmagang::find($id);

    	$lowongan_selesai = Pasanglowongan::where('id', $sertifikat->lowongan_id)->first();

    	return view('layouts.sertifikat_admin.sertifikatdetail',compact('profileadmin','sertifikat','lowongan_selesai'));
    }
}
