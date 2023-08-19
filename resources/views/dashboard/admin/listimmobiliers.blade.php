@extends('master')

@section('title','List of Immobiliers')

@section('content')



    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">List of Immobiliers</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="..">Home</a></li>
                            <li class="breadcrumb-item">Tables</li>
                            <li class="breadcrumb-item active" aria-current="page">List of Immobiliers</li>
                        </ol>
                    </div>

                    <!-- Row -->
                    <div class="row">
                        <!-- Datatables -->
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">List of Immobiliers</h6>
                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="dataTable">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>type</th>
                                            <th>etat</th>
                                            <th>surface</th>
                                            <th>ville</th>
                                            <th>description</th>
                                            <th>prix</th>
                                            <th>status</th>
                                            <th>photos</th>
                                            <th> Created At</th>
                                            <th> Action</th>

                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach( $immobiliers as $immobilier)
                                            <tr>
                                                <td>{{$immobilier->id }}</td>
                                                <td>{{$immobilier->name }}</td>
                                                <td>{{$immobilier->typeImmob->type }}</td>
                                                <td>{{$immobilier->etat }}</td>
                                                <td>{{$immobilier->surface }} M²</td>
                                                <td>{{$immobilier->villes->name }}</td>
                                                <td>{{$immobilier->description }}</td>
                                                <td>{{$immobilier->prix }} DT</td>
                                                <td>
                                                    <span class="badge badge-danger"> Pending</span>
                                                   </td>

                                                <td>@foreach ($immobilier->images as $ImmoPhoto)

                                                        @if(count($immobilier->images)>1)
                                                            {{--Multiple picture design--}}
                                                            <div class="d-flex justify-content-between">
                                                                <div class="row g-3">
                                                                    <div class="col-6">
                                                                        <img class="rounded img-fluid"  src="{{(asset($ImmoPhoto->path))}}" alt="Post">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <img class="card-img" src="{{(asset($ImmoPhoto->path))}}" alt="Post">
                                                        @endif
                                                    @endforeach</td>

                                                <td>{{$immobilier->created_at }}</td>
                                                <td>
                                                    <a href="{{ route ('showImmob', $immobilier->id)}}" type="button" class="btn btn-secondary"> Detail</a>
                                                    <a href="{{ route ('editImmob', $immobilier->id)}}" type="button" class="btn btn-outline-primary" > Edit</a>

                                                    <form action="{{ route('destroyImmob', $immobiliers->if) }}" method="post" type="button">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure ?');" type="submit">Delete</button>
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
