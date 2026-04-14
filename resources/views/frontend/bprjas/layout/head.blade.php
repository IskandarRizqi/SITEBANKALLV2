<head>
     <meta charset="UTF-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>{{ env(('APP_NAME')) }}</title>
     

     <!--=====FAB ICON=======-->
     <link rel="shortcut icon" href="{{asset('frontend/bprjas/assets/img/logo/jas.png')}}" type="image/x-icon">


     <!--=====CSS=======-->
     <link rel="stylesheet" href="{{asset('frontend/bprjas/assets/css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('frontend/bprjas/assets/css/fontawesome.css')}}">
     <link rel="stylesheet" href="{{asset('frontend/bprjas/assets/css/magnific-popup.css')}}">
     <link rel="stylesheet" href="{{asset('frontend/bprjas/assets/css/nice-select.css')}}">
     <link rel="stylesheet" href="{{asset('frontend/bprjas/assets/css/slick-slider.css')}}">
     <link rel="stylesheet" href="{{asset('frontend/bprjas/assets/css/owl.carousel.min.css')}}">
     <link rel="stylesheet" href="{{asset('frontend/bprjas/assets/css/aos.css')}}">
     <link rel="stylesheet" href="{{asset('frontend/bprjas/assets/css/mobile-menu.css')}}">
     <link rel="stylesheet" href="{{asset('frontend/bprjas/assets/css/main.css')}}">



     <!--=====JQUERY=======-->
     <script src="{{asset('frontend/bprjas/assets/js/jquery-3-7-1.min.js')}}"></script>
</head>