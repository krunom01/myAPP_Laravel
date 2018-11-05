<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('pageParts.head') 
    </head>
  <body>
      
    <div class="container">  
      @include('pageParts.header')
         @yield('content')
      @include('pageParts.footer')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
