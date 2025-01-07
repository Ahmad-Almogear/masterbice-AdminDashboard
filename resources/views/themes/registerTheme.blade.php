@if (Request::is('registerUser'))
            @include('themes.partials.head')
        @endif
{!! Toastr::message() !!}

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Contact Us</h4>
                <h1 class="display-3">Contact For Any Query</h1>
                <p class="mb-5">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <form action="{{ route('registerUser') }}"  method="POST">
                        @csrf
                        <input type="text" class="w-100 form-control py-3 mb-5 border-primary @error('name') is-invalid @enderror" placeholder="Your Name" name="name">
                        {{-- <input type="text" class="w-100 form-control py-3 mb-5 border-primary @error('phone') is-invalid @enderror" placeholder="phone" name="phone"> --}}
                        <input type="email" class="w-100 form-control py-3 mb-5 border-primary @error('Email') is-invalid @enderror" placeholder="Enter Your Email" name="email">
                        <input type="password" class="w-100 form-control py-3 mb-5 border-primary @error('password') is-invalid @enderror" placeholder="password" name="password">
                        <input type="password" class="w-100 form-control py-3 mb-5 border-primary @error('Confirm password') is-invalid @enderror" placeholder="Confirm password" name="password_confirmation">


                        <button class="w-100 btn btn-primary form-control py-3 border-primary text-white bg-primary" type="submit">Submit</button>
                    </form>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="border border-primary h-100 rounded">
                        <img src="{{ asset('assetsTheme') }}/img/program-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Image">
                </div>
            </div>
        </div>
    </div>
</div>
@if (Request::is('registerUser'))

@include('themes.partials.script')

@endif