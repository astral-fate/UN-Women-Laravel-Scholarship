<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->take(3)->get();
        return view('cars', compact('cars'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('add_car', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'carTitle' => 'required|string',
                'description' => 'required|string|max:1000',
                'price' => 'required|numeric',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'published' => 'boolean',
                'category_id' => 'required|exists:categories,id'
            ]);

            if ($request->hasFile('image')) {
                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('images'), $imageName);
                $data['image'] = $imageName;
            }

            $data['published'] = $request->has('published');

            $car = Car::create($data);

            if (!$car) {
                throw new \Exception('Failed to create car');
            }

            return redirect()->route('cars.index')->with('success', 'Car added successfully!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to add car: ' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('show_car', compact('car'));
    }

    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        $categories = Category::all();
        return view('edit_car', compact('car', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'carTitle' => 'required|string',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $data['published'] = $request->has('published');

        Car::where('id', $id)->update($data);

        return redirect()->route('cars.index')->with('success', 'Car updated successfully!');
    }

    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully!');
    }

    public function showDeleted()
    {
        $cars = Car::onlyTrashed()->get();
        return view('trashed_cars', compact('cars'));
    }

    public function restore(string $id)
    {
        Car::withTrashed()->where('id', $id)->restore();
        return redirect()->route('cars.showDeleted')->with('success', 'Car restored successfully!');
    }

    public function forceDelete(string $id)
    {
        Car::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('cars.index')->with('success', 'Car permanently deleted!');
    }
}