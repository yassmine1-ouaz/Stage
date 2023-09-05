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

                                            <td id="statusColumn">
                                                <span class="badge {{ $user->status == '1' ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $user->status == '1' ? 'Active' : 'Blocked' }}
                                                </span>
                                            </td>

                                            <td>{{$user->created_at }}</td>
                                         
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
                function BloquerUser() {

                    $(document).ready(function() {
                        $('input.custom-control-input').on('change', function() {
                            var id = $(this).data('user-id');
                            var status = $(this).is(':checked');

                            $.ajax({
                                type: 'POST',
                                dataType: "json",
                                url: '/listusers/bloquer/' + id,
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    status: status
                                },
                                success: function(data) {
                                    if (data.success) {
                                        alert('Utilisateur bloqué/débloqué avec succès.');
                                    } else {
                                        alert('Une erreur s\'est produite.');
                                    }
                                    console.log(data.success)
                                }
                            });
                        });
                    });

                }
            </script>
            @endsection