 <!-- JavaScript Libraries -->
    
 <script src="{{asset('frontend/bprkotamagelang/assets/js/jquery-3.7.1.min.js')}}"></script>
 
 <script src="{{asset('frontend/bprkotamagelang/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/bprkotamagelang/assets/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('frontend/bprkotamagelang/assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('frontend/bprkotamagelang/assets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/bprkotamagelang/assets/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('frontend/bprkotamagelang/assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/bprkotamagelang/assets/lib/lightbox/js/lightbox.min.js')}}"></script>

    
      <!-- Swiper -->
      <script src="{{asset('frontend/bprkotamagelang/assets/js/swiper-bundle.min.js')}}"></script>
      <!-- CounterUp -->
      <script src="{{asset('frontend/bprkotamagelang/assets/js/jquery.magnific-popup.min.js')}}"></script>
      <!-- AOS -->
      <script src="{{asset('frontend/bprkotamagelang/assets/js/aos.js')}}"></script>
      
      <!-- Template Javascript -->
      <script src="{{asset('frontend/bprkotamagelang/assets/js/main.js')}}"></script>

      <script>
            $('.header-carousel').owlCarousel({
                items: 1,
                loop: true,
                nav: false,
                dots: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                autoplaySpeed: 600,   // tambahkan ini
                smartSpeed: 600,
            });
      </script>