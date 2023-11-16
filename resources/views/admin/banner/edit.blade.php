@extends('layouts.master')

@section('title', 'Cập nhật banner')

@section('content')
    <div class="content-page">
        <div class="container-fluid add-form-list">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Cập nhật banner</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)

                                @endforeach
                            @endif
                            <form action="{{ route('admin.banner.update', $banner->id) }}" method="POST" data-toggle="validator" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">                      
                                        <div class="form-group">
                                            <label>Name *</label>
                                            <input type="text" name="name" value="{{ $banner->name }}" class="form-control">
                                            @error('name')
                                                <div class="help-block with-errors text-warning">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image" class="form-control">
                                            <img src="{{ URL($banner->image) }}" height="200px" style="margin-top: 20px;">
                                            @error('image')
                                                <div class="help-block with-errors text-warning">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>                            
                                <button type="submit" class="btn btn-primary mr-2">Update Banner</button>
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