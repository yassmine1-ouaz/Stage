@extends('front.masterfront')

@section('title','Front')
@include('sweetalert::alert')

@section('content')
<main>

    <!-- Container START -->
    <div class="container">
        <div class="row g-4">

            <!-- Sidenav START -->
            @include('front.leftNavbar')
            <!-- Sidenav END -->

            <!-- Main content START -->
            <div class="col-md-8 col-lg-6 vstack gap-4">
                <div>

                    @if( Session::has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <h6><i class="fas fa-check"></i><b> Success!</b></h6>
                        {{ Session::get('success')}}

                    </div>
                    @endif
                    @if( Session::has('fail'))

                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <h6><i class="fas fa-exclamation-triangle"></i><b> Stop!</b></h6>
                        {{ Session::get('fail')}}
                    </div>
                    @endif
                </div>
                <!-- Share feed START -->
                @include('front.publication')


                <!-- Share feed END -->
                @foreach( $immobiliers as $immobilier)

                @include('front.immobilier.editImmob')

                @include('front.reservation.createreservation')
                <!-- Card feed item START -->
                <div class="card">
                    <!-- Card header START -->
                    <div class="card-header border-0 pb-0">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <div class="avatar avatar-story me-2">
                                    <a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt=""> </a>
                                </div>
                                <!-- Info -->
                                <div>



                                    <div class="nav nav-divider">
                                        <h6 class="nav-item card-title mb-0"> <a href="#!">{{Auth::user()->name}}</a></h6>
                                        <span class="nav-item small"> 2hr</span>
                                    </div>
                                    <p class="mb-0 small">{{Auth::user()->userType->name}}</p>
                                </div>
                            </div>
                            <!-- Card feed action dropdown START -->
                            <div class="dropdown">

                                <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </a>
                                <!-- Card feed action dropdown menu -->
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction">
                                    <li><a class="dropdown-item" class="nav-link bg-light py-1 px-2 mb-0" data-bs-toggle="modal" data-bs-target="#modalEditpub{{$immobilier->id}}"> <i class="bi bi-bookmark fa-fw pe-2"></i>Edit post</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('user.destroyImmobFront', $immobilier->id) }}" method="post" type="button">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" onclick="return confirm('Are you sure ?');" type="submit" class="bi bi-x-circle fa-fw pe-2">
                                                <i class="bi bi-x-circle fa-fw pe-2"></i>Delete post</button>
                                        </form>
                                    </li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalreservation{{$immobilier->id}}"> <i class="bi bi-slash-circle fa-fw pe-2"></i>reservation</a></li>


                                </ul>
                            </div>
                            <!-- Card feed action dropdown END -->
                        </div>
                    </div>
                    <!-- Card header END -->
                    <!-- Card body START -->
                    <div class="card-body pb-0">
                        <p>Name :{{$immobilier->name }}</p>
                        <p><i class="bi bi-geo-alt me-1"> </i> Ville : {{$immobilier->villes->name }}</p>
                        <p><span class="badge bg-success bg-opacity-10 text-success small"> {{$immobilier->etat }} </span></p>

                        {{-- @foreach ($immobilier->images as $index =>$ImmoPhoto)

                          --   @if(count($immobilier->images)>1)
                                  {{--Multiple picture design

                                          <div class="col-6">
                                              <a href="" data-glightbox data-gallery="image-popup">
                                                  <img class="rounded img-fluid"  width="150" src="{{ asset($ImmoPhoto->path) }}" alt="image {{ $index }}">
                        </a>
                    </div>

                    @else
                    <img class="card-img" height="300px" src="{{(asset($ImmoPhoto->path))}}" alt="Post">
                    @endif
                    @endforeach --}}

                    <div class="card">
                        <!-- ... other card content ... -->

                        <!-- Display images in rows with three columns -->
                        <div class="row">
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
                    </div>

                    </br>
                    <p>description :{{$immobilier->description }}</p>
                    <p>type :{{$immobilier->typeImmob->type }}</p>
                    <p> <i class="bi bi-rulers"></i> Superficie :{{$immobilier->surface }}</p>
                    <p> <i class="bi bi-coin"> le prix :{{$immobilier->prix }} TND </i></p>





                    <!-- Card feed grid END -->
                    <!-- Feed react START -->
                    <ul class="nav nav-stack py-3 small">
                        <li class="nav-item">
                            <a class="nav-link active text-secondary" href="#!"> <i class="bi bi-heart-fill me-1 icon-xs bg-danger text-white rounded-circle"></i> Louis, Billy and 126 others </a>
                        </li>

                    </ul>
                    <!-- Feed react END -->

                    <!-- Feed react START -->
                    <ul class="nav nav-pills nav-pills-light nav-fill nav-stack small border-top border-bottom py-1 mb-3">
                        <li class="nav-item">
                            <a class="nav-link mb-0 active" href="#!"> <i class="bi bi-heart pe-1"></i>Liked (56)</a>
                        </li>
                        <!-- Card reservation action menu START -->
                        <div class="nav-item dropdown">

                            <a class="nav-link mb-0" type="submit" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#modalreservation{{$immobilier->id}}"> <i class="bi bi-calendar-date-fill"></i> Reservation</a>
                            <!-- Card reservation action dropdown menu -->
                        </div>
                    </ul>

                    <!-- Card body END -->


                    <!-- Add comment -->
                    <div class="d-flex mb-3">
                        <!-- Avatar -->
                        <div class="avatar avatar-xs me-2">
                            <a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/avatar/12.jpg" alt=""> </a>
                        </div>

                        <!-- Comment box  -->
                        <form class="nav nav-item w-100 position-relative" action="{{route('user.comment',$immobilier->id)}}" method="post">

                            @csrf
                            
                          
                            <input data-autoresize class="form-control pe-5 bg-light" rows="2" placeholder="Add a comment..." name="commentaire"></input>
                            <button class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0" type="submit">
                                <i class="bi bi-send-fill"> </i>
                            </button>
                        </form>
                    </div>
                    <!-- Comment wrap START -->
                    @foreach( $commentaires as $commentaire)

                    <ul class="comment-wrap list-unstyled">
                        <!-- Comment item START -->
                        <li class="comment-item">emchii

                            <div class="d-flex position-relative">

                                <!-- Avatar -->
                                <div class="avatar avatar-xs">
                                    <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt=""></a>
                                </div>
                                <div class="ms-2">
                                    <!-- Comment by -->
                                    <div class="bg-light rounded-start-top-0 p-3 rounded">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1"> <a href="#!"> {{Auth::user()->id}}</a></h6>

                                        </div>
                                        <p class="small mb-0">{{$commentaire->commentaire}}.</p>
                                    </div>

                                </div>

                            </div>
                            <!-- Comment item nested START -->
                            <ul class="comment-item-nested list-unstyled">

                                <!-- Comment item END -->

                            </ul>
                            @endforeach
                            <!-- Comment item nested END -->
                        </li>
                        <!-- Comment item END -->

                    </ul>
                    <!-- Comment wrap END -->
                </div>
                <!-- Card body END -->
            </div>
            <!-- Card feed item END -->
            @endforeach


        </div>
        <!-- Main content END -->

        <!-- Right sidebar START -->
        {{-- @include('front.rightSidebar') --}}
        <!-- Right sidebar END -->

    </div> <!-- Row END -->
    </div>
    <!-- Container END -->

</main>
@endsection