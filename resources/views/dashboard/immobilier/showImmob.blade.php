@extends('master')

@section('title','show Immobilier')

@section('content')



    <h1 class="mb-0"> Detail Immobilier </h1>
    <br>

    <div class="row-cols-5">

        <!-- General Element -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"> Detail Immobilier </h6>
            </div>
       


        <div class="card-body">
            
            <div class='table-responsive'>
                <table class="table table-bordered">
                    <tr>
                        <th>Titre</th>
                        <td>{{$immobilier->name}}</td>
                    </tr>

                    <tr>
                        <th>Type</th>
                        <td>{{$immobilier->typeImmob->type }}</td>
                    </tr>
                    <tr>
                        <th>Etat</th>
                        <td>{{$immobilier->etat}}</td>
                    </tr>
                    <tr>
                        <th>Surface</th>
                        <td>{{$immobilier->surface}}</td>
                    </tr>
                    <tr>
                        <th>Ville</th>
                        <td>{{$immobilier->villes->name }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{$immobilier->description}}</td>
                    </tr>
                    <tr>
                        <th>Prix</th>
                        <td>{{$immobilier->prix}} TND</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td> @if( $immobilier->status == "Pending")
                                                <span class="badge badge-danger"> {{$immobilier->status }} </span>
                                                @else
                                                <span class="badge badge-primary"> {{$immobilier->status }} </span>
                                                @elsif
                                                <span class="badge badge-success"> {{$immobilier->status }} </span>
                                                @endif</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{$immobilier->created_at}}</td>
                    </tr>

                    <tr>
                        <th>Updated At</th>
                        <td>{{$immobilier->updated_at}}</td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{Auth::user()->userType->name}}</td>
                    </tr>

        

                    <tr>
                        <th>Photos</th>
                    <td> <div class="row">
                            @foreach ($immobilier->images as $index => $ImmoPhoto)
                            <div class="col-4">
                                <a href="" data-glightbox data-gallery="image-popup">
                                    <img class="rounded img-fluid" src="{{ asset($ImmoPhoto->path) }}" alt="Image {{ $index + 1 }}">
                                </a>

                            </div>
                            @if (($index + 1) % 3 === 0)
                        </div>
                        <div class="row">
                            @endif
                            @endforeach
                        </div>
                                            </td>
                    </tr>
                    
                </table>
   
        </div>
            </div>
        </div>
        @endsection
