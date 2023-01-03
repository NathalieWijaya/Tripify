<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    public function province(){
        return $this->belongsTo(Province::class);
    }

    public function requestPlace(){
        return $this->hasMany(RequestPlace::class);
    }
}
