@extends('layouts.master')

@section('title', 'Chi tiết đơn hàng')

@section('content')
    <div class="container" style="margin-top: 100px;">
        <!-- Title -->
        <div class="d-flex justify-content-between align-items-center py-3">
        <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #{{ $order->id }}</h2>
        </div>
    
        <!-- Main content -->
        <div class="row">
        <div class="col-lg-12">
            <!-- Details -->
            <div class="card mb-12">
            <div class="card-body">
                <div class="mb-3 d-flex justify-content-between">
                <div>
                    <span class="me-3">{{ $order->order_date }}</span>
                    <span class="me-3">#{{ $order->id }}</span>
                    <span class="badge rounded-pill bg-info">{{ $order->status }}</span>
                </div>
                </div>
                <table class="table table-borderless">
                <tbody>
                    @php $total = 0 @endphp
                      @foreach ($orderDetails as $orderDetail)
                        @foreach ($products as $product)
                          @if ($product->id == $orderDetail->product_id)
                            <tr>
                                <td>
                                    <div class="d-flex mb-2">
                                    <div class="flex-shrink-0">
                                        <img src="{{ URL($product->image) }}" alt="" width="35" class="img-fluid">
                                    </div>
                                    <div class="flex-lg-grow-1 ms-3">
                                        <h6 class="small mb-0"><a href="#" class="text-reset">{{ $product->name }}</a></h6>
                                        <span class="small"></span>
                                    </div>
                                    </div>
                                </td>
                                <td>x{{ $orderDetail->quantity }}</td>
                                <td class="text-end">{{ number_format($product->price) }}đ</td>
                            </tr>
                          @endif
                        @endforeach
                        @php $total += $orderDetail['price'] * $orderDetail['quantity'] @endphp
                      @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">TOTAL</td>
                        <td class="text-end">{{ number_format($total) }}đ</td>
                    </tr>
                </tfoot>
                </table>
            </div>
            </div>
            <!-- Payment -->
            <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                <div class="col-lg-6">
                    <h3 class="h6">Payment Method</h3>
                    <p>{{ $orderDetail->payment }}<br>
                    Total: {{ number_format($total) }}đ <span class="badge bg-success rounded-pill">PAID</span></p>
                </div>
                <div class="col-lg-12">
                    <h3 class="h6">Billing address</h3>
                    <address>
                    <strong>{{ $orderDetail->user_name }}</strong><br>
                    {{ $orderDetail->address }}<br>
                    <abbr title="Phone">Phone:</abbr> {{ $orderDetail->phone_number }}
                    </address>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection