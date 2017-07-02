<html>
    <head>
        
    </head>
    <body>
        <h1>Name: {{ $contactform['name'] }}</h1>
        <h1>Mail sent from "{{ $contactform['email'] }}"</h1>
        <p>Content <br> {!! $contactform['description'] !!}</p>
    </body>
</html>