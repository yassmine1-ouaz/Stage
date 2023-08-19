@extends('master')

@section('title','Profile')

@section('content')






    <div class="row">
        <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <img src="" alt="...">
                </div>

                <div class="card-body">
                    <div class="author">
                        <a href="#">
                            <img class="avatar border-gray" src="https://now-ui-dashboard-laravel.creative-tim.com/assets/img/default-avatar.png" alt="...">
                            <h5 class="title">{{Auth::guard('admin')->user()->name}}</h5>
                        </a>
                        <p class="description">
                            <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6f0e0b0206012f0100181a06410c0002">[{{Auth::guard('admin')->user()->email}}]</a>
                        </p>
                        <p class="description text-center">
                        <p class="description text-center">
                            I like the way you work it
                            <br> No diggity
                            <br> I wanna bag it up
                        </p>
                    </div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="button-container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-6 ml-auto">
                                <h5>12
                                    <br>
                                    <small>Files</small>
                                </h5>
                            </div>
                            <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                <h5>2GB
                                    <br>
                                    <small>Used</small>
                                </h5>
                            </div>
                            <div class="col-lg-3 mr-auto">
                                <h5>24,6$
                                    <br>
                                    <small>Spent</small>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-8 text-center">
            <form class="col-md-12" action="https://paper-dashboard-laravel.creative-tim.com/profile" method="POST">
                <input type="hidden" name="_token" value="AW9QZ9c53UHFOcrtB7R0dEoWnFaH8adapT3EEbHm"> <input type="hidden" name="_method" value="PUT"> <div class="card">
                    <div class="card-header">
                        <h5 class="title">Edit Profile</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label class="col-md-3 col-form-label">Name</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="Admin Admin" required="">
                                    {{Auth::guard('admin')->user()->name}}</div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Email</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="admin@paper.com" required="">
                                    {{Auth::guard('admin')->user()->email}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-info btn-round">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form class="col-md-12" action="https://paper-dashboard-laravel.creative-tim.com/profile/password" method="POST">
                <input type="hidden" name="_token" value="AW9QZ9c53UHFOcrtB7R0dEoWnFaH8adapT3EEbHm"> <input type="hidden" name="_method" value="PUT"> <div class="card">
                    <div class="card-header">
                        <h5 class="title">Change Password</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label class="col-md-3 col-form-label">Old Password</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="password" name="old_password" class="form-control" placeholder="Old password" required="">
                                    {{Auth::guard('admin')->user()->password}}</div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">New Password</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Password Confirmation</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-info btn-round">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
