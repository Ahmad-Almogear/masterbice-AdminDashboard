@if (Request::is('program'))
            @include('themes.partials.head')
            @include('themes.partials.header')
            @include('themes.partials.hero')
        @endif


<div class="container-fluid program  py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Our Programs</h4>
            <h1 class="mb-5 display-3">We Offer An Exclusive Program For Kids</h1>
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="program-item rounded">
                    <div class="program-img position-relative">
                        <div class="overflow-hidden img-border-radius">
                            <img src="{{ asset('assetsTheme') }}/img/program-1.jpg" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="px-4 py-2 bg-primary text-white program-rate">$60.99</div>
                    </div>
                    <div class="program-text bg-white px-4 pb-3">
                        <div class="program-text-inner">
                            <a href="#" class="h4">English For Today</a>
                            <p class="mt-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed purus consectetur,</p>
                        </div>
                    </div>
                    <div class="program-teacher d-flex align-items-center border-top border-primary bg-white px-4 py-3">
                        <img src="{{ asset('assetsTheme') }}/img/program-teacher.jpg" class="img-fluid rounded-circle p-2 border border-primary bg-white" alt="Image" style="width: 70px; height: 70px;">
                        <div class="ms-3">
                            <h6 class="mb-0 text-primary">Mary Mordern</h6>
                            <small>Arts Designer</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between px-4 py-2 bg-primary rounded-bottom">
                        <small class="text-white"><i class="fas fa-wheelchair me-1"></i> 30 Sits</small>
                        <small class="text-white"><i class="fas fa-book me-1"></i> 11 Lessons</small>
                        <small class="text-white"><i class="fas fa-clock me-1"></i> 60 Hours</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="program-item rounded">
                    <div class="program-img position-relative">
                        <div class="overflow-hidden img-border-radius">
                            <img src="{{ asset('assetsTheme') }}/img/program-2.jpg" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="px-4 py-2 bg-primary text-white program-rate">$60.99</div>
                    </div>
                    <div class="program-text bg-white px-4 pb-3">
                        <div class="program-text-inner">
                            <a href="#" class="h4">Graphics Arts</a>
                            <p class="mt-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed purus consectetur,</p>
                        </div>
                    </div>
                    <div class="program-teacher d-flex align-items-center border-top border-primary bg-white px-4 py-3">
                        <img src="{{ asset('assetsTheme') }}/img/program-teacher.jpg" class="img-fluid rounded-circle p-2 border border-primary bg-white" alt="" style="width: 70px; height: 70px;">
                        <div class="ms-3">
                            <h6 class="mb-0 text-primary">Mary Mordern</h6>
                            <small>Arts Designer</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between px-4 py-2 bg-primary rounded-bottom">
                        <small class="text-white"><i class="fas fa-wheelchair me-1"></i> 30 Sits</small>
                        <small class="text-white"><i class="fas fa-book me-1"></i> 11 Lessons</small>
                        <small class="text-white"><i class="fas fa-clock me-1"></i> 60 Hours</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="program-item rounded">
                    <div class="program-img position-relative">
                        <div class="overflow-hidden img-border-radius">
                            <img src="{{ asset('assetsTheme') }}/img/program-3.jpg" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="px-4 py-2 bg-primary text-white program-rate">$60.99</div>
                    </div>
                    <div class="program-text bg-white px-4 pb-3">
                        <div class="program-text-inner">
                            <a href="#" class="h4">General Science</a>
                            <p class="mt-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed purus consectetur,</p>
                        </div>
                    </div>
                    <div class="program-teacher d-flex align-items-center border-top border-primary bg-white px-4 py-3">
                        <img src="{{ asset('assetsTheme') }}/img/program-teacher.jpg" class="img-fluid rounded-circle p-2 border border-primary bg-white" alt="" style="width: 70px; height: 70px;">
                        <div class="ms-3">
                            <h6 class="mb-0 text-primary">Mary Mordern</h6>
                            <small>Arts Designer</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between px-4 py-2 bg-primary rounded-bottom">
                        <small class="text-white"><i class="fas fa-wheelchair me-1"></i> 30 Sits</small>
                        <small class="text-white"><i class="fas fa-book me-1"></i> 11 Lessons</small>
                        <small class="text-white"><i class="fas fa-clock me-1"></i> 60 Hours</small>
                    </div>
                </div>
            </div>
            <div class="d-inline-block text-center wow fadeIn" data-wow-delay="0.1s">
                <a href="#" class="btn btn-primary px-5 py-3 text-white btn-border-radius">Vew All Programs</a>
            </div>
        </div> 
    </div>
</div>
@if (Request::is('program'))

@include('themes.partials.footer')
@include('themes.partials.script')

@endif
