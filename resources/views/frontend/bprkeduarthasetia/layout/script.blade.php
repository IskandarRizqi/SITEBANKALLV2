
     <script src="{{asset('frontend/bprjas/assets/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('frontend/bprjas/assets/js/aos.js')}}"></script>
     <script src="{{asset('frontend/bprjas/assets/js/fontawesome.js')}}"></script>
     <script src="{{asset('frontend/bprjas/assets/js/jquery.countup.js')}}"></script>
     <script src="{{asset('frontend/bprjas/assets/js/mobile-menu.js')}}"></script>
     <script src="{{asset('frontend/bprjas/assets/js/jquery.magnific-popup.js')}}"></script>
     <script src="{{asset('frontend/bprjas/assets/js/owl.carousel.min.js')}}"></script>
     <script src="{{asset('frontend/bprjas/assets/js/slick-slider.js')}}"></script>
     <script src="{{asset('frontend/bprjas/assets/js/gsap.min.js')}}"></script>
     <script src="{{asset('frontend/bprjas/assets/js/ScrollTrigger.min.js')}}"></script>
     <script src="{{asset('frontend/bprjas/assets/js/Splitetext.js')}}"></script>
     <script src="{{asset('frontend/bprjas/assets/js/text-animation.js')}}"></script>
     <script src="{{asset('frontend/bprjas/assets/js/SmoothScroll.js')}}"></script>
     <script src="{{asset('frontend/bprjas/assets/js/jquery.lineProgressbar.js')}}"></script>
     <script src="{{asset('frontend/bprjas/assets/js/ripple-btn.js')}}"></script>
     <script src="{{asset('frontend/bprjas/assets/js/main.js')}}"></script>

     <!-- Tambahkan ini di layout.blade.php -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
 $(document).ready(function() {
    // TAMBAHKAN BLOK INI DI AWAL
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ... kode JavaScript Anda yang lain ...
 });
</script>