@extends('master')

@section('title','Dashboard')

@section('content')



    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">List of Users</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="..">Home</a></li>
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
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="dataTable">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Profile</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th> Created At</th>
                                            <th> Action</th>

                                        </tr>
                                        </thead>

                                        <tbody>

                                         @foreach( $users as $user)
                                         <tr>
                                             <td>{{$user->id }}</td>
                                             <td>{{$user->name }}</td>
                                             <td>{{$user->type_id }}</td>
                                             <td>{{$user->email }}</td>
                                             <td>{{$user->phone }}</td>
                                             <td>{{$user->created_at }}</td>
                                             <td></td>
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
