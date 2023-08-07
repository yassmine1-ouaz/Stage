
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{asset('Back/assets/img/logo/logo.png')}}" rel="icon">
    <title>@yield('title')</title>
    <link href="{{asset('Back/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('Back/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('Back/assets/css/ruang-admin.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-login">
<!-- Login Content -->
    @yield('content')
<!-- Login Content -->
<script src="{{asset('Back/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('Back/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('Back/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('Back/assets/js/ruang-admin.min.js')}}"></script>
</body>

</html>
