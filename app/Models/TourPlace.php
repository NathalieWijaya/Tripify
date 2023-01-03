<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPlace extends Model
{
    use HasFactory;
    public function tour(){
        return $this->belongsTo(Tour::class);
    }

    public function place(){
        return $this->belongsTo(Place::class);
    }
}
