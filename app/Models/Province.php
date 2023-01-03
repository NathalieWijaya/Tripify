<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    public function place(){
        return $this->hasMany(Place::class);
    }
    public function requestTrip(){
        return $this->hasMany(RequestTrip::class);
    }
}
