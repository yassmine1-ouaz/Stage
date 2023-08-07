
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

<body id="page-top">
<div id="wrapper">
    <!-- Sidebar -->
    @include('back.sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            @include('back.header')
            <!-- Topbar -->

            <!-- Container Fluid-->
           @yield('content')
            <!---Container Fluid-->
        </div>
        <!-- Footer -->
      @include('back.footer')
        <!-- Footer -->
    </div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="{{asset('Back/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('Back/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('Back/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('Back/assets/js/ruang-admin.min.js')}}"></script>
<script src="{{asset('Back/assets/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('Back/assets/js/demo/chart-area-demo.js')}}"></script>
</body>

</html>
