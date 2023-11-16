@extends('layouts.master')

@section('title', 'Cập nhật thương hiệu')

@section('content')
    <div class="content-page">
        <div class="container-fluid add-form-list">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Cập nhật thương hiệu</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)

                                @endforeach
                            @endif
                            <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" data-toggle="validator">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">                      
                                        <div class="form-group">
                                            <label>Name *</label>
                                            <input type="text" name="name" value="{{ $brand->name }}" class="form-control">
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
                                            <textarea class="form-control" name="description" rows="4">{{ $brand->description }}</textarea>
                                            @error('description')
                                                <div class="help-block with-errors text-warning">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>                            
                                <button type="submit" class="btn btn-primary mr-2">Update Brand</button>
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