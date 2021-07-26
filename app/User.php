<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'level', 'email', 'password', 'image', 'slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profileadmin(){
        return $this->hasOne(Profileadmin::class);
    }

    public function profileperusahaan(){
        return $this->hasOne(Profileperusahaan::class);
    }

    public function profilemahasiswa(){
        return $this->hasOne(Profilemahasiswa::class);
    }

    public function fotoprofile(){
        return $this->hasOne(Fotoprofile::class);
    }

    public function pasanglowongan(){
        return $this->hasMany(Pasanglowongan::class);
    }

    public function pendaftar(){
        return $this->hasMany(Pendaftar::class);
    }

    public function logbook(){
        return $this->hasMany(Logbook::class);
    }

    public function presensi(){
        return $this->hasMany(Presensi::class);
    }

    public function kodepresensi(){
        return $this->hasOne(Kodepresensi::class);
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
