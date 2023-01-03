<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    public function tourCategory(){
        return $this->hasMany(TourCategory::class);
    }

    public function tourPlace(){
        return $this->hasMany(TourPlace::class);
    }

    public function transactionDetails(){
        return $this->hasMany(TransactionDetail::class);
    }
}
