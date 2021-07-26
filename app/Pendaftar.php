<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pendaftar extends Model
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

    public function pasanglowongan(){
    	return $this->belongsTo(Pasanglowongan::class);
    }

    public function presensi(){
        return $this->hasMany(Presensi::class);
    }

    public function logbook(){
        return $this->hasMany(Logbook::class);
    }

    public function laporanmagang(){
        return $this->hasMany(Laporanmagang::class);
    }

    public function penilaiannmagang(){
        return $this->hasMany(Penilaianmagang::class);
    }

    public function sertifikatmagang(){
        return $this->hasMany(Sertifikatmagang::class);
    }
}
