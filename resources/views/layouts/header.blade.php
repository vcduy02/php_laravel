<header style="margin-bottom: 100px">
    <nav class="navbar navbar-expand-lg bg-danger" style="position: fixed; top: 0; width: 100%; z-index: 99999;">
        <div class="container">
          <a class="navbar-brand text-light" href="/">Trang chủ</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-link dropdown">
                    <a class="btn btn-outline-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Danh mục
                    </a>
                    <ul class="dropdown-menu">
                      @php
                        $categories = App\Models\Category::all();
                        $brands = App\Models\Brand::all();
                      @endphp
                      @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></li>
                      @endforeach
                    </ul>
                </li>
            </ul>
  
            <form class="d-flex me-2" role="search">
              <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
              <button class="btn btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item me-2">
                    <div class="dropdown">
                      <button class="btn btn-outline-light position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-cart-shopping"></i> 
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">{{ count((array) session('cart')) }}<span class="visually-hidden">unread messages</span></span>
                      </button>
                      @if(session('cart'))
                        <div class="dropdown-menu">                       
                            <div class="total-header-section">
                                @php $total = 0 @endphp
                                @foreach((array) session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                @endforeach
                            </div>
                                <table class="table">
                                  <tbody>
                                    @foreach(session('cart') as $id => $details)
                                      <tr>
                                        <td><img src="{{ URL($details['image']) }}" width="50px"/></td>
                                        <td>
                                          <p class="color-red">{{ $details['name'] }}</p>
                                          <br>
                                          {{number_format($details['price']) }}đ x {{ $details['quantity'] }}
                                        </td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                            <div class="col-lg-12 col-sm-12 col-12 total-section text-center">
                                <p>Tổng: <span class="text-danger">{{ number_format($total) }}đ</span></p>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                    <a href="{{ route('cart.index') }}" class="btn btn-primary btn-block">View all</a>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-12 text-center checkout mt-1">
                                  <a href="{{ route('cart.checkout') }}" class="btn btn-danger btn-block">Checkout</a>
                                </div>                           
                            </div>
                        </div>
                      @endif
                    </div>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-light" aria-current="page" href="{{ route('login') }}">
                        <i class="fa-regular fa-user"></i>
                    </a>
                </li>
            </ul>
          </div>
        </div>
      </nav>
</header>