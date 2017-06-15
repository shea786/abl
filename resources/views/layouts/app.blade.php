<!DOCTYPE html>
<html>
    <head>
        <title>@yield('HTMLTitle') | {{ config('app.name') }}</title>
        
        
        <!-- CSS -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- scripts -->
        <!-- jQuery CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <!-- main js file-->
        <script src="/js/main.js"></script>
     
    </head>
    <body>
        @include('includes._navbar')
        
        <div class="container">
            @yield('content')
        </div>
        
        
    </body>
</html>