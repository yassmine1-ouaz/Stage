@extends('master')

@section('title','Data Immoblier')

@section('content')



    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @dd('im product')
                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add immoblier</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
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
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th> Created At</th>
                                            <th> Updated At</th>

                                        </tr>
                                        </thead>

                                        <tbody>
                                        {{--
                                         @foreach( $users as $user)
                                         <tr>
                                             <td>{{$user->id }}</td>
                                             <td>{{$user->type_id }}</td>
                                             <td>{{$user->email }}</td>
                                             <td>{{$user->phone }}</td>
                                             <td>{{$user->created_at }}</td>
                                             <td>{{$user->updated_at }}</td>
                                         </tr>
                                         @endforeach

                                        --}}

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

                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
                <script src="js/ruang-admin.min.js"></script>
                <!-- Page level plugins -->
                <script src="vendor/datatables/jquery.dataTables.min.js"></script>
                <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

                <!-- Page level custom scripts -->
                <script>
                    $(document).ready(function () {
                        $('#dataTable').DataTable(); // ID From dataTable
                        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
                    });
                </script>



@endsection
