@extends('layouts.master')

@section('title', 'Thêm sản phẩm')

@section('content')
    <div class="content-page">
        <div class="container-fluid add-form-list">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Thêm sản phẩm</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)

                                @endforeach
                            @endif
                            <form action="/products/store" method="POST" data-toggle="validator">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">                      
                                        <div class="form-group">
                                            <label>Name *</label>
                                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
                                            @error('name')
                                                <div class="help-block with-errors">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price *</label>
                                            <input type="text" id="price" name="price" value="{{ old('price') }}" class="form-control">
                                            @error('price')
                                                <div class="help-block with-errors">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Brand *</label>
                                            <select id="brand_id" name="brand_id" value="{{ old('brand_id') }}" class="selectpicker form-control" data-style="py-0">
                                                <option value="">--- Chọn ---</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('brand_id')
                                                <div class="help-block with-errors">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category *</label>
                                            <select id="category_id" name="category_id" value="{{ old('category_id') }}" class="selectpicker form-control" data-style="py-0">
                                                <option value="">--- Chọn ---</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="help-block with-errors">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">                                    
                                        <div class="form-group">
                                            <label>Quantity *</label>
                                            <input type="text" id="quantity" name="quantity" value="{{ old('quantity') }}" class="form-control">
                                            @error('quantity')
                                                <div class="help-block with-errors">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" id="image" name="image" class="form-control image-file">
                                            @error('image')
                                                <div class="help-block with-errors">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" rows="4">{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="help-block with-errors">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>                            
                                <button type="submit" class="btn btn-primary mr-2">Add Product</button>
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