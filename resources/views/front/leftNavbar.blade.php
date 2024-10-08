<div class="col-lg-3">

    <!-- Advanced filter responsive toggler START -->
    <div class="d-flex align-items-center d-lg-none">
        <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
            <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
            <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
        </button>
    </div>
    <!-- Advanced filter responsive toggler END -->

    <!-- Navbar START-->
    <nav class="navbar navbar-expand-lg mx-0">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSideNavbar">
            <!-- Offcanvas header -->
            <div class="offcanvas-header">
                <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <!-- Offcanvas body -->
            <div class="offcanvas-body d-block px-2 px-lg-0">
                <!-- Card START -->
                <div class="card overflow-hidden">
                    <!-- Cover image -->
                    <div class="h-50px" style="background-image:url(assets/images/bg/01.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                    <!-- Card body START -->
                    <div class="card-body pt-0">
                        <div class="text-center">
                            <!-- Avatar -->
                            <div class="avatar avatar-lg mt-n5 mb-3">
                                <a href="#!"><img class="avatar-img rounded border border-white border-3" src="assets/images/avatar/07.jpg" alt=""></a>
                            </div>
                            <!-- Info -->
                            <h5 class="mb-0"> <a href="#!">{{Auth::user()->name}}</a> </h5>
                            <small>{{Auth::user()->userType->name}}</small>
                            <p class="mt-3">Description</p>

                            <!-- User stat START -->
                            <div class="hstack gap-2 gap-xl-3 justify-content-center">
                                <!-- User stat item -->
                                <div>
                                    <h6 class="mb-0">256</h6>
                                    <small>Post</small>
                                </div>
                                <!-- Divider -->
                                <div class="vr"></div>
                                <!-- User stat item -->
                                <div>
                                    <h6 class="mb-0">2.5K</h6>
                                    <small>Followers</small>
                                </div>
                                <!-- Divider -->
                                <div class="vr"></div>
                                <!-- User stat item -->
                                <div>
                                    <h6 class="mb-0">365</h6>
                                    <small>Following</small>
                                </div>
                            </div>
                            <!-- User stat END -->
                        </div>

                        <!-- Divider -->
                        <hr>

                        <!-- Side Nav START -->
                        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                            <li class="nav-item">
                                <a class="nav-link" href="my-profile.html"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/home-outline-filled.svg" alt=""><span>Feed </span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="my-profile-connections.html"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/person-outline-filled.svg" alt=""><span>Connections </span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="blog.html"> <img class="me-2 h-20px fa-fw" src="assets/images/icon/earth-outline-filled.svg" alt=""><span>Latest News </span></a>
                            </li>

                        </ul>
                        <!-- Side Nav END -->
                    </div>
                    <!-- Card body END -->
                    <!-- Card footer -->
                    <div class="card-footer text-center py-2">
                        <a class="btn btn-link btn-sm" href="my-profile.html">View Profile </a>
                    </div>
                </div>
                <!-- Card END -->

                <!-- Helper link START -->
                </div>
        </div>
    </nav>
    <!-- Navbar END-->
</div>
