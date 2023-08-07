@extends('layouts.auth')

@section('title' ,'login')
@section('content')

    <body class="card">

<!-- Login Content -->
<div class="card-body">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-8 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <form action="{{route('dashboard.check')}}" method="post">
                                    @csrf
                                    @if(Session::get('fail'))
                                        <div class="alert-danger">
                                            {{Session::get('fail')}}
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <label for="email">Email Or phone</label>
                                        <input type="text" class="form-control" name="identify" placeholder="Enter your email please">
                                        @if(isset($errors))
                                            @error('identify')
                                            <span class="invalid-feedback" role="alert">
                                        <strong> {{ $message }}</strong>
                                    </span>
                                            @enderror
                                        @endif
                                    </div>




                                    <div class="mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password">
                                        @if(isset($errors))
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong> {{ $message }}  </strong>
                                    </span>

                                            @enderror
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox small"
                                             style="line-height: 1.5rem;">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                    <hr>
                                    <a href="index.html" class="btn btn-google btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="font-weight-bold small" href="register.html">Create an Account!</a>
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
</body>


@endsection
