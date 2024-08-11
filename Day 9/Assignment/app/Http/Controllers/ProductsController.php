<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        $recentProducts = Product::orderBy('created_at', 'desc')->take(3)->get();
        return view('index', compact('recentProducts'));
    }

    public function create()
    {
        return view('add_product');
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

    public function edit(Product $product)
    {
        return view('edit_product', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'ProductTitle' => 'required|max:100',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'published' => 'boolean'
        ]);

        $data = [
            'ProductTitle' => $request->ProductTitle,
            'description' => $request->description,
            'price' => $request->price,
            'published' => $request->has('published'),
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image) {
                Storage::delete('public/images/'.$product->image);
            }

            // Store new image
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        // Delete the product's image if it exists
        if ($product->image) {
            Storage::delete('public/images/'.$product->image);
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}