<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    public function user(){
        return $this->hasOne(User::class);
    }
    public function tour(){
        return $this->hasOne(Tour::class);
    }
}
