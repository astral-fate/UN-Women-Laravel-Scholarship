<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clas;

class ClasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all cars from database
        // return view all cars, cars data
        // select * from cars;
        $class = Clas::get();

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
        Clas::create([
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
    public function edit($id)
    {
        // get data of car to be updated
        // select 
        $car = Clas::findOrFail($id);
        return view('edit_class', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}