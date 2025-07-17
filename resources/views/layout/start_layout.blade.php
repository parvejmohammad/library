<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',"TSPL")</title>
    <link rel="stylesheet" href={{asset('style.css')}}>
    <link rel="stylesheet" href={{asset('bootstrap.css')}}>
    @yield('stylesheet');
   
</head>
<body>
    
    @yield('content')
    
    {{-- @yield('bootstrap') --}}
    <script src={{asset('jQuery.js')}}></script>
   <script src={{asset('bootstrap.js')}}></script>
    @stack("javascript")
   
</body>
</html>