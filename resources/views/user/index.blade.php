@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-transparent card-block card-stretch card-height border-none">
                        <div class="card-body p-0 mt-lg-2 mt-0">
                            <h3 class="mb-3">Hi {{ Auth::user()->name }}</h3>
                            <p class="mb-0 mr-4">Your dashboard gives you views of key performance or business process.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page end  -->
            </div>
    </div>
@endsection
