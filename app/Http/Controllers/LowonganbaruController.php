<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pasanglowongan;
Use App\User;
use App\Profileadmin;

class LowonganbaruController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$lowonganbaru = Pasanglowongan::orderBy('created_at', 'asc')->get()->where('status', 'Belum Aktif');

    	return view('layouts.manajemen_lowongan.lowongan_baru.index',compact('lowonganbaru','profileadmin'));
    }

    public function edit($id) {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$lowonganbaru = Pasanglowongan::find($id);

        return view('layouts.manajemen_lowongan.lowongan_baru.detail', compact('lowonganbaru','profileadmin'));
    }

    public function update(Request $request, $id) {
    	// dd($request->all());
    	$this->validate($request, [
            'status' => 'required',
            'alasan' => 'required'
        ]);

        $lowonganbaru = Pasanglowongan::find($id);

        if ($request->status == 'Diterima') {
        	$lowonganbaru->update([
	        	'status' => $request->status,
                'alasan' => $request->alasan
	        ]);
	        return redirect(route('lowonganbaru.index'))->with(['success' => 'Lowongan Diterima']);
        }
        elseif ($request->status == 'Ditolak') {
        	$lowonganbaru->update([
	        	'status' => $request->status,
                'alasan' => $request->alasan
	        ]);
	        return redirect(route('lowonganbaru.index'))->with(['success' => 'Lowongan Ditolak']);
        }
        return redirect(route('lowonganbaru.index'))->with(['error' => 'Error']);
    }
}
