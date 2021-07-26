<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pendaftar;
Use App\User;
use App\Profileperusahaan;

class PendaftarbaruController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$p_baru = Pendaftar::where('perusahaan_id', $user_id);
    	$pendaftarbaru = $p_baru->orderBy('created_at', 'asc')->get()->where('status', 'Belum Diterima');

    	return view('layouts.manajemen_pendaftar.pendaftar_baru.index',compact('pendaftarbaru','profileperusahaan'));
    }

    public function edit($id) {
    	$user_id = auth()->user()->id;
    	$profileperusahaan = Profileperusahaan::get()->where('user_id', $user_id)->all();

    	$pendaftarbaru = Pendaftar::find($id);

        return view('layouts.manajemen_pendaftar.pendaftar_baru.detail', compact('pendaftarbaru','profileperusahaan'));
    }

    public function download($id) {
    	$pendaftarbaru = Pendaftar::find($id);

	    $file = storage_path('app/public/aplikan/' . $pendaftarbaru->surat_permohonan);

	    return response()->download($file);
	}

	public function update(Request $request, $id) {
    	// dd($request->all());
    	$this->validate($request, [
            'status' => 'required',
            'alasan' => 'required'
        ]);

        $pendaftarbaru = Pendaftar::find($id);

        if ($request->status == 'Diterima') {
        	$pendaftarbaru->update([
	        	'status' => $request->status,
                'alasan' => $request->alasan
	        ]);
	        return redirect(route('pendaftarbaru.index'))->with(['success' => 'Pendaftar Diterima']);
        }
        elseif ($request->status == 'Ditolak') {
        	$pendaftarbaru->update([
	        	'status' => $request->status,
                'alasan' => $request->alasan
	        ]);
	        return redirect(route('pendaftarbaru.index'))->with(['success' => 'Pendaftar Ditolak']);
        }
        return redirect(route('pendaftarbaru.index'))->with(['error' => 'Error']);
    }
}
