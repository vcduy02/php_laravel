@extends('layouts.page')

@section('title', 'Danh mục')

@section('content')
    <div class="container">
        <h1 class="text-center" style="margin-top: 20px;">{{ $category->name }}</h1>
    </div>

    <div class="py-5">
        <div class="container">
          <div class="row hidden-md-up">
              @foreach ($products as $product)
                  <div class="col-md-3">
                      <div class="card" style="width: 18rem; margin-bottom: 20px;">
                          <img src="{{ URL($product->image) }}" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <h4>{{ number_format($product->price) }}đ</h4>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Xem chi tiết</i></a>
                            <a href="{{ route('cart.store', $product->id) }}" class="btn btn-danger">Thêm vào giỏ</i></a>
                          </div>
                      </div>
                  </div>
              @endforeach
            
          </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        export default {
            data() {
                return {
                    product: {
                        id: 0,
                        name: '',
                        price: 0,
                        image: '',
                        description: '',

                    }
                }
            },
            methods: {
                async index() {
                    try {
                        const response = await axios.get('/products')
                        this.listProducts = response.data
                    } catch (error) {
                        this.error = error.response.data
                    }
                    
                }
            }
        }
    </script>
@endsection