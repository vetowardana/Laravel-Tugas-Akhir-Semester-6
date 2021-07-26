<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use App\Pasanglowongan;
Use App\User;
use App\Profileadmin;

class LowonganditolakController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$lowonganditolak = Pasanglowongan::orderBy('created_at', 'asc')->get()->where('status', 'Ditolak');

    	return view('layouts.manajemen_lowongan.lowongan_ditolak.index',compact('lowonganditolak','profileadmin'));
    }

    public function show($id) {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$lowonganditolak = Pasanglowongan::find($id);

        return view('layouts.manajemen_lowongan.lowongan_ditolak.detail', compact('lowonganditolak','profileadmin'));
    }

    public function destroy($id) {
        $lowonganditolak = Pasanglowongan::find($id);
        File::delete(storage_path('app/public/pasanglowongan/' . $lowonganditolak->image));
        $lowonganditolak->delete();
        return redirect(route('lowonganditolak.index'))->with(['success' => 'Lowongan Sudah Dihapus']);
    }
}
