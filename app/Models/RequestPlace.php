<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestPlace extends Model
{
    use HasFactory;

    public function requestTrip(){
        return $this->belongsTo(RequestTrip::class);
    }

    public function place() {
        return $this->belongsTo(Place::class);
    }
}
