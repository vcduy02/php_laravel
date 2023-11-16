@extends('layouts.master')

@section('title', 'Thêm danh mục')

@section('content')
    <div class="content-page">
        <div class="container-fluid add-form-list">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Thêm danh mục</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)

                                @endforeach
                            @endif
                            <form action="/categories/store" method="POST" data-toggle="validator">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">                      
                                        <div class="form-group">
                                            <label>Name *</label>
                                            <input type="text" name="name" class="form-control">
                                            @error('name')
                                                <div class="help-block with-errors">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" rows="4"></textarea>
                                            @error('description')
                                                <div class="help-block with-errors">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>                            
                                <button type="submit" class="btn btn-primary mr-2">Add Category</button>
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