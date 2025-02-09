<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

// class HeaderController extends Controller
// {
//     /**
//      * Handle the request and return custom header value.
//      */
//     public function getCustomHeader(Request $request): JsonResponse
//     {
//         $customHeader = $request->header('X-Custom-Header');

//         if (!$customHeader) {
//             return response()->json(['error' => 'X-Custom-Header not found'], 400);
//         }

//         return response()->json([
//             'message' => 'Header received successfully',
//             'header_value' => $customHeader,
//         ]);
//     }
// }

class HeaderController extends Controller
{
    public function getHeaderValue(Request $request)
    {
        // Retrieve the custom header (default to null if not present)
        $customHeader = $request->header('X-Custom-Header');

        if (!$customHeader) {
            return response()->json(['error' => 'X-Custom-Header not provided'], 400);
        }

        return response()->json([
            'message' => 'Header received successfully',
            'header_value' => $customHeader
        ]);
    }
}


