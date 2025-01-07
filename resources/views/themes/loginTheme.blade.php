
@if (Request::is('loginTheme'))
            @include('themes.partials.head')
@endif


 <!-- Contact Start -->
 <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Login</h4>
            </div>
            <div class="row g-5">

                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s"> 
                    <form action="">

                        <input type="email" class="w-100 form-control py-3 mb-5 border-primary" placeholder="Email">
                        <input type="password" class="w-100 form-control py-3 mb-5 border-primary" placeholder="password">
                        <button class="w-100 btn btn-primary form-control py-3 border-primary text-white bg-primary" type="submit">Submit</button>
                        
                        <p class="mb-5">Need an account? <a href="https://htmlcodex.com/contact-form">Sign Up</a>.</p>
                    </form>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="border border-primary h-100 rounded">
                        <img src="{{ asset('assetsTheme') }}/img/program-2.jpg" class="img-fluid w-100 rounded" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->


@if (Request::is('loginTheme'))

@include('themes.partials.script')

@endif