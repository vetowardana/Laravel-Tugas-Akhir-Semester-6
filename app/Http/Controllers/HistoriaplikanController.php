<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Pendaftar;
use App\Profileadmin;

class HistoriaplikanController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$pendaftar = Pendaftar::get();

    	return view('layouts.histori_aplikan.index',compact('pendaftar','profileadmin'));
    }

    public function show($id) {
    	$user_id = auth()->user()->id;
    	$profileadmin = Profileadmin::get()->where('user_id', $user_id)->all();

    	$pendaftar = Pendaftar::find($id);

        return view('layouts.histori_aplikan.detail', compact('pendaftar','profileadmin'));
    }
}
