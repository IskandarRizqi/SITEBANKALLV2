@extends('frontend.bprsuryakencana.layout.main')

@section('content')
<style>
    .profile-content,
    .profile-content * {
        background: transparent !important;
        background-color: transparent !important;
        color: #fff !important;
    }
</style>
<div id="smooth-wrapper">

    <div class="pxn-page-header" data-bg-image="frontend/bprsuryakencana/assets/images/profil/banertop.jpg"
        style="margin-top:120px; height:150px; display:flex; align-items:center; justify-content:center;">


        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="pxn_page_header_content" style="text-align: center;">
                        <h1 class="page_title">Profil</h1>
                        <div class="pxn_breadcrumb">
                            <span><a href="/">Profil</a></span>
                            /
                            <span class="current">Profil</span>
                        </div>
                    </div>
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
                    style=" background: linear-gradient(45deg, #fb8217, #0cc431); color: white; margin-top: 20px; padding: 25px 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <div
                        style="display: flex; align-items: center; margin-bottom: 15px; font-size: 28px; font-weight: bold;">
                        {{-- <img src="frontend/bprrudo/assets/img/icons/misi.png" alt="" style="height: 40px"> --}}
                        <span style="margin-left: 22px">Profile</span>
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