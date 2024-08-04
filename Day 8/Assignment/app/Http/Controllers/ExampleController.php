<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;

class ExampleController extends Controller
{
    public function uploadForm() 
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = 'assets/images';
            $file->move(public_path($path), $filename);

            // Save to database
            $upload = new Upload();
            $upload->filename = $filename;
            $upload->path = $path . '/' . $filename;
            $upload->original_filename = $file->getClientOriginalName();
            $upload->save();

            return redirect()->back()->with('success', 'File uploaded successfully');
        }

        return redirect()->back()->with('error', 'No file uploaded');
    }
}