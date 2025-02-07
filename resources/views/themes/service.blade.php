@if (Request::is('service'))
            @include('themes.partials.head')
            @include('themes.partials.header')
            @include('themes.partials.hero')
        @endif

<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">What We Do</h4>
            <h1 class="mb-5 display-3">Thanks To Get Started With Our School</h1>
        </div>
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="text-center border-primary border bg-white service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-inner">
                            <div class="p-4"><i class="fas fa-gamepad fa-6x text-primary"></i></div>
                            <a href="#" class="h4">Study & Game</a>
                            <p class="my-3">At Kidnova, we blend learning with play, fostering creativity and problem-solving through interactive games that engage and educate children.

                            </p>
                            {{-- <a href="#" class="btn btn-primary text-white px-4 py-2 my-2 btn-border-radius">Read More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
                <div class="text-center border-primary border bg-white service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-inner">
                            <div class="p-4"><i class="fas fa-sort-alpha-down fa-6x text-primary"></i></div>
                            <a href="#" class="h4">A to Z Programs</a>
                            <p class="my-3"> cover all aspects of early childhood development, from cognitive skills to social and emotional growth. </p>
                            {{-- <a href="#" class="btn btn-primary text-white px-4 py-2 my-2 btn-border-radius">Read More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="0.5s">
                <div class="text-center border-primary border bg-white service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-inner">
                            <div class="p-4"><i class="fas fa-users fa-6x text-primary"></i></div>
                            <a href="#" class="h4">Expert Teacher</a>
                            <p class="my-3">Our expert teachers are dedicated to nurturing each child's potential, providing personalized learning experiences that foster growth and success.</p>
                            {{-- <a href="#" class="btn btn-primary text-white px-4 py-2 my-2 btn-border-radius">Read More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="0.7s">
                <div class="text-center border-primary border bg-white service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-inner">
                            <div class="p-4"><i class="fas fa-user-nurse fa-6x text-primary"></i></div>
                            <a href="#" class="h4">Mental Health</a>
                            <p class="my-3">We prioritize mental health by creating a supportive environment where children feel safe, valued, and empowered to express themselves. </p>
                            {{-- <a href="#" class="btn btn-primary text-white px-4 py-2 my-2 btn-border-radius">Read More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (Request::is('service'))

@include('themes.partials.footer')
@include('themes.partials.script')

@endif
