<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅ Import HasFactory

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['name', 'price'];
}
