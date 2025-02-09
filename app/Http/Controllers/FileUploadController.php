<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload-form');
    }

    public function handleFileUpload(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Store the file
        $path = $request->file('image')->store('uploads', 'public');

        return back()->with('success', 'File uploaded successfully!')->with('file_path', $path);
    }
}

