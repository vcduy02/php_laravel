<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index() 
    {
        $products = Product::all();
        
        return view('admin.product.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.product.create', ['categories' => $categories, 'brands' => $brands]);
    }

    public function store(ProductCreateRequest $request)
    {
        $data = $request->except('_token', 'method');
        $product = new Product($data);
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $uploadPath = 'uploads/products/';
            $extention = $imageFile->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $imageFile->move($uploadPath, $filename);
            $path = $uploadPath . $filename;
        }
        $product->image = $path;
        $product->save();

        return redirect('admin/products')->with('status', 'Thêm sản phẩm thành công!');
    }

    public function show($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.product.edit', compact('product', 'categories', 'brands'));
    }

    public function update($id, ProductCreateRequest $request)
    {
        $product = Product::find($id);
        $data = $request->except('_token', 'method');
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $uploadPath = 'uploads/products/';
            $extention = $imageFile->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $imageFile->move($uploadPath, $filename);
            $path = $uploadPath . $filename;
        }
        $product->image = $path;
        $product->save($data);

        return redirect('admin/products')->with('status', 'Cập nhật sản phẩm thành công!');
    }

    public function delete($id)
    {
        Product::find($id)->delete();

        return redirect('admin/products')->with('status', 'Xóa sản phẩm thành công!');
    }
}
