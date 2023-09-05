@extends('front.masterfront')

@section('title','Front')
@include('sweetalert::alert')

@section('content')
<main>

    <!-- Container START -->
    <div class="container">
        <div class="row g-4">

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
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCreateEvents" href="{{route('user.editImmobFront',$immobilier->id)}}" type="submit"> <i class="bi bi-bookmark fa-fw pe-2"></i>Edit post</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('user.destroyImmobFront', $immobilier->id) }}" method="post" type="button">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" onclick="return confirm('Are you sure ?');" type="submit" class="bi bi-x-circle fa-fw pe-2">
                                                <i class="bi bi-x-circle fa-fw pe-2"></i>Delete post</button>
                                        </form>
                                    </li>
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
                                </ul>
                            </div>
                            <!-- Card feed action dropdown END -->
                        </div>
                    </div>
                    <!-- Card header END -->
                    <!-- Card body START -->
                    <div class="card-body pb-0">
                        <p><i class="houzez-icon icon-single-neutral mr-1"></i>{{$immobilier->name }}</p>

                        <p><i class="bi bi-geo-alt me-1"></i> Ville :{{$immobilier->villes->name }}</p>
                        <p> <span class="badge bg-success bg-opacity-10 text-success small"> {{$immobilier->etat }} </span></p>


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
                        <p><i class="bi bi-rulers"></i> Superficie :{{$immobilier->surface }}</p>
                        <p> <i class="bi bi-coin"> le prix :{{$immobilier->prix }} TND </i></p>


                        <!-- Card feed grid END -->

                        <!-- Feed react START -->
                        <ul class="nav nav-stack py-3 small">
                            <li class="nav-item">
                                <a class="nav-link active text-secondary" href="#!"> <i class="bi bi-heart-fill me-1 icon-xs bg-danger text-white rounded-circle"></i> Louis, Billy and 126 others </a>
                            </li>

                        </ul>
                        <!-- Feed react END -->

                        <!-- Card body END -->


                        <!-- Add comment -->
                        <div class="d-flex mb-3">
                            <!-- Avatar -->
                            <div class="avatar avatar-xs me-2">
                                <a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/avatar/12.jpg" alt=""> </a>
                            </div>
                            <!-- Comment box  -->
                            <form class="nav nav-item w-100 position-relative">
                                <textarea data-autoresize class="form-control pe-5 bg-light" rows="1" placeholder="Add a comment..."></textarea>
                                <button class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0" type="submit">
                                    <i class="bi bi-send-fill"> </i>
                                </button>
                            </form>
                        </div>
                        <!-- Comment wrap START -->
                        <ul class="comment-wrap list-unstyled">
                            <!-- Comment item START -->
                            <li class="comment-item">
                                <div class="d-flex position-relative">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs">
                                        <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt=""></a>
                                    </div>
                                    <div class="ms-2">
                                        <!-- Comment by -->
                                        <div class="bg-light rounded-start-top-0 p-3 rounded">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-1"> <a href="#!"> Frances Guerrero </a></h6>
                                                <small class="ms-2">5hr</small>
                                            </div>
                                            <p class="small mb-0">Removed demands expense account in outward tedious do. Particular way thoroughly unaffected projection.</p>
                                        </div>
                                        <!-- Comment react -->
                                        <ul class="nav nav-divider py-2 small">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#!"> Like (3)</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#!"> Reply</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#!"> View 5 replies</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Comment item nested START -->
                                <ul class="comment-item-nested list-unstyled">

                                    <!-- Comment item END -->

                                </ul>

                                <!-- Comment item nested END -->
                            </li>
                            <!-- Comment item END -->

                        </ul>
                        <!-- Comment wrap END -->
                    </div>
                    <!-- Card body END -->
                </div>
                <!-- Card feed item END -->

                <!-- Request start -->


                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h2>Contact Information</h2>

                        <a class="btn btn-primary btn-slim" href="https://www.logis.tn/agent/century-21-infinity/" target="_blank">View Listings</a>
                    </div>

                    <form action="" method="post">

                        <div class="agent-details">
                            <div class="d-flex align-items-center">
                                <div class="agent-image"><a href="https://www.logis.tn/agent/century-21-infinity/"><img class="rounded" src="https://logistunisie.s3.amazonaws.com/uploads/2023/05/09081405/IMG_7993-150x150.jpeg" alt="" width="80" height="80"></a></div>
                                <ul class="agent-information list-unstyled">
                                    <i class="bi bi-person"></i> {{Auth::user()->name}}</li>
                                    <li class="agent-phone-wrap clearfix"><i class="bi bi-telephone-fill"></i><span class="agent-phone "><a href="tel:+21625794794">+216 {{Auth::user()->phone}}</a></span><i class="houzez-icon icon-mobile-phone mr-1"></i></li>
                                    <li class="agent-social-media"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-header border-0 pb-0">
                            <h3>Make Reservation</h3>
                        </div>

                        <div class="form_messages"></div>

                        <div class="row">


                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <i class="bi bi-envelope fa-fw pe-1"></i>
                                    <label>Reservation Date</label>
                                    <input class="form-control" id="reserv_date" name="reserv_date" type="datetime-local">
                                </div>
                            </div><!-- col-md-6 col-sm-12 -->


                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group form-group-textarea">
                                    <i class="bi bi-chat-fill pe-1"></i>
                                    <label>Message</label>
                                    <textarea class="form-control hz-form-message" name="message" rows="5" placeholder="Enter your Message">Hello, I am interested in [S+2]</textarea>
                                </div>
                            </div><!-- col-sm-12 col-xs-12 -->


                            <div class="col-sm-12 col-xs-12">

                                <button type="submit" class="houzez_agent_property_form btn btn-secondary btn-sm-full-width">
                                    <span class="btn-loader houzez-loader-js"></span>Request Information
                                </button>


                            </div><!-- col-sm-12 col-xs-12 -->

                        </div><!-- row -->
                    </form>






                </div>

            </div>
            <!-- Main content END -->

            <!-- Right sidebar START -->
            @include('front.rightSidebar')
            <!-- Right sidebar END -->

        </div> <!-- Row END -->
    </div>
    <!-- Container END -->

</main>
@endsection