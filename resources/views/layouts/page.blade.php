<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cb88c756b4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
        @include('layouts.header')

        
        <div class="container">
          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div> 
          @endif
        </div>
        @yield('content')

        <div id="app">
          <api-calling></api-calling>
        </div>
        {{-- @include('layouts.footer') --}}
        
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
    <script src="/js/app.js"></script>
    @yield('scripts')
  </body>
</html>