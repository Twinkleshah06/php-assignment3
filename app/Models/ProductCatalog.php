<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCatalog extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'description', 'price', 'stock_quantity', 'image_url'];

    protected $table = 'productsCatalog';

    protected $fillable = ['name', 'description', 'price', 'stock_quantity', 'image_url'];
}

