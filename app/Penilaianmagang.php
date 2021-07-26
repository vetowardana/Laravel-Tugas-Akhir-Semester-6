<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Penilaianmagang extends Model
{
    protected $guarded = [];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value); 
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pendaftar(){
        return $this->belongsTo(Pendaftar::class);
    }
}
