@extends('frontend.bprbaja.layout.main')

@section('content')
<style>
    .common-hero {
        background: url('{{ asset(env(' GLOBAL_TOPPAGE')) }}') no-repeat center center;
        background-size: contain;
        /* default untuk desktop */
        background-position: center;
        color: #fff;
        padding: 40px 0;
        position: relative;
        margin-top: 70px;
        /* jarak dari navbar */
        text-align: center;
        /* teks ke tengah */
    }

    /* Versi Mobile */
    @media (max-width: 768px) {
        .common-hero {
            background: url('{{ asset(env(' GLOBAL_TOPMOBILE')) }}') no-repeat center center;
            background-size: cover;
            /* gambar diperbesar biar penuh */
            min-height: 180px;
            /* tinggi hero agar kelihatan besar */
            display: flex;
            align-items: center;
            /* teks di tengah vertikal */
            justify-content: center;
            /* teks di tengah horizontal */
            padding: 0;
            /* hilangkan padding default */
        }

        .common-hero h1,
        .common-hero h2,
        .common-hero .title {
            font-size: 20px;
            /* sesuaikan ukuran teks agar pas di mobile */
            font-weight: bold;
            color: #000;
            /* atau putih jika kontras dengan background */
        }
    }
</style>
<!--=====HERO AREA START=======-->

<div class="common-hero">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-lg-10 m-auto">
                <div class="main-heading">
                    <h1 style="font-size: 35px">Frequently Asked Question ( FAQ )
                    </h1>
                    <span class="span"><img src="frontend/bprjas/assets/img/icons/span1.png" alt=""> <a
                            href="/">Home</a> <span class="arrow"><i class="fa-regular fa-angle-right"></i></span>
                        FAQ</span>
                </div>
            </div>

        </div>
    </div>
</div>


<!--=====FAQ AREA END=======-->

<div class="faq3 sp">
    <div class="container">


        <div class="space40"></div>
        <div class="row">
            <div class="col-lg-6">
                <div class="accordion accordion1 accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item active" data-aos="fade-up" data-aos-duration="700">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Apa itu BPR NUSAINTIM?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                BPR NUSAINTIM adalah lembaga keuangan bank yang melayani masyarakat dalam hal simpanan
                                dan pembiayaan, dengan fokus pada sektor usaha mikro, kecil, dan menengah (UMKM), serta
                                individu.

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-duration="1200">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                Apakah BPR NUSAINTIM menerima simpanan seperti bank umum?
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Ya. BPR NUSAINTIM menerima simpanan dalam bentuk tabungan dan
                                deposito berjangka, dan juga dijamin oleh Lembaga Penjamin Simpanan (LPS) sesuai dengan
                                ketentuan yang berlaku.</div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-duration="900">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Apakah dana saya aman di BPR NUSAINTIM?
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Ya, dana nasabah di BPR NUSAINTIM dijamin oleh LPS (Lembaga
                                Penjamin Simpanan) hingga jumlah tertentu, sesuai dengan syarat dan ketentuan yang
                                berlaku.</div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFour" aria-expanded="false"
                                aria-controls="flush-collapseFour">
                                Siapa saja yang bisa mengajukan kredit di BPR NUSAINTIM?
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Masyarakat umum, pelaku usaha mikro, kecil, hingga menengah,
                                serta karyawan dengan penghasilan tetap, dapat mengajukan kredit sesuai dengan
                                persyaratan yang ditentukan.</div>
                        </div>
                    </div>

                    <div class="accordion-item" data-aos="fade-up" data-aos-duration="900">
                        <h2 class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFive" aria-expanded="false"
                                aria-controls="flush-collapseFive">
                                Apa keunggulan meminjam di BPR NUSAINTIM dibandingkan BPR Lain?
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Proses cepat dan mudah
                                Syarat dokumen lebih ringan

                                Pelayanan lebih personal

                                Didukung oleh tim yang memahami kebutuhan lokal
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-lg-6">
                <div class="accordion accordion2 accordion-flush" id="accordionFlushExample2">
                    <div class="accordion-item" data-aos="fade-up" data-aos-duration="1100">
                        <h2 class="accordion-header" id="flush-headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseSix" aria-expanded="false"
                                aria-controls="flush-collapseSix">
                                Apa syarat untuk membuka rekening tabungan di BPR NUSAINTIM?
                            </button>
                        </h2>
                        <div id="flush-collapseSix" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample2">
                            <div class="accordion-body">Fotokopi KTP atau identitas sah lainnya,

                                Mengisi formulir pembukaan rekening,

                                Setoran awal sesuai jenis tabungan
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-duration="900">
                        <h2 class="accordion-header" id="flush-headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseSeven" aria-expanded="false"
                                aria-controls="flush-collapseSeven">
                                Apakah BPR NUSAINTIM menyediakan layanan digital?
                            </button>
                        </h2>
                        <div id="flush-collapseSeven" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample2">
                            <div class="accordion-body"> BPR NUSAINTIM kini menyediakan layanan mobile banking,
                                internet banking, atau SMS banking, Untuk Mempermudah Nasabah </div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-duration="1200">
                        <h2 class="accordion-header" id="flush-headingEight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseEight" aria-expanded="false"
                                aria-controls="flush-collapseEight">
                                Bagaimana cara mengajukan kredit di BPR NUSAINTIM?
                            </button>
                        </h2>
                        <div id="flush-collapseEight" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample2">
                            <div class="accordion-body">Mengunjungi kantor cabang BPR terdekat,

                                Membawa dokumen yang diperlukan (KTP, KK, slip gaji, dll.),

                                Mengisi formulir permohonan,

                                Menunggu proses analisis dan persetujuan kredit
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-duration="900">
                        <h2 class="accordion-header" id="flush-headingNine">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseNine" aria-expanded="false"
                                aria-controls="flush-collapseNine">
                                Dimana saya bisa melihat informasi suku bunga dan produk BPR NUSAINTIM?
                            </button>
                        </h2>
                        <div id="flush-collapseNine" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample2">
                            <div class="accordion-body">Informasi dapat dilihat di:

                                Website resmi BPR NUSAINTIM,

                                Kantor cabang terdekat BPT JAS,

                                Akun media sosial resmi BPR NUSAINTIM</div>
                        </div>
                    </div>

                    <div class="accordion-item active" data-aos="fade-up" data-aos-duration="1200">
                        <h2 class="accordion-header" id="flush-headingTen">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTen" aria-expanded="false"
                                aria-controls="flush-collapseTen">
                                Apa saja layanan yang disediakan oleh BPR NUSAINTIM?
                            </button>
                        </h2>
                        <div id="flush-collapseTen" class="accordion-collapse collapse show"
                            aria-labelledby="flush-headingTen" data-bs-parent="#accordionFlushExample2">
                            <div class="accordion-body">BPR menyediakan berbagai layanan, antara lain: <br>

                                Deposito : Depostio Rate, Deposito Berjangka, <br>

                                Kredit : Kredit Modal Usaha, Kredit Multiguna, Kredit Investasi, Kredit Konsumtif, <br>

                                Tabungan : Tabungan Berjangka, Tabungan Qurban, Tabungan Arisan
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>

<!--=====FAQ AREA END=======-->
@endsection