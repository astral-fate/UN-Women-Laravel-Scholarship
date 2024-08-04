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
        $classes = Classes::get();
        return view('classes', compact('classes'));
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
        $data = $request->validate([
            'carTitle' => 'required|string',
            'description' => 'required|string|max:1000',
            'price' => 'required',
            'date_from' => 'required|date',
            'date_to' => 'required|date|after:date_from',
            'capacity' => 'required|integer|min:1',
        ]);
        
        // Explicitly set boolean fields based on checkbox presence
        $data['published'] = $request->has('published');
        $data['is_filled'] = $request->has('is_filled');
        
        Classes::create($data);
        return redirect()->route('classes.index')->with('success', 'Class created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = Classes::findOrFail($id);
        return view('class_details', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = Classes::findOrFail($id);
        return view('edit_class', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'carTitle' => 'required|string',
            'description' => 'required|string|max:1000',
            'price' => 'required',
            'date_from' => 'required|date',
            'date_to' => 'required|date|after:date_from',
            'capacity' => 'required|integer|min:1',
        ]);
        
        // Explicitly set boolean fields based on checkbox presence
        $data['published'] = $request->has('published');
        $data['is_filled'] = $request->has('is_filled');

        Classes::where('id', $id)->update($data);
        return redirect()->route('classes.index')->with('success', 'Class updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Classes::where('id', $id)->delete();
        return redirect()->route('classes.index')->with('success', 'Class deleted successfully');
    }

    public function showDeleted() 
    {
        $classes = Classes::onlyTrashed()->get();
        return view('trashedClasses', compact('classes'));
    }
    
    public function restore(string $id) 
    {
        Classes::where('id', $id)->restore();
        return redirect()->route('classes.showDeleted')->with('success', 'Class restored successfully');
    }

    public function forceDelete(string $id) 
    {
        Classes::where('id', $id)->forceDelete();
        return redirect()->route('classes.index')->with('success', 'Class permanently deleted');
    }
}