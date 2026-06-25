@extends('frontend.bprbkkbatang.layout.main')

@section('content')
    <style>
        .banner-img {
            width: 100%;
            height: 650px;
            object-fit: fill;
            display: block;
        }

        @media(max-width:768px) {
            .banner-img {
                height: 260px;
                object-fit: cover;
            }
        }


        .team-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .team-box {
            color: #fff;
        }

        .team-box h5,
        .team-box p {
            color: #fff;
        }
    </style>

    <div class="container-fluid bg-breadcrumb">
        <img src="{{asset('frontend/bprbkkbatang/assets/img/banner/pengajuan.png')}}" alt="Breadcrumb" class="breadcrumb-img" />
    </div>
    <div class="team2 team-page sp" style="padding-top:0px">
        <div class="container" style="margin-top: 50px">
            <br>

            {{-- <h4 style=" text-align:center; color:#e53935; font-weight:600; margin-bottom:20px;">
                Pengajuan Online
            </h4> --}}

            <div style=" border:1.5px solid #3401ff; border-radius:8px; padding:30px 15px; margin-bottom: 30px;">

                <h5 style=" text-align:center; font-weight:600; margin-bottom:30px; ">
                    Pilih Layanan
                </h5>

                <div class="row justify-content-center">

                    <!-- Kredit -->
                    <div class="col-lg-4 col-md-6">
                        <a href="/formpengajuankredit" style="text-decoration:none;color:inherit;">
                            <div class="team-box"
                                style="background:#f63030;border-radius:8px;padding:25px 15px;text-align:center;margin-bottom:20px;cursor:pointer;transition:.3s;">
                                <div class="image-area">
                                    <div class="image">
                                        <img src="{{ asset('frontend/bprrudo/assets/img/profil/kredit.png') }}"
                                            style="width:70px;margin-bottom:15px;">
                                    </div>
                                </div>
                                <h5 style="margin-bottom:5px;">Kredit</h5>
                                <p style="font-size:15px;color:#fff;">Klik disini untuk mengisi formulir <br> pengajuan
                                    Kredit</p>
                            </div>
                        </a>
                    </div>


                    <!-- Tabungan -->
                    <div class="col-lg-4 col-md-6">
                        <a href="/formpengajuantabungan" style="text-decoration:none;color:inherit;">
                            <div class="team-box"
                                style="background:#f63030;border-radius:8px;padding:25px 15px;text-align:center;margin-bottom:20px;cursor:pointer;transition:.3s;">
                                <div class="image-area">
                                    <div class="image">
                                        <img src="{{ asset('frontend/bprrudo/assets/img/profil/tabungan.png') }}"
                                            style="width:70px;margin-bottom:15px;">
                                    </div>
                                </div>
                                <h5 style="margin-bottom:5px;">Tabungan</h5>
                                <p style="font-size:15px;color:#fff;">Klik disini untuk mengisi formulir <br> pengajuan
                                    Tabungan</p>
                            </div>
                        </a>
                    </div>



                    <!-- Deposito -->
                    <div class="col-lg-4 col-md-6">
                        <a href="/formpengajuandeposito" style="text-decoration:none;color:inherit;">
                            <div class="team-box"
                                style="background:#f63030;border-radius:8px;padding:25px 15px;text-align:center;margin-bottom:20px;cursor:pointer;transition:.3s;">
                                <div class="image-area">
                                    <div class="image">
                                        <img src="{{ asset('frontend/bprrudo/assets/img/profil/deposito.png') }}"
                                            style="width:70px;margin-bottom:15px;">
                                    </div>
                                </div>

                                <h5 style="margin-bottom:5px;">Deposito</h5>
                                <p style="font-size:15px;color:#fff;">
                                    Klik disini untuk mengisi formulir <br>
                                    pengajuan Deposito
                                </p>
                            </div>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
