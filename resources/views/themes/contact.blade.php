@if (Request::is('contact-us'))
            @include('themes.partials.head')
            @include('themes.partials.header')
            @include('themes.partials.hero')
        @endif

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Contact Us</h4>
                <h1 class="display-3">Contact For Any Query</h1>
                <p class="mb-5">We're here to assist you. Reach out for any inquiries, feedback, or support. Our team is ready to help!
                {{-- <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> --}}
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex w-100 border border-primary p-4 rounded bg-white">
                        <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                        <div class="">
                            <h4>Address</h4>
                            <p class="mb-2">Mecca Street, Amman</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="d-flex w-100 border border-primary p-4 rounded bg-white">
                        <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                        <div class="">
                            <h4>Mail Us</h4>
                            <p class="mb-2">Kidnova@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="d-flex w-100 border border-primary p-4 rounded bg-white">
                        <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                        <div class="">
                            <h4>Telephone</h4>
                            <p class="mb-2">(+962) 71516814</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <form action="{{ route('contact_us.store') }}"  method="POST">
                        @csrf
                        <input type="text" class="w-100 form-control py-3 mb-5 border-primary" placeholder="Your Name" name="name">
                        <input type="text" class="w-100 form-control py-3 mb-5 border-primary" placeholder="phone" name="phone">
                        <input type="email" class="w-100 form-control py-3 mb-5 border-primary" placeholder="Enter Your Email" name="email">
                        <textarea class="w-100 form-control mb-5 border-primary" rows="8" cols="10" placeholder="Your Message" name="message"></textarea>
                        <button class="w-100 btn btn-primary form-control py-3 border-primary text-white bg-primary" type="submit">Submit</button>
                    </form>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="border border-primary h-100 rounded">
                        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.0360649959!2d-74.3093289654168!3d40.69753996411732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1691911295047!5m2!1sen!2sbd"  --}}
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.0360649959!2d35.9375!3d31.9686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x150168d82537c1e7%3A0x5fd826c017b64bb3!2sMakkah%20Street%2C%20Amman%2C%20Jordan!5e0!3m2!1sen!2sbd!4v1691911295047!5m2!1sen!2sbd"
                        class="w-100 h-100 rounded" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (Request::is('contact-us'))

@include('themes.partials.footer')
@include('themes.partials.script')

@endif