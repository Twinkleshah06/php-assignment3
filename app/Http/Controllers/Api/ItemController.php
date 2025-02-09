<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductCatalog;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ItemController extends Controller
{
    // Fetch all items
    public function index()
    {
        try {
            $items = ProductCatalog::all();
            if ($items->isEmpty()) {
                return response()->json([
                    'message' => 'No items found.'
                ], 404);
            }

            return response()->json([
                'data' => $items
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Internal Server Error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Fetch a specific item by ID
    public function show($id)
    {
        try {
            $item = ProductCatalog::findOrFail($id);
            return response()->json([
                'data' => $item
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Item Not Found',
                'message' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Internal Server Error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}

