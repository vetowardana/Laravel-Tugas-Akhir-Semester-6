<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pasanglowongan;
use App\Profileperusahaan;
Use \Carbon\Carbon;
use Auth;
use App\Pendaftar;
use App\Logbook;
use Excel;
use App\Exports\LogbookExport2;

class LogbookperusahaanController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

        $a = Pasanglowongan::orderBy('nama_lowongan', 'asc')->where('user_id', $user_id)->get();
        $lowongan_selesai = $a->where('status', 'Selesai');

    	return view('layouts.logbook_perusahaan.index',compact('lowongan_selesai','profileperusahaan'));
    }

    public function show($id) {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$lowongan_selesai = Pasanglowongan::find($id);

    	$a = Pendaftar::orderBy('name', 'asc')->where('lowongan_id', $lowongan_selesai->id)->get();
    	$pendaftarditerima = $a->where('status', 'Diterima');

    	return view('layouts.logbook_perusahaan.detail',compact('lowongan_selesai','profileperusahaan','pendaftarditerima'));
    }

    public function lihatLogbook($id) {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$pendaftar = Pendaftar::find($id);

    	$lowongan_selesai = Pasanglowongan::where('id', $pendaftar->lowongan_id)->first();

    	$logbook = Logbook::orderBy('created_at', 'asc')->where('user_id', $pendaftar->user_id)->get();

    	return view('layouts.logbook_perusahaan.logbook',compact('pendaftar','profileperusahaan','logbook','lowongan_selesai'));
    }

    public function detailLogbook($id) {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$logbook = Logbook::find($id);

    	$lowongan_selesai = Pasanglowongan::where('id', $logbook->lowongan_id)->first();

    	$pendaftar = Pendaftar::where('user_id', $logbook->user_id)->first();

    	return view('layouts.logbook_perusahaan.logbookdetail',compact('pendaftar','profileperusahaan','logbook','lowongan_selesai'));
    }

    public function exportLogbook($id)
    {
        $pendaftar = Pendaftar::find($id);
        $filename = 'data-logbook-'.$pendaftar->name.'.xlsx';
        return (new LogbookExport2($pendaftar->user_id))->download($filename);
    }
}
