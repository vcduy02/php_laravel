@extends('layouts.page')

@section('title', 'Sản phẩm')

@section('content')
    <div class="container">
        <div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<div class="preview-pic tab-content">
						  <img src="{{ URL($product->image) }}" />
						</div>
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">{{ $product->name }}</h3>
						<p><b>Thương hiệu: </b><span>{{ $product->brand->name }}</span></p>
						<p class="product-description">{{ $product->description }}</p>
						<h4 class="price">Đơn giá: <span>{{ number_format($product->price) }} VNĐ</span></h4>
                        <br>
						<div class="action">
							<a href="{{ route('cart.store', $product->id) }}" class="btn btn-danger">Thêm vào giỏ</i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection