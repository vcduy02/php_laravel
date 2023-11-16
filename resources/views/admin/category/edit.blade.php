@extends('layouts.master')

@section('title', 'Cập nhật danh mục')

@section('content')
    <div class="content-page">
        <div class="container-fluid add-form-list">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Cập nhật danh mục</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)

                                @endforeach
                            @endif
                            <form action="{{ route('admin.category.update', $category->id) }}" method="POST" data-toggle="validator">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">                      
                                        <div class="form-group">
                                            <label>Name *</label>
                                            <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                                            @error('name')
                                                <div class="help-block with-errors text-warning">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" rows="4">{{ $category->description }}</textarea>
                                            @error('description')
                                                <div class="help-block with-errors text-warning text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>                            
                                <button type="submit" class="btn btn-primary mr-2">Update Category</button>
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