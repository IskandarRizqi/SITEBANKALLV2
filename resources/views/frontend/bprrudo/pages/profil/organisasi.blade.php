@extends('frontend.bprrudo.layout.main')

@section('content')
    <style>
        /* Running text animation */
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* Responsive Banner */
        .banner-img {
            width: 100%;
            height: 500px;
            object-fit: fill;
            display: block;
        }

        @media(max-width:768px) {
            .banner-img {
                height: 260px;
                object-fit: cover;
            }
        }

        /* Responsive Running Text */
        .running-text {
            color: rgb(250, 109, 109);
            font-size: 58px;
            font-weight: bold;
            padding-right: 80px;
            white-space: nowrap;
        }

        @media(max-width:768px) {
            .running-text {
                font-size: 28px;
                padding-right: 40px;
            }
        }
    </style>

    <!-- Banner -->
    <div style="width:100%; overflow:hidden; margin-top:100px;">
        @if ($organisasi && $organisasi->banner)
            <img src="/recfil?display=true&rf={{ $organisasi->banner }}" alt="Banner" class="banner-img"
                style="object-fit: fill; height: auto;">
        @else
            <img src="{{ asset('frontend/bprrudo/assets/img/profil/sejarahhh.png') }}" alt="Banner" class="banner-img"
                style="object-fit: fill; height: auto;">
        @endif
    </div>

    <!-- Running Text -->
    <div style="width:100%; overflow:hidden; white-space:nowrap; position:relative; padding:10px 0;">
        <div
            style="display:flex; width:max-content; font-family:'Open Sans', sans-serif; animation:marquee 90s linear infinite;">
            <span class="running-text" style="font-family:'Open Sans', sans-serif; font-size:40px; font-style:italic;">
                SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES
                BERSAMA NASABAH -
                SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES
                BERSAMA NASABAH -
            </span>
        </div>
    </div>
    @if ($organisasi)
        <div style="width:100%; overflow:hidden; white-space:nowrap; position:relative; padding:10px 0;">
            <div
                style="display:flex; width:max-content; font-family:'Open Sans', sans-serif; animation:marquee 55s linear infinite;">
                <span class="running-text" style="font-family:'Open Sans', sans-serif;">
                    SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -
                </span>
                <span class="running-text" style="font-family:'Open Sans', sans-serif;">
                    SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH - SUKSES BERSAMA NASABAH -
                </span>
            </div>
        </div>
        <div
            style="font-family:'Open Sans', sans-serif; display: flex; justify-content: center;  min-height: 100vh; padding: 20px; margin: 0;">
            <div style="width: 100%; max-width: 1200px;">
                <h2 style="text-align: center; font-weight: bold; margin-bottom: 30px; color: #A62C3D;">STRUKTUR ORGANISASI
                </h2>

                <!-- Kontainer Slider Dimulai di Sini -->
                <div id="sliderContainer"
                    style="position: relative; width: 100%; margin: auto; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">

                    <div id="slideViewport" style="width: 100%; display: flex; transition: transform 0.5s ease-in-out;">

                        {{-- Gambar dari admin --}}
                        <div id="adminContent" style="display:none;">
                            {!! $organisasi->content !!}
                        </div>

                    </div>

                    <button onclick="plusSlides(-1)"
                        style="position: absolute; top: 50%; left: 15px; transform: translateY(-50%); background-color: rgba(255,255,255,0.7); color: #A62C3D; border: none; border-radius: 50%; width: 40px; height: 40px; font-size: 24px; cursor: pointer; display: flex; justify-content: center; align-items: center; transition: background-color 0.3s;">&#10094;</button>
                    <button onclick="plusSlides(1)"
                        style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); background-color: rgba(255,255,255,0.7); color: #A62C3D; border: none; border-radius: 50%; width: 40px; height: 40px; font-size: 24px; cursor: pointer; display: flex; justify-content: center; align-items: center; transition: background-color 0.3s;">&#10095;</button>

                    <!-- Dot -->
                    <div id="dots" style="text-align:center; padding-top:10px;"></div>
                </div>

                <!-- Kontainer Slider Selesai di Sini -->

            </div>
        </div>
    @endif
    <script>
        let slideIndex = 1;

        document.addEventListener('DOMContentLoaded', function() {
            const adminContent = document.getElementById('adminContent');
            const images = adminContent.querySelectorAll('img');
            const viewport = document.getElementById('slideViewport');
            const dotsContainer = document.getElementById('dots');

            images.forEach((img, index) => {
                // Bungkus tiap gambar jadi slide
                const slide = document.createElement('div');
                slide.className = 'slide';
                slide.style.minWidth = '100%';
                slide.style.display = 'flex';
                slide.style.justifyContent = 'center';
                slide.style.alignItems = 'center';
                slide.style.padding = '20px';

                img.style.maxWidth = '100%';
                img.style.height = 'auto';

                slide.appendChild(img);
                viewport.appendChild(slide);

                // Buat dot
                const dot = document.createElement('span');
                dot.className = 'dot';
                dot.style.height = '12px';
                dot.style.width = '12px';
                dot.style.margin = '0 5px';
                dot.style.borderRadius = '50%';
                dot.style.display = 'inline-block';
                dot.style.cursor = 'pointer';
                dot.style.backgroundColor = index === 0 ? '#A62C3D' : '#bbb';

                dot.onclick = () => currentSlide(index + 1);
                dotsContainer.appendChild(dot);
            });

            showSlide(slideIndex);
        });

        function plusSlides(n) {
            showSlide(slideIndex += n);
        }

        function currentSlide(n) {
            showSlide(slideIndex = n);
        }

        function showSlide(n) {
            const slides = document.getElementsByClassName("slide");
            const dots = document.getElementsByClassName("dot");

            if (n > slides.length) slideIndex = 1;
            if (n < 1) slideIndex = slides.length;

            document.getElementById('slideViewport').style.transform =
                'translateX(' + -(slideIndex - 1) * 100 + '%)';

            for (let i = 0; i < dots.length; i++) {
                dots[i].style.backgroundColor = '#bbb';
            }

            dots[slideIndex - 1].style.backgroundColor = '#A62C3D';
        }
    </script>
@endsection
