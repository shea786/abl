<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('HTMLTitle') | {{ config('app.name') }}</title>
        <meta charset="utf-8"> 
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	
    	<!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="/css/switcher.css"/>
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <!-- Latest compiled JavaScript -->
        <script src="/js/bootstrap.js"></script>
        <script src="/js/main.js"></script>
    </head>
    
    <body>
        <div class="container-fluid">
            <!-- logo section one row-->
            <div class="row">
                <div class='col-md-4 '><img class="img-responsive" src="/images/logo.png"/></div>
            </div>
        </div>
    
        @include('includes._navbar')
        
        <div class="container-fluid">
            @include('flash::message')
            @include('includes._errors')
            @yield('content')
        </div>
        <!-- footer-->
        <div class="container-fluid" id="footer">
            <div class="row text-center text-underline">
                <div class="col-md-12">Citi tech 2017</div>
            </div>
        </div>
        
    </body>
</html>