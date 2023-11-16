@extends('layouts.master')

@section('title', 'Cập nhật sản phẩm')

@section('content')
    <div class="content-page">
        <div class="container-fluid add-form-list">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Cập nhật sản phẩm</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)

                                @endforeach
                            @endif
                            <form action="{{ route('admin.product.update', $product->id) }}" method="POST" data-toggle="validator" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">                      
                                        <div class="form-group">
                                            <label>Name *</label>
                                            <input type="text" id="name" name="name" value="{{ $product->name }}" class="form-control">
                                            @error('name')
                                                <div class="help-block with-errors text-warning">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price *</label>
                                            <input type="text" id="price" name="price" value="{{ $product->price }}" class="form-control">
                                            @error('price')
                                                <div class="help-block with-errors text-warning">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Brand *</label>
                                            <select id="brand_id" name="brand_id" value="{{ $product->brand_id }}" class="selectpicker form-control" data-style="py-0">
                                                <option value="">--- Chọn ---</option>
                                                @foreach ($brands as $brand)
                                                    @if ($product->brand_id == $brand->id)
                                                        <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
                                                    @endif
                                                    @if ($product->brand_id != $brand->id)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('brand_id')
                                                <div class="help-block with-errors text-warning">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category *</label>
                                            <select id="category_id" name="category_id" value="{{ $product->category_id }}" class="selectpicker form-control" data-style="py-0">
                                                <option value="">--- Chọn ---</option>
                                                @foreach ($categories as $category)
                                                    @if ($product->category_id == $category->id)
                                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                                    @endif
                                                    @if ($product->category_id != $category->id)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="help-block with-errors text-warning">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">                                    
                                        <div class="form-group">
                                            <label>Quantity *</label>
                                            <input type="text" id="quantity" name="quantity" value="{{ $product->quantity }}" class="form-control">
                                            @error('quantity')
                                                <div class="help-block with-errors text-warning">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" id="image" value="{{ $product->image }}" name="image" class="form-control image-file">
                                            <img src="{{ URL($product->image) }}" height="200px" style="margin-top: 20px;">
                                            @error('image')
                                                <div class="help-block with-errors text-warning">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" rows="4">{{ $product->description }}</textarea>
                                            @error('description')
                                                <div class="help-block with-errors text-warning">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>                            
                                <button type="submit" class="btn btn-primary mr-2">Update Product</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page end  -->
        </div>
    </div>
@endsection