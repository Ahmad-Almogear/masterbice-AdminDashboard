

<!DOCTYPE html>
<html lang="en">
    @section('title' , 'master')

   <!-- head Start-->
   @include('themes.partials.head')
   <!-- end head -->


    <body>

        <!-- Spinner Start -->
        {{-- @include('themes.partials.spinner') --}}
        <!-- Spinner End -->
        
        <!-- header End -->
        @include('themes.partials.header')
        <!-- header End -->


        <!-- Hero Start -->
        @include('themes.partials.heroIndex')
        <!-- Hero End -->


        <!-- About Start -->
        @include('themes.about')
        <!-- About End -->


        <!-- Service Start -->
        @include('themes.service')
        <!-- Service End -->


        <!-- Programs Start -->
        @include('themes.program')
        <!-- Program End -->


        <!-- Events Start -->
        @include('themes.event')
        <!-- Events End-->


        <!-- Blog Start-->
        @include('themes.blog')
        <!-- Blog End-->


        <!-- Team Start-->
        @include('themes.team')
        <!-- Team End-->


        <!-- Testimonial Start -->
        @include('themes.testimonial')
        <!-- Testimonial End -->
        
        <!-- Footer Start -->
        @include('themes.partials.footer')
        <!-- End Footer -->
        
        <!-- JavaScript Libraries -->
        @include('themes.partials.script')
    

    
    </body>

</html>