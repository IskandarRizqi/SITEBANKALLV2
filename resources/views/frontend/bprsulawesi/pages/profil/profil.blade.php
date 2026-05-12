@extends('frontend.bprsulawesi.layout.main')

@section('content')
    <style>
        .profile-content,
        .profile-content * {
            background: transparent !important;
            background-color: transparent !important;
            color: #fff !important;
        }

        .navbar,
        .navbar-area,
        .header-area,
        header {
            background: #fff !important;
            position: relative;
            z-index: 999;
        }

        .breadcrumb-area {
            margin-top: 90px;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .breadcrumb-area {
                margin-top: 0;
            }
        }
    </style>
    <div id="smooth-wrapper">

        <div class="breadcrumb-area text-center shadow dark bg-fixed text-light"
            style="background-image: url(frontend/bprsulawesi/assets/img/profil/banertop.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Profil</h2>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="fas fa-home"></i> Profil</a></li>
                            <li class="active">Profil</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <body class="body tg-heading-subheading animation-style3">
            @if ($profil)
                <div
                    style="font-family:'Poppins', sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; margin: 0;">
                    <div style="width: 100%; max-width: 1120px;">

                        <div
                            style=" background: linear-gradient(45deg, #0a1c92, #837878); margin-top: 20px; padding: 25px 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                            <div
                                style="display: flex; align-items: center; margin-bottom: 15px; font-size: 28px; font-weight: bold;">
                                {{-- <img src="frontend/bprrudo/assets/img/icons/misi.png" alt="" style="height: 40px"> --}}
                                {{-- <span style="margin-left: 22px">Profile</span> --}}
                            </div>
                            <div style="list-style: none; padding-left: 0px;">

                                <div class="profile-content"
                                    style="margin-bottom: 12px; font-size: 18px; line-height: 1.8; padding-left: 25px; color:#ffffff;">

                                    {!! $profil->content !!}

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </body>
    </div>
@endsection
