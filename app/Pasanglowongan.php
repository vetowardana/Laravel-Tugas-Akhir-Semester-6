<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pasanglowongan extends Model
{
    protected $guarded = [];

    //SEDANGKAN INI ADALAH MUTATORS, PENJELASANNYA SAMA DENGAN ARTIKEL SEBELUMNYA
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value); 
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pendaftar(){
        return $this->hasMany(Pendaftar::class);
    }

    public function kodepresensi(){
        return $this->hasOne(Kodepresensi::class);
    }
}
