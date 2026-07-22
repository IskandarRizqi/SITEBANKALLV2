@extends('frontend.bprmekar.layout.main')

@section('content')
<style>
   .list-item {
        list-style-type: none;
    }
</style>
<!-- <div class="breadcumb-area style2 bg-smoke4">
    <div class="breadcumb-wrapper" data-bg-src="frontend/bprsms/assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Sejarah</h1>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Profil</a></li>
                    <li>Sejarah</li>
                </ul>
            </div>
        </div>
    </div>
</div> -->

<div class="container-fluid bg-breadcrumb">
        <img src="{{asset('frontend/bprmekar/assets/img/banner/profile.jpg')}}" alt="Breadcrumb" class="breadcrumb-img" />
    </div>

<div class="container py-5">
<h5 class="display-4 wow fadeInDown" style="color: #000; text-align: center;" data-wow-delay="0.1s">TATA KELOLA</h5>
    <div class="row align-items-center">
        <p>
            PT BPR MEKARNUGRAHA Memiliki komitmen untuk memperkuat sistem pengendalian internal, membangun budaya dan kepedulian anti-fraud diseluruh jenjang organisasi agar terciptanya tata kelola yang baik. 
            Komitmen tersebut kami tuangkan dalam beberapa dokumen deklarasi sebagai berikut : 
        </p>
        <ul>
            <li class="list-item">1. "Kode Etik Bankir" yang dapat dilihat <a href="#" target="_blank">di sini</a></li>
            <li class="list-item">2. "Audit Charter"</li>
            <li class="list-item">3. "Compliance Charter"</li>
        </ul>

    </div>
</div>

@endsection