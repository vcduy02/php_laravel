@extends('layouts.page')

@section('title', 'Order Complete')

@section('content')
    <div class="container">
        <section class="h-100 gradient-custom">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-10 col-xl-8">
                  <div class="card" style="border-radius: 10px;">
                    <div class="card-header px-4 py-5">  
                      <h5 class="text-muted mb-0">Cảm ơn {{ Auth::user() ? Auth::user()->name : 'bạn' }} đã đặt hàng!</h5>
                    </div>
                    <div class="card-body p-4">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <p class="lead fw-normal mb-0" style="color: #a8729a;">Đơn hàng</p>
                        <p class="small text-muted mb-0"></p>
                      </div>
                      @php $total = 0 @endphp
                      @foreach ($orderDetails as $orderDetail)
                        @foreach ($products as $product)
                          @if ($product->id == $orderDetail->product_id)
                            <div class="card shadow-0 border mb-4">
                              <div class="card-body">
                              <div class="row">
                                  <div class="col-md-2">
                                  <img src="{{ URL($product->image) }}"
                                      class="img-fluid" alt="Phone">
                                  </div>
                                  <div class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                  <p class="text-muted mb-0">{{ $product->name }}</p>
                                  </div>
                                  <div class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                  <p class="text-muted mb-0 small">x{{ $orderDetail->quantity }}</p>
                                  </div>
                                  <div class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                  <p class="text-muted mb-0 small">{{ number_format($product->price) }}đ</p>
                                  </div>
                              </div>
                              <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                              </div>
                            </div>  
                          @endif
                        @endforeach
                        @php $total += $orderDetail['price'] * $orderDetail['quantity'] @endphp
                      @endforeach
                      
                      <div class="d-flex justify-content-between pt-2">
                        <p class="fw-bold mb-0">Chi tiết đơn hàng</p>
                        <p class="text-muted mb-0"><span class="fw-bold me-4">Tổng</span> {{  number_format($total) }} VNĐ</p>
                      </div>
          
                      <div class="d-flex justify-content-between pt-2">
                        <p class="text-muted mb-0">Mã đơn hàng : {{ $order->id }}</p>
                        {{-- <p class="text-muted mb-0"><span class="fw-bold me-4">Discount</span></p> --}}
                      </div>
          
                      <div class="d-flex justify-content-between">
                        <p class="text-muted mb-0">Thời gian tạo đơn : {{ $order->order_date }}</p>
                        <p class="text-muted mb-0"><span class="fw-bold me-4"></span></p>
                      </div>
          
                      <div class="d-flex justify-content-between mb-5">
                        <p class="text-muted mb-0">Mã giảm giá : </p>
                        {{-- <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> Free</p> --}}
                      </div>
                    </div>
                    <div class="card-footer border-0 px-4 py-5"
                      style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                      <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
                        paid: <span class="h2 mb-0 ms-2">{{ number_format($total) }} VNĐ</span></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    </div>

@endsection