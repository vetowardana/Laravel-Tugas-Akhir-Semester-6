<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use App\Pasanglowongan;
Use App\User;
use App\Profileadmin;

class LowonganditerimaController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$lowonganditerima = Pasanglowongan::orderBy('created_at', 'asc')->get()->where('status', 'Diterima');

    	return view('layouts.manajemen_lowongan.lowongan_diterima.index',compact('lowonganditerima','profileadmin'));
    }

    public function show($id) {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$lowonganditerima = Pasanglowongan::find($id);

        return view('layouts.manajemen_lowongan.lowongan_diterima.detail', compact('lowonganditerima','profileadmin'));
    }

    public function destroy($id) {
        $lowonganditerima = Pasanglowongan::find($id);
        File::delete(storage_path('app/public/pasanglowongan/' . $lowonganditerima->image));
        $lowonganditerima->delete();
        return redirect(route('lowonganditerima.index'))->with(['success' => 'Lowongan Sudah Dihapus']);
    }
}
