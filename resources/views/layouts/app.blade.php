<!DOCTYPE html>
<html>
    <head>
        <title>@yield('HTMLTitle') | {{ config('app.name') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
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
        @include('includes._navbar')
        <!-- main container do not delete -->
        <div class="container-fluid" id="m-c">
            @yield('content')
        </div>
         <div class="container-fluid" id="footer">
             <div class="row">
                 <div class='col-md-4'>
                     <ul class="nav">
                         <li><a href="#">Home</a></li>
                          <li><a href="#">Home</a></li>
                           <li><a href="#">Home</a></li>
                     </ul>
                 </div>
                 
                 <div class='col-md-4'>
                    <ul class="nav">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Home</a></li>
                    </ul>
                 </div>
                 
                <div class='col-md-2'>
                    <ul class="nav">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Home</a></li>
                    </ul>
                 </div>
                   <div class='col-md-2'>
                    <ul class="nav">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Home</a></li>
                    </ul>
                 </div>
                 </div>
         </div>
    </body>
</html>