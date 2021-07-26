<?php

namespace App\Exports;

use App\Logbook;
use Auth;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class LogbookExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function view(): View
    {
        $user_id = auth()->user()->id;
    	$logbook = Logbook::where('user_id', $user_id)->get();

    	return view('layouts.excel.logbook', [
            'logbooks' => $logbook
        ]);
    }
}
