<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- TITLE (PENTING untuk Google) -->
    <title>{{ $og->title ?? env('APP_NAME') }}</title>

    <!-- ROBOTS (agar Google index halaman) -->
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">

    <!-- DEFAULT SEO -->
    @if ($og)

        <!-- SEO description -->
        <meta name="description" content="{{ $og->description }}">
        <meta name="title" content="{{ $og->title }}">

        <!-- Open Graph (untuk Facebook, WA, LinkedIn, dll) -->
        <meta property="og:type" content="website">
        <meta property="og:locale" content="id_ID">

        <meta property="og:title" content="{{ $og->title }}">
        <meta property="og:description" content="{{ $og->description }}">
        <meta property="og:url" content="{{ url()->current() }}">

        @if ($og->image)
            <meta property="og:image" content="{{ asset('storage/' . $og->image) }}">
        @endif

    @endif




    <!--=====CSS=======-->
    <link rel="stylesheet" href="{{ asset('frontend/nusaintim/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/nusaintim/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/nusaintim/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/nusaintim/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/nusaintim/assets/css/slick-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/nusaintim/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/nusaintim/assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/nusaintim/assets/css/mobile-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/nusaintim/assets/css/main.css') }}">



    <!--=====JQUERY=======-->
    <script src="{{ asset('frontend/nusaintim/assets/js/jquery-3-7-1.min.js') }}"></script>
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "BPR Nusaintim",
        "url": "https://bprnusaintim.co.id/",
        "potentialAction": {
            "@type": "SearchAction",
            "target": {
            "@type": "EntryPoint",
            "urlTemplate": "https://bprnusaintim.co.id/search?q={search_term_string}"
            },
            "query-input": "required name=search_term_string"
        }
        }
    </script>
</head>
