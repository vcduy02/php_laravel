<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $products = Product::all();

        return view('home', compact('banners', 'products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product', compact('product'));
    }

    public function showCategory($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id', $id)->get();

        return view('category', compact('category', 'products'));
    }

}
