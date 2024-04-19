<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/4e4de8c08f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/asset/css/style2.css') }}"> --}}
    <link rel="icon" href="{{ asset('/assets/img/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Fred Ritz Vann</title>
</head>
<body>
@yield('content')



<script src="{{ asset('/assets/js/script.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

</body>
</html>