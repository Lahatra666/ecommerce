<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- CSS FILE --}}
    <link href="{{asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
 
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">

    <title>Mon site</title>
</head>
<body>
    @yield('content')
</body>
</html>