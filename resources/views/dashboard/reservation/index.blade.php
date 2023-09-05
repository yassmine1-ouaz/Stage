@extends('master')

@section('title','List of Reservations')

@section('content')



<div id="wrapper">

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <!-- Container Fluid-->
            <div class="container-fluid" id="container-wrapper">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">List of Reservations</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item">Tables</li>
                        <li class="breadcrumb-item active" aria-current="page">List of Reservations</li>
                    </ol>
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

            
                <!-- Row -->
                <div class="row">
                    <!-- Datatables -->
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">List of Reservations</h6>
                            </div>




                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush" id="dataTable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>user name</th>
                                            <th>immob_name</th>
                                            <th>Message</th>
                                            <th> date time</th>
                                            <th> date reservation</th>
                                            <th>status</th>
                                            <th> Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach( $reservations as $reservation)
                                        <tr>
                                            <td>{{$reservation->id }}</td>
                                            <td>{{Auth::user()->userType->name}}</td>
                                            <td>{{$reservation->immobilier->name }}</td>
                                            <td>{{$reservation->message }}</td>
                                            <td>{{$reservation->datetime }}</td>
                                            <td>{{$reservation->reserv_date }}</td>

                                            <td>
                                                <span class="badge {{ $reservation->status == '1' ? 'badge-success' : 'badge-danger' }}" id="statusBadge{{$reservation->id}}">
                                                    {{ $reservation->status == '1' ? 'Accepté' : 'Refusé' }}
                                                </span>
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