 @if (Request::is('event'))
            @include('themes.partials.head')
            @include('themes.partials.header')
            @include('themes.partials.hero')
        @endif
<div class="container-fluid events py-5 bg-light">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Our Events</h4>
            <h1 class="mb-5 display-3">Our Upcoming Events</h1>
        </div>

        <div class="row g-5 justify-content-center">
        @foreach ($events as $event)

            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="events-item bg-primary rounded">
                    <div class="events-inner position-relative">
                        <div class="events-img overflow-hidden rounded-circle position-relative">
                            <img src="{{  asset('storage/teachers/'. basename($event->image)) }}" class="img-fluid w-100 rounded-circle" alt="Image">
                            <div class="event-overlay">
                                <a href="" data-toggle="modal" data-target="#registerModal" data-lightbox="event-1"><i class="fas fa-search-plus text-white fa-2x"></i></a>
                            </div>
                        </div>
                        <div class="px-4 py-2 bg-secondary text-white text-center events-rate">{{ $event->price }}</div>
                        <div class="d-flex justify-content-between px-4 py-2 bg-secondary">
                            <small class="text-white"><i class="fas fa-calendar me-1 text-primary"></i>{{ $event->event_date }}</small>
                            <small class="text-white"><i class="fas fa-clock me-1 text-primary"></i>{{ $event->event_time }}</small>
                        </div>
                    </div>
                    <div class="events-text p-4 border border-primary bg-white border-top-0 rounded-bottom">
                        <a href="" class="h4" data-toggle="modal" data-target="#registerModal">{{ $event->title }}</a>
                        <p class="mb-0 mt-3">{{ $event->description }}</p>
                    </div>
                </div>
            </div>

        <!-- نافذة منبثقة (Popup) لإدخال بيانات التسجيل -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="registerModalLabel">Register in the Event
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="registerForm" method="POST" action="{{ route('event.register') }}">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">  <!-- إضافة event_id -->

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" required placeholder="Enter your name">
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="text" class="form-control" id="phone" name="phone" required placeholder="Enter phone number">
            </div>
            <div class="form-group">
              <label for="children_count">Child's age</label>
              <input type="number" class="form-control" id="children_count" name="children_count" required placeholder="Enter your child's age">
            </div>
            <div class="form-group">
              <label for="child_name">Child's name</label>
              <input type="text" class="form-control" id="child_name" name="child_name" required placeholder="Child's name">
            </div>
            <!-- يمكنك إضافة المزيد من الحقول حسب الحاجة -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">registration</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach


        </div>

    </div>

</div>

@if (Request::is('events'))

@include('themes.partials.footer')
@include('themes.partials.script')

@endif
