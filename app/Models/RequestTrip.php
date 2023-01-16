<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTrip extends Model
{
    use HasFactory;

    protected $fillable = ['note'];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function province(){
        return $this->belongsTo(Province::class);
    }

    public function requestPlace(){
        return $this->hasMany(RequestPlace::class);
    }
}
