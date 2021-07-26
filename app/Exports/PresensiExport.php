<?php

namespace App\Exports;

use App\Presensi;
use Auth;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class PresensiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function view(): View
    {
    	$user_id = auth()->user()->id;
    	$presensi = Presensi::where('user_id', $user_id)->get();

    	return view('layouts.excel.presensi', [
            'presensis' => $presensi
        ]);
    }
}
