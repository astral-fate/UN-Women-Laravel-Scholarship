<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $recentProducts = Product::orderBy('created_at', 'desc')->take(3)->get();
        return view('index', compact('recentProducts'));
    }
    public function create()
    {
        return view('add_product');  // Changed from 'products.create' to 'add_product'
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'ProductTitle' => 'required|max:100',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'published' => 'boolean'
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        Product::create([
            'ProductTitle' => $request->ProductTitle,
            'description' => $request->description,
            'price' => $request->price,
            'published' => $request->has('published'),
            'image' => $imageName,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }
}