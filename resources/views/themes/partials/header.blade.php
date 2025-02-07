<!-- Navbar start -->
<div class="container-fluid border-bottom bg-light wow fadeIn" data-wow-delay="0.1s">
    <div class="container topbar bg-primary d-none d-lg-block py-2" style="border-radius: 0 40px">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white"> Mecca Street, Amman</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">Kidnova@gmail.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="https://www.facebook.com" class="btn btn-light btn-sm-square rounded-circle" target="_blank">
                    <i class="fab fa-facebook-f text-secondary"></i>
                </a>
                <a href="https://x.com" class="btn btn-light btn-sm-square rounded-circle" target="_blank">
                    <i class="fab fa-twitter text-secondary"></i>
                </a>
                <a href="https://www.instagram.com" class="btn btn-light btn-sm-square rounded-circle" target="_blank">
                    <i class="fab fa-instagram text-secondary"></i>
                </a>
                <a href="https://www.linkedin.com" class="btn btn-light btn-sm-square rounded-circle me-0" target="_blank">
                    <i class="fab fa-linkedin-in text-secondary"></i>
                </a>
                
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light navbar-expand-xl py-3">
            <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">Kid<span class="text-secondary">nova</span></h1></a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{route ('master') }}" class="nav-item nav-link @yield('Home-active')">Home</a>
                    <a href="{{route ('about') }}" class="nav-item nav-link @yield('About-active')">About</a>
                    <a href="{{route ('service') }}" class="nav-item nav-link @yield('Services-active')">Services</a>
                    <a href="{{route ('program') }}" class="nav-item nav-link @yield('Programs-active')">Programs</a>
                    <a href="{{route ('event') }}" class="nav-item nav-link @yield('Events-active')">Events</a>
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <a href="{{route ('blog') }}" class="dropdown-item">Our Blog</a>
                            <a href="{{route ('team') }}" class="dropdown-item">Our Team</a>
                            <a href="{{route ('testimonial') }}" class="dropdown-item">Testimonial</a>
                            {{-- <a href="{{route ('404') }}" class="dropdown-item">404 Page</a> 
                        </div>
                    </div> --}}
                    <a href="{{route ('contact_us.create')}}" class="nav-item nav-link">Contact</a>
                </div>
                <div class="d-flex me-4">
                    <div id="phone-tada" class="d-flex align-items-center justify-content-center">
                        <a href="" class="position-relative wow tada" data-wow-delay=".9s" >
                            <i class="fa fa-phone-alt text-primary fa-2x me-4"></i>
                            <div class="position-absolute" style="top: -7px; left: 20px;">
                                <span><i class="fa fa-comment-dots text-secondary"></i></span>
                            </div>
                        </a>
                    </div>
                    <div class="d-flex flex-column pe-3 border-end border-primary">
                        <span class="text-primary">Have any questions?</span>
                        <a href="#"><span class="text-secondary">Free: + 962 81516814</span></a>
                    </div>
                </div>
                <button class="btn-search btn btn-primary btn-md-square rounded-circle" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-white"></i></button>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->


<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->