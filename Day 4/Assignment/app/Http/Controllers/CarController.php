<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_car');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Set default values for checkboxes if they are not present in the request
        $request->merge([
            'published' => $request->has('published') ? 1 : 0,
            'is_filled' => $request->has('is_filled') ? 1 : 0,
        ]);

        // Log the request data for debugging
        \Log::info($request->all());

        // Validate the request data
        $validatedData = $request->validate([
            'carTitle' => 'required|string|max:100',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'published' => 'required|boolean',
            'capacity' => 'required|integer',
            'date_from' => 'required|date',
            'date_to' => 'required|date',
            'is_filled' => 'required|boolean',
        ]);

        // Log the validated data for debugging
        \Log::info($validatedData);

        // Create a new car record with the validated data
        Car::create($validatedData);

        return redirect()->back()->with('success', 'Car added successfully');
    }
}
