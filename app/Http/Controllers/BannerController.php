<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerCreateRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index() 
    {
        $banners = Banner::paginate(10);

        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(BannerCreateRequest $request)
    {
        $data = $request->except('_token', 'method');
        $banner = new Banner($data);
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $uploadPath = 'uploads/banners/';
            $extention = $imageFile->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $imageFile->move($uploadPath, $filename);
            $path = $uploadPath . $filename;
        }
        $banner->image = $path;
        $banner->save();

        return redirect()->route('admin.banner.index')->with('status', 'Thêm banner thành công!');
    }

    public function show($id)
    {
        $banner = Banner::find($id);

        return view('admin.banner.edit', compact('banner'));
    }

    public function update($id, BannerCreateRequest $request)
    {
        $banner = Banner::find($id);
        $data = $request->except('_token', 'method');
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $uploadPath = 'uploads/banners/';
            $extention = $imageFile->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $imageFile->move($uploadPath, $filename);
            $path = $uploadPath . $filename;
        }
        $banner->image = $path;
        $banner->save($data);

        return redirect('admin/banners')->with('status', 'Cập nhật banner thành công!');
    }

    public function delete($id)
    {
        Banner::find($id)->delete();

        return redirect('admin/banners')->with('status', 'Xóa banner thành công!');
    }
}
