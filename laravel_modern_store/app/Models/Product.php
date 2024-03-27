<?php

namespace App\Models;

use App\Models\Carts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    public function carts(){
        return $this->hasMany(Carts::class);
    }
}
