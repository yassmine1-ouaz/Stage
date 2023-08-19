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


                    <!-- Share feed START -->
                  @include('front.publication')
                    <!-- Share feed END -->
                    @foreach( $immobiliers as $immobilier)
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
                                        <li><a class="dropdown-item" href={{route('user.editImmob',['id'])}}> <i class="bi bi-bookmark fa-fw pe-2"></i>Edit post</a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Delete post </a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
                                    </ul>
                                </div>
                                <!-- Card feed action dropdown END -->
                            </div>
                        </div>
                        <!-- Card header END -->
                        <!-- Card body START -->
                        <div class="card-body pb-0">
                            <p>Name :{{$immobilier->name }}</p>
                            <p>description :{{$immobilier->description }}</p>
                            <p>type :{{$immobilier->typeImmob->type }}</p>
                            <p> etat :{{$immobilier->etat }}</p>
                            <p> la surface :{{$immobilier->surface }}</p>
                            <p>le prix :{{$immobilier->prix }}</p>
                            <p>Ville :{{$immobilier->villes->name }}</p>

                            {{--     @foreach ($immobilier->images as $index =>$ImmoPhoto)

                          --   @if(count($immobilier->images)>1)
                                  {{--Multiple picture design

                                          <div class="col-6">
                                              <a href="" data-glightbox data-gallery="image-popup">
                                                  <img class="rounded img-fluid" src="{{ asset($ImmoPhoto->path) }}" alt="image {{ $index }}">
                                              </a>
                                          </div>

                                @else
                                       <img class="card-img" src="{{(asset($ImmoPhoto->path))}}" alt="Post">
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




                            <!-- Card feed grid END -->

                                <!-- Feed react START -->
                                <ul class="nav nav-stack py-3 small">
                                    <li class="nav-item">
                                        <a class="nav-link active text-secondary" href="#!"> <i class="bi bi-heart-fill me-1 icon-xs bg-danger text-white rounded-circle"></i> Louis, Billy and 126 others </a>
                                    </li>
                                    <li class="nav-item ms-sm-auto">
                                        <a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
                                    </li>
                                </ul>
                                <!-- Feed react END -->

                                <!-- Feed react START -->
                                <ul class="nav nav-pills nav-pills-light nav-fill nav-stack small border-top border-bottom py-1 mb-3">
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 active" href="#!"> <i class="bi bi-heart pe-1"></i>Liked (56)</a>
                                    </li>
                                    <!-- Card share action menu START -->
                                    <li class="nav-item dropdown">
                                        <a href="#" class="nav-link mb-0" id="cardShareAction4" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                                        </a>
                                        <!-- Card share action dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction4">
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
                                        </ul>
                                    </li>
                                    <!-- Card share action menu END -->
                                    <li class="nav-item">
                                        <a class="nav-link mb-0" href="#!"> <i class="bi bi-send-fill pe-1"></i>Send</a>
                                    </li>
                                </ul>

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
                        <!-- Card footer START -->
                        <div class="card-footer border-0 pt-0">
                            <!-- Load more comments -->
                            <a href="#!" role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center" data-bs-toggle="button" aria-pressed="true">
                                <div class="spinner-dots me-2">
                                    <span class="spinner-dot"></span>
                                    <span class="spinner-dot"></span>
                                    <span class="spinner-dot"></span>
                                </div>
                                Load more comments
                            </a>
                        </div>
                        <!-- Card footer END -->
                    </div>
                    <!-- Card feed item END -->
                    @endforeach


                </div>
                <!-- Main content END -->

                <!-- Right sidebar START -->
             {{--  @include('front.rightSidebar') --}}
                <!-- Right sidebar END -->

            </div> <!-- Row END -->
        </div>
        <!-- Container END -->

    </main>
@endsection
