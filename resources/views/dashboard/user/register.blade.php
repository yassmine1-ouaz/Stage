@extends('layouts.auth')
@section('title' ,'Register ')
@section('content')


<body class="bg-gradient-login">
<!-- Register Content -->
<div class="container-login">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-8 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                </div>
                                <form action="{{ route('user.create') }}" method="post">
                                    @if( Session::has('success'))
                                        <div class="alert-success">{{ Session::get('success')}}</div>
                                    @endif
                                    @if( Session::has('fail'))
                                        <div class="alert-danger">{{ Session::get('fail')}}</div>
                                    @endif
                                    @csrf  {{--***pour la secrisation****--}}
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input  type="text" class="form-control"  name="name" placeholder="Enter your full name please" value="{{old ('name')}}">

                                        <span class="text-danger" role="alert">
                                        <strong>@error('name'){{ $message }}@enderror</strong>
                                    </span>
                                         </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input  type="text" class="form-control"  name="email" placeholder="Enter your email please" value="{{old ('email')}}">


                                        <span class="text-danger" role="alert">
                                        <strong>@error('email'){{ $message }}@enderror</strong>
                                    </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input  type="text" class="form-control"  name="phone" placeholder="Enter your phone_number" value="{{old ('phone')}}">


                                        <span class="text-danger" role="alert">
                                        <strong>@error('phone'){{ $message }}@enderror</strong>
                                    </span>
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input  type="password" class="form-control"  name="password" placeholder="Enter Password" value="{{old ('password')}}">


                                        <span class="text-danger" role="alert">
                                        <strong>  @error('password'){{ $message }} @enderror</strong>
                                    </span>

                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input  type="password" class="form-control"  name="cpassword" placeholder="Enter password" >


                                        <span class="text-danger" role="alert">
                                        <strong>@error('cpassword'){{ $message }} @enderror</strong>
                                    </span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                                    </div>
                                    <hr>
                                    <a href="index.html" class="btn btn-google btn-block">
                                        <i class="fab fa-google fa-fw"></i> Register with Google
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">

                                    <a  class="font-weight-bold small" href="{{ route('user.login') }}"> I already have a Account</a>
                                </div>
                                <div class="text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Content -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/ruang-admin.min.js"></script>
</body>

@endsection
