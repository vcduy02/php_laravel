<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandCreatRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        return view('admin.brand.index', ['brands' => $brands]);
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(BrandCreatRequest $request)
    {
        $data = $request->except('_token', 'method');
        $brand = new Brand($data);
        $brand->save();

        return redirect('admin/brands')->with('status', 'Thêm thương hiệu thành công!');
    }

    public function show($id)
    {
        $brand = Brand::find($id);

        return view('admin.brand.edit', compact('brand'));
    }

    public function update($id, BrandCreatRequest $request)
    {
        $brand = Brand::find($id);
        $data = $request->except('_token', 'method');
        $brand->save($data);

        return redirect('admin/brands')->with('status', 'Cập nhật thương hiệu thành công!');
    }

    public function delete($id)
    {
        Brand::find($id)->delete();
        
        return redirect('admin/brands')->with('status', 'Xóa thương hiệu thành công!');
    }
}
