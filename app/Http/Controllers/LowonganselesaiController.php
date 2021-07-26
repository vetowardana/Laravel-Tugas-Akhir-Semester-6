<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use App\Pasanglowongan;
Use App\User;
use App\Profileadmin;

class LowonganselesaiController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$lowonganselesai = Pasanglowongan::orderBy('created_at', 'asc')->get()->where('status', 'Selesai');

    	return view('layouts.manajemen_lowongan.lowongan_selesai.index',compact('lowonganselesai','profileadmin'));
    }

    public function show($id) {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$lowonganselesai = Pasanglowongan::find($id);

        return view('layouts.manajemen_lowongan.lowongan_selesai.detail', compact('lowonganselesai','profileadmin'));
    }

    public function destroy($id) {
        $lowonganselesai = Pasanglowongan::find($id);
        File::delete(storage_path('app/public/pasanglowongan/' . $lowonganselesai->image));
        $lowonganselesai->delete();
        return redirect(route('lowonganselesai.index'))->with(['success' => 'Lowongan Sudah Dihapus']);
    }
}
