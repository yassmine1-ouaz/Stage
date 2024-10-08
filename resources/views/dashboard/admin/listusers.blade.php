@extends('master')

@section('title','Dashboard')

@section('content')



<div id="wrapper">

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <!-- Container Fluid-->
            <div class="container-fluid" id="container-wrapper">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Users</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item">Tables</li>
                        <li class="breadcrumb-item active" aria-current="page">List of Users</li>
                    </ol>
                </div>

                <!-- Row -->
                <div class="row">
                    <!-- Datatables -->
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">List of Users</h6>
                            </div>

                            <div>

                                @if( Session::has('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <h6><i class="fas fa-check"></i><b> Success!</b></h6>
                                    {{ Session::get('success')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                @if( Session::has('fail'))
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                    <h6><i class="fas fa-exclamation-triangle"></i><b> Stop!</b></h6>
                                    {{ Session::get('fail')}}
                                </div>
                                @endif
                            </div>


                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush" id="dataTable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Profile</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th> Created At</th>
                                            <th> Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach( $users as $user)
                                        <tr>
                                            <td>{{$user->id }}</td>
                                            <td>{{$user->name }}</td>
                                            <td>{{$user->userType->name }}</td>
                                            <td>{{$user->email }}</td>
                                            <td>{{$user->phone }}</td>

                                            <td>
                                                <span class="badge {{ $user->status == '1' ? 'badge-success' : 'badge-danger' }}" id="statusBadge{{$user->id}}">
                                                    {{ $user->status == '1' ? 'Active' : 'Blocked' }}
                                                </span>
                                            </td>

                                            <td>{{$user->created_at }}</td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input value="{{$user->id }}" type="checkbox" onchange="BloquerUser(this)" class="custom-control-input" id="customSwitch{{$user->id}}" data-user-id="{{$user->id}}" {{ $user->status == '1' ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="customSwitch{{$user->id}}"></label>
                                                </div>



                                                <form action="{{ route('destroyUser', $user->id) }}" method="post" type="button">


                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure ?');" type="submit"> <i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Row-->



            </div>

            <!-- Scroll to top -->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
            @endsection

            @section('script')
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                function BloquerUser(el) {
                    if (el.checked) {
                        var status = 1
                    } else {
                        var status = 0
                    }
                    $.ajax({
                        type: 'POST',
                        dataType: "json",
                        url: "{{route('BloquerUser')}}",
                        data: {
                            id: el.value,
                            _token: '{{ csrf_token() }}',
                            status: status
                        },
                        success: function(data) {
                            if (data.success) {
                                document.getElementById("statusBadge" + el.value).classList.remove('badge', 'badge-danger');
                                document.getElementById("statusBadge" + el.value).classList.add('badge', 'badge-success');
                                document.getElementById("statusBadge" + el.value).innerText = data.message
                            } else {
                                document.getElementById("statusBadge" + el.value).classList.remove('badge', 'badge-success');
                                document.getElementById("statusBadge" + el.value).classList.add('badge', 'badge-danger');

                                document.getElementById("statusBadge" + el.value).innerText = data.message
                            }
                            console.log(data.success)
                        }
                    });


                }
            </script>
            @endsection