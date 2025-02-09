<?php

namespace App\Http\Controllers;

use App\Models\ProductCatalog;
use Illuminate\Http\Request;

class ProductCatalogController extends Controller
{
    public function index()
    {
        $products = ProductCatalog::all();
        return view('productsCatalog.index', compact('products'));
    }
}

