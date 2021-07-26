<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profilemahasiswa;
use App\Presensi;
use App\Kodepresensi;
use App\Pendaftar;
use Auth;
Use \Carbon\Carbon;
use Excel;
use App\Exports\PresensiExport;

class PresensiController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profilemahasiswa = Profilemahasiswa::get()->where('user_id', $user_id)->all();
    	$presensi = Presensi::get()->where('user_id', $user_id)->all();

    	return view('layouts.presensi.index', compact('presensi','profilemahasiswa'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'kode_presensi' => 'required',
        ]);

    	$user_id = auth()->user()->id;
    	$user = auth()->user();
    	$b = Pendaftar::where('user_id', $user_id);
        $pendaftar = $b->where('status', 'Diterima')->first();
        $pendaftar2 = Pendaftar::where('user_id', $user_id)->get();
        $a = $pendaftar2->where('status', 'Diterima')->count();
        if (!empty($pendaftar)) {
            $kode = Kodepresensi::where('lowongan_id', $pendaftar->lowongan_id)->first();
        }
        
    	$timezone ='Asia/Jakarta';
        $tanggal = Carbon::now($timezone);

        $datapresensi = Presensi::where([
            ['user_id','=',$user_id],
            ['name','=',$user->name],
            ['tanggal_presensi','=',$tanggal->format('Y-m-d')],
        ])->first();

        if ($a > 0) {
            if (is_null($kode)) {
                return redirect(route('presensi.index'))->with(['error' => 'Belum waktunya presensi !']);
            }
            else {
                if ($request->kode_presensi == $kode->kode_presensi) {
                    if ($datapresensi) {
                        return redirect(route('presensi.index'))->with(['error' => 'Anda sudah presensi hari ini !']);
                    }
                    else {
                        $presensi = Presensi::create([
                            'user_id' => $user_id,
                            'perusahaan_id' => $pendaftar->perusahaan_id,
                            'lowongan_id' => $pendaftar->lowongan_id,
                            'name' => $user->name,
                            'nama_perusahaan' => $pendaftar->nama_perusahaan,
                            'nama_lowongan' => $pendaftar->nama_lowongan,
                            'tanggal_presensi' => $tanggal->format('Y-m-d'),
                            'waktu_presensi' => $tanggal->format('H:i:s'),
                        ]);
                        return redirect(route('presensi.index'))->with(['success' => 'Presensi berhasil :)']);
                    }
                    return redirect(route('presensi.index'))->with(['error' => 'Error']);
                }
                return redirect(route('presensi.index'))->with(['error' => 'Kode presensi salah !']);
            }
        }
        return redirect(route('presensi.index'))->with(['error' => 'Cari lowongan terlebih dahulu !']);   
    }

    public function destroy($id)
    {
        $presensi = Presensi::find($id);
        $presensi->delete();

        return redirect(route('presensi.index'))->with(['success' => 'Presensi berhasil dihapus :)']);
    }

    public function exportPresensi()
    {
        $user = auth()->user();
        $filename = 'data-presensi-'.$user->name.'.xlsx';
        return (new PresensiExport)->download($filename);
    }
}
