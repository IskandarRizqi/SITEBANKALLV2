@extends('frontend.bprrudo.layout.main')

@section('content')
    <style>
        /* ===== GLOBAL ===== */
        .job-wrapper {
            max-width: 1150px;
            margin: 120px auto 40px;
            font-family: 'Open Sans', sans-serif;
            color: #333;
        }

        .job-header-title {
            font-size: 25px;
            font-weight: 700;
            color: #c62828;
        }

        /* ===== GALLERY GRID ===== */
        .gallery-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .gallery-item {
            width: calc(50% - 10px);
            border-radius: 6px;
            overflow: hidden;
        }

        .gallery-item img {
            width: 100%;
            height: 320px;
            object-fit: cover;
            border-radius: 6px;
            display: block;
        }

        /* ===== EVENT CONTENT ===== */
        .event-content {
            max-width: 100%;
            overflow-x: auto;
            word-wrap: break-word;
            line-height: 1.6;
            text-align: justify;
            font-family: 'Open Sans', sans-serif;
        }

        .event-content * {
            all: revert;
        }

        /* ===== MOBILE RESPONSIVE ===== */
        @media (max-width: 768px) {
            .job-wrapper {
                padding: 10px;
                margin-top: 100px;
            }

            .job-header-title {
                font-size: 20px;
            }

            .gallery-grid {
                flex-direction: column;
            }

            .gallery-item {
                width: 100%;
            }

            .gallery-item img {
                height: 220px;
            }
        }

        @media (max-width: 480px) {
            .gallery-item img {
                height: 200px;
            }
        }
    </style>

    <div class="job-wrapper">

        <!-- ===== HEADER TITLE + BACK ===== -->
        <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px;">
            <a href="javascript:history.back()" style="text-decoration:none; color:#c62828;">
                <i class="bi bi-arrow-left" style="font-size:26px; font-weight:bold;"></i>
            </a>

            <div class="job-header-title">
                {{ $header->title }}
            </div>
        </div>

        <!-- ===== GALLERY ===== -->
        <div class="gallery-grid">

            @foreach ($gallery as $item)
                <div class="gallery-item" style="text-align: center">
                    <img src="/recfil?display=true&rf={{ $item->image }}" alt="Gallery Image">

                    <div class="gallery-desc" style="margin-top: 5px">
                        {{ $item->description }}
                    </div>
                </div>
            @endforeach


        </div>

    </div>
@endsection
