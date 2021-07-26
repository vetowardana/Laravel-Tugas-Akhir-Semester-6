<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kodepresensi extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pasanglowongan(){
        return $this->belongsTo(Pasanglowongan::class);
    }
}
