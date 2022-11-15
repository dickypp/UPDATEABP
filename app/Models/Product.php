<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function Merek(){
        return $this->belongsTo(Merek::class);
    }

    public function warehouse(){
        return $this->belongsTo(warehouse::class);
    }
}
