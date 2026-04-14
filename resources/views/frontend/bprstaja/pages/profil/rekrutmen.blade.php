@extends('frontend.bprstaja.layout.main')

@section('content')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Rekruitment</h2>
                </div>

            </div>
        </div>
    </div>

    <!-- Blog Start -->
    <div class="blog">
        <div class="container">
            <div class="section-header text-center">

                <div class="row blog-page">

                    @foreach ($rekruitmen as $item)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">

                            <a href="{{ route('detrekrutmen', $item->id) }}"
                                style="text-decoration:none; color:inherit; display:block;">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <img src="/recfil?display=true&rf={{ $item->gambar }}" alt="{{ $item->judul }}">
                                    </div>

                                    <div class="blog-title" style="text-align:center;">
                                        <h3>{{ $item->judul }}</h3>
                                    </div>

                                    <div class="blog-meta">
                                        <p>
                                            <i class="far fa-calendar-alt"></i>
                                            Batas Lamar:
                                            <span>
                                                {{ \Carbon\Carbon::parse($item->tanggal_berakhir)->format('d F Y') }}
                                            </span>
                                        </p>
                                    </div>

                                    <div class="blog-text">
                                        <p>
                                            Bergabunglah dengan tim kami! Kami mencari individu yang bersemangat dan
                                            profesional
                                            untuk mengisi posisi {{ $item->judul }}. Peluang karir menanti Anda.
                                        </p>
                                    </div>

                                </div>
                            </a>

                        </div>
                    @endforeach

                </div>
                {{-- <div class="row">
                    <div class="col-12">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- Blog End -->
    @endsection
