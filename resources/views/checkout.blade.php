@extends('layouts.page')

@section('title', 'Checkout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Giỏ hàng</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            
                <table class="table">
                    <thead>
                        <tr>
                          <th colspan="2">Product</th>
                          <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0 @endphp
                        @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <tr>
                                <td>
                                    <img src="{{ URL($details['image']) }}" width="100">
                                </td>
                                <td>
                                    <b>{{ $details['name'] }}</b>
                                    <br>
                                    x {{ $details['quantity'] }}
                                </td>
                                <td>{{ number_format($details['price'] * $details['quantity']) }}đ</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            <li class="list-group-item d-flex justify-content-between">
              <span>Tổng (VNĐ)</span>
              <strong>{{ number_format($total) }}đ</strong>
            </li>
          </ul>
    
          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Thông tin giao hàng</h4>
          <form action="{{ route('cart.order') }}" method="POST" class="needs-validation" novalidate="">
            @csrf
            <div class="row">
              <div class="mb-3">
                <label for="firstName">Họ và tên</label>
                <input type="text" name="user_name" class="form-control" id="firstName" value="{{ old('user_name') }}">
                @error('user_name')
                  <div class="help-block with-errors text-warning">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
              @error('email')
                <div class="help-block with-errors text-warning">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="email">Số điện thoại</label>
                <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ old('phone_number') }}">
                @error('phone_number')
                  <div class="help-block with-errors text-warning">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            {{-- <div class="row">
              <div class="col-md-5 mb-3">
                <label for="city">Tỉnh / Thành phố</label>
                <select class="custom-select d-block w-100" name="city" id="city" value="{{ old('city') }}">
                  <option value="">Chọn...</option>
                </select>
                @error('city')
                  <div class="help-block with-errors text-warning">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="col-md-4 mb-3">
                <label for="district">Quận / Huyện</label>
                <select class="custom-select d-block w-100" name="district" id="district" value="{{ old('district') }}">
                  <option value="">Chọn...</option>
                </select>
                @error('district')
                  <div class="help-block with-errors text-warning">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="col-md-3 mb-3">
                <label for="ward">Xã / Phường</label>
                <select class="custom-select d-block w-100" name="ward" id="ward" value="{{ old('ward') }}">
                  <option value="">Chọn...</option>
                </select>
                @error('ward')
                  <div class="help-block with-errors text-warning">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div> --}}
            <div class="mb-3">
                <label for="">Địa chỉ</label>
                <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}">
                @error('address')
                  <div class="help-block with-errors text-warning">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email">Ghi chú</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                @error('description')
                  <div class="help-block with-errors text-warning">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <hr class="mb-4">
            <div class="mb-3">
                <label for="email">Phương thức thanh toán</label>
                <br>
                <input type="radio" name="payment" value="cod">Thanh toán khi nhận hàng
                @error('payment')
                  <div class="help-block with-errors text-warning">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <hr class="mb-4">
            <a href="{{ route('cart.index') }}" class="btn btn-primary btn-lg btn-block">Trở lại giỏ hàng</a>
            <button class="btn btn-danger btn-lg btn-block" type="submit">Tiếp tục thanh toán</button>
          </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
@endsection

@section('scripts')
    <script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
        method: "GET", 
        responseType: "application/json", 
        };
        var promise = axios(Parameter);
        promise.then(function (result) {
        renderCity(result.data);
        });

        function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Id);
        }
        citis.onchange = function () {
            district.length = 1;
            ward.length = 1;
            if(this.value != ""){
            const result = data.filter(n => n.Id === this.value);

            for (const k of result[0].Districts) {
                district.options[district.options.length] = new Option(k.Name, k.Id);
            }
            }
        };
        district.onchange = function () {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.value);
            if (this.value != "") {
            const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

            for (const w of dataWards) {
                wards.options[wards.options.length] = new Option(w.Name, w.Id);
            }
            }
        };
        }
    </script>
@endsection