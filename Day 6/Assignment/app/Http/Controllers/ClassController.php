<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class = Classes::get();
        return view('class', compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Classes::create([
            // 'k' => 'v'
            'carTitle' => $request->carTitle,
            'description' => $request->description,
            'price' => $request->price,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'capacity' => $request->capacity,
            'is_filled' => isset($request->is_filled),

        ]);

        return "Data added successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = Classes::findOrFail($id);
        return view('class_details', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $data = [
            'carTitle' => $request->carTitle,
            'description' => $request->description,
            'price' => $request->price,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'capacity' => $request->capacity,
            'is_filled' => isset($request->is_filled),
        ];

        Classes::where('id', $id)->update($data);

        return "data updated successfully";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = Classes::findOrFail($id);
        $class->delete();
        
        return redirect()->route('class.index')->with('success', 'Car deleted successfully');
    }
}
