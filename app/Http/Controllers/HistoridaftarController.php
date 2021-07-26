<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Pendaftar;
use App\Profilemahasiswa;

class HistoridaftarController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profilemahasiswa = Profilemahasiswa::get()->where('user_id', $user_id)->all();

    	$pendaftar = Pendaftar::where('user_id', $user_id)->get();

    	return view('layouts.histori_pendaftaran.index',compact('pendaftar','profilemahasiswa'));
    }

    public function show($id) {
    	$user_id = auth()->user()->id;
    	$profilemahasiswa = Profilemahasiswa::get()->where('user_id', $user_id)->all();

    	$pendaftar = Pendaftar::find($id);

        return view('layouts.histori_pendaftaran.detail', compact('pendaftar','profilemahasiswa'));
    }
}
