<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Pasanglowongan;
use App\Profileperusahaan;
Use \Carbon\Carbon;
use Auth;
use App\Pendaftar;
use App\Presensi;
use App\Kodepresensi;
use Excel;
use App\Exports\PresensiExport2;

class PresensiperusahaanController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

        $a = Pasanglowongan::orderBy('nama_lowongan', 'asc')->where('user_id', $user_id)->get();
        $lowongan_selesai = $a->where('status', 'Selesai');

    	return view('layouts.presensi_perusahaan.index',compact('lowongan_selesai','profileperusahaan'));
    }

    public function buatKode($id) {
        $user_id = auth()->user()->id;
        $profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

        $lowongan_selesai = Pasanglowongan::find($id);

        $timezone ='Asia/Jakarta';
        $tanggal = Carbon::now($timezone);

        $kode = Kodepresensi::create([
            'user_id' => $user_id,
            'lowongan_id' => $lowongan_selesai->id,
            'nama_perusahaan' => $lowongan_selesai->nama_Perusahaan,
            'nama_lowongan' => $lowongan_selesai->nama_lowongan,
            'tanggal' => $tanggal->format('Y-m-d'),
            'waktu' => $tanggal->format('H:i:s'),
            'kode_presensi' => Str::random(5),
        ]);
        return redirect()->back()->with(['success' => 'Kode presensi berhasil dibuat']);
    }

    public function edit($id) {
        $user_id = auth()->user()->id;
        $profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

        $lowongan_selesai = Pasanglowongan::find($id);

        $timezone ='Asia/Jakarta';
        $tanggal = Carbon::now($timezone);

        $a = Kodepresensi::where('lowongan_id', $lowongan_selesai->id);
        $kode = $a->where('tanggal', $tanggal->format('Y-m-d'))->first();

        $b = Presensi::orderBy('created_at', 'asc')->where('lowongan_id', $lowongan_selesai->id);
        $presensi = $b->where('tanggal_presensi', $tanggal->format('Y-m-d'))->get();

        $c = Kodepresensi::where('lowongan_id', $lowongan_selesai->id);
        $kode2 = $c->where('tanggal', $tanggal->format('Y-m-d'))->get();

        return view('layouts.presensi_perusahaan.edit',compact('lowongan_selesai','profileperusahaan','presensi','kode','kode2'));
    }

    public function hapusKode($id)
    {
        $kode = Kodepresensi::find($id);
        $kode->delete();

        return redirect(route('presensiperusahaan.index'))->with(['success' => 'Presensi selesai :)']);
    }

    public function show($id) {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$lowongan_selesai = Pasanglowongan::find($id);

    	$a = Pendaftar::orderBy('name', 'asc')->where('lowongan_id', $lowongan_selesai->id)->get();
    	$pendaftarditerima = $a->where('status', 'Diterima');

    	return view('layouts.presensi_perusahaan.detail',compact('lowongan_selesai','profileperusahaan','pendaftarditerima'));
    }

    public function lihatPresensi($id) {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$pendaftar = Pendaftar::find($id);

    	$lowongan_selesai = Pasanglowongan::where('id', $pendaftar->lowongan_id)->first();

    	$presensi = Presensi::orderBy('created_at', 'asc')->where('user_id', $pendaftar->user_id)->get();

    	return view('layouts.presensi_perusahaan.presensi',compact('pendaftar','profileperusahaan','presensi','lowongan_selesai'));
    }

    public function destroy($id)
    {
        $presensi = Presensi::find($id);
        $presensi->delete();

        return redirect()->back()->with(['success' => 'Presensi berhasil dihapus :)']);
    }

    public function exportPresensi($id)
    {
        $pendaftar = Pendaftar::find($id);
        $filename = 'data-presensi-'.$pendaftar->name.'.xlsx';
        return (new PresensiExport2($pendaftar->user_id))->download($filename);
    }
}
