<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryCreateRequest $request)
    {
        $data = $request->except('_token', 'method');
        $category = new Category($data);
        $category->save();

        return redirect('admin/categories')->with('status', 'Thêm danh mục thành công!');
    }

    public function show($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update($id, CategoryCreateRequest $request)
    {
        $category = Category::find($id);
        $data = $request->except('_token', 'method');
        $category->save($data);

        return redirect('admin/categories')->with('status', 'Cập nhật danh mục thành công!');
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        
        return redirect('admin/categories')->with('status', 'Xóa danh mục thành công!');
    }
}
