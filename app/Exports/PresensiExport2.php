<?php

namespace App\Exports;

use App\Presensi;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class PresensiExport2 implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    protected $id;

    public function __construct($id) {
        $this->id = $id;
 	}

    public function view(): View
    {
    	$presensi = Presensi::where('user_id', $this->id)->get();

    	return view('layouts.excel.presensi', [
            'presensis' => $presensi
        ]);
    }
}
