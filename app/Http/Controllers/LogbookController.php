<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profilemahasiswa;
use App\Logbook;
use App\Pendaftar;
use Auth;
Use \Carbon\Carbon;
use Excel;
use App\Exports\LogbookExport;

class LogbookController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profilemahasiswa = Profilemahasiswa::get()->where('user_id', $user_id)->all();
    	$logbook = Logbook::get()->where('user_id', $user_id)->all();

    	return view('layouts.logbook.index', compact('logbook','profilemahasiswa'));
    }

    public function store(Request $request) {
    	$user_id = auth()->user()->id;
    	$user = auth()->user();
    	$a = Pendaftar::where('user_id', $user_id);
        $pendaftar = $a->where('status', 'Diterima')->first();
        $b = Pendaftar::where('user_id', $user_id)->get();
        $pendaftar2 = $b->where('status', 'Diterima')->count();
    	$this->validate($request, [
            'jenis_kegiatan' => 'required|string|max:100',
            'uraian_kegiatan' => 'required',
        ]);

    	$timezone ='Asia/Jakarta';
        $tanggal = Carbon::now($timezone);

        if ($pendaftar2 > 0) {
            $logbook = Logbook::create([
                'user_id' => $user_id,
                'perusahaan_id' => $pendaftar->perusahaan_id,
                'lowongan_id' => $pendaftar->lowongan_id,
                'name' => $user->name,
                'nama_perusahaan' => $pendaftar->nama_perusahaan,
                'nama_lowongan' => $pendaftar->nama_lowongan,
                'jenis_kegiatan' => $request->jenis_kegiatan,
                'uraian_kegiatan' => $request->uraian_kegiatan,
                'tanggal_kegiatan' => $tanggal->format('Y-m-d'),
                'waktu_kegiatan' => $tanggal->format('H:i:s'),
            ]);
            return redirect(route('logbook.index'))->with(['success' => 'Logbook berhasil ditambahkan']);
        }
        return redirect(route('logbook.index'))->with(['error' => 'Cari lowongan terlebih dahulu :)']);
    }

    public function edit($id) {
        $logbook = Logbook::find($id);
        $user_id = auth()->user()->id;
        $profilemahasiswa = Profilemahasiswa::get()->where('user_id', $user_id)->all();

        return view('layouts.logbook.edit', compact('logbook','profilemahasiswa'));
    }

    public function update(Request $request, $id) {
    	$user_id = auth()->user()->id;
    	$this->validate($request, [
            'jenis_kegiatan' => 'required|string|max:100',
            'uraian_kegiatan' => 'required',
        ]);

        $logbook = Logbook::find($id);

        $timezone ='Asia/Jakarta';
        $tanggal = Carbon::now($timezone);

        $logbook->update([
            'user_id' => $user_id,
            'jenis_kegiatan' => $request->jenis_kegiatan,
        	'uraian_kegiatan' => $request->uraian_kegiatan,
        	'tanggal_kegiatan' => $tanggal->format('Y-m-d'),
        	'waktu_kegiatan' => $tanggal->format('H:i:s'),
        ]);
        return redirect(route('logbook.index'))->with(['success' => 'Data Logbook Diperbaharui']);
    }

    public function destroy($id) {
        $logbook = Logbook::find($id);
        $logbook->delete();
        return redirect(route('logbook.index'))->with(['success' => 'Logbook Sudah Dihapus']);
    }

    public function exportLogbook()
    {
        $user = auth()->user();
        $filename = 'data-logbook-'.$user->name.'.xlsx';
        return (new LogbookExport)->download($filename);
    }
}
