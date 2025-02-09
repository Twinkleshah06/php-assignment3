<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ProductCatalog;
use Illuminate\Database\Seeder;

class ProductCatalogSeeder extends Seeder
{
    public function run()
    {
        ProductCatalog::create([
            'name' => 'Sample Product 1',
            'description' => 'This is a sample product description.',
            'price' => 19.99,
            'stock_quantity' => 10,
            'image_url' => 'https://via.placeholder.com/150'
        ]);

        ProductCatalog::create([
            'name' => 'Sample Product 2',
            'description' => 'Another sample product description.',
            'price' => 29.99,
            'stock_quantity' => 5,
            'image_url' => 'https://via.placeholder.com/150'
        ]);
    }
}

