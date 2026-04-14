
     <script src="{{asset('frontend/bprrudo/assets/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('frontend/bprrudo/assets/js/aos.js')}}"></script>
     <script src="{{asset('frontend/bprrudo/assets/js/fontawesome.js')}}"></script>
     <script src="{{asset('frontend/bprrudo/assets/js/jquery.countup.js')}}"></script>
     <script src="{{asset('frontend/bprrudo/assets/js/mobile-menu.js')}}"></script>
     <script src="{{asset('frontend/bprrudo/assets/js/jquery.magnific-popup.js')}}"></script>
     <script src="{{asset('frontend/bprrudo/assets/js/owl.carousel.min.js')}}"></script>
     <script src="{{asset('frontend/bprrudo/assets/js/slick-slider.js')}}"></script>
     <script src="{{asset('frontend/bprrudo/assets/js/gsap.min.js')}}"></script>
     <script src="{{asset('frontend/bprrudo/assets/js/ScrollTrigger.min.js')}}"></script>
     <script src="{{asset('frontend/bprrudo/assets/js/Splitetext.js')}}"></script>
     <script src="{{asset('frontend/bprrudo/assets/js/text-animation.js')}}"></script>
     <script src="{{asset('frontend/bprrudo/assets/js/SmoothScroll.js')}}"></script>
     <script src="{{asset('frontend/bprrudo/assets/js/jquery.lineProgressbar.js')}}"></script>
     <script src="{{asset('frontend/bprrudo/assets/js/ripple-btn.js')}}"></script>
     <script src="{{asset('frontend/bprrudo/assets/js/main.js')}}"></script>

     <!-- Tambahkan ini di layout.blade.php -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
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