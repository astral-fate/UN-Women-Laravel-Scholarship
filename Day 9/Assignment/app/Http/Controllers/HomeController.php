<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestProducts = Product::orderBy('created_at', 'desc')->take(3)->get();
        return view('index', compact('latestProducts'));
    }
}