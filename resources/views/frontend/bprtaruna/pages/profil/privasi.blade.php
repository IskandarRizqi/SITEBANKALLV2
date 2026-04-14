@extends('frontend.bprtaruna.layout.main')

@section('content')
    <style>
        .common-hero {
            background: url('{{ asset(env('GLOBAL_TOPPAGE')) }}') no-repeat center center;
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
                background: url('{{ asset(env('GLOBAL_TOPMOBILE')) }}') no-repeat center center;
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


    <body class="body tg-heading-subheading animation-style3">


        <!--=====progress END=======-->

        <div class="paginacontainer">

            <div class="progress-wrap">
                <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
                </svg>
            </div>

        </div>





        <!--=====HERO AREA START=======-->

        <div class="common-hero">
            <div class="container">
                <div class="row align-items-center text-center">
                    <div class="col-lg-8 m-auto">
                        <div class="main-heading">
                            <h1 style="font-size: 35px"> Kebijakan Privasi</h1>
                            <span class="span"><img src="frontend/bprjas/assets/img/icons/span1.png" alt=""> <a
                                    href="index.html">Home</a> <span class="arrow"><i
                                        class="fa-regular fa-angle-right"></i></span> Kebijakan Privasi <span
                                    class="arrow">
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--=====SERVICE DETAILS AREA START=======-->

        <div class="service-details-area-all sp">
            <div class="container">
                <div class="row">


                    <div class="col-lg-8 m-auto">
                        <div class="service-details-post">
                            <article>
                                <div class="details-post-area">
                                    <div class="image">
                                        <img src="frontend/bprjas/assets/img/profil/police.jpg" alt="">
                                    </div>
                                    <div class="space30"></div>
                                    <div class="heading1">
                                        <h4>Privasi </h4>
                                        <div class="space16"></div>
                                        <p style="text-align: justify;">
                                            PT. BPR Taruna Adidaya Santosa berkomitmen untuk menjaga privasi dan keamanan data nasabah
                                            serta pengunjung situs web kami. Dengan mengakses situs ini, Anda menyetujui
                                            praktik yang dijelaskan dalam kebijakan ini.
                                        </p>
                                        <p><strong>1.Informasi yang Dikumpulkan</strong></p>
                                        <p style="text-align: justify;">
                                            Kami dapat mengumpulkan informasi pribadi, seperti:
                                            <br>
                                            Nama, alamat, nomor telepon, email, Data transaksi atau keuangan jika Anda
                                            menggunakan fitur tertentu
                                        </p>
                                        <p><strong>2. Penggunaan Informasi</strong></p>
                                        <p style="text-align: justify">
                                            PT. BPR Taruna Adidaya Santosa mulai beroperasi pada tanggal 28 Februari 1998.
                                        </p>
                                        Informasi yang dikumpulkan digunakan untuk:
                                        <br>
                                        Memberikan layanan yang lebih baik, Menghubungi Anda jika diperlukan, Meningkatkan
                                        sistem keamanan dan kenyamanan pengguna

                                        <p><strong>3.Perlindungan Data</strong></p>
                                        <p style="text-align: justify">
                                            Kami menerapkan standar keamanan yang tinggi untuk menjaga data Anda dari akses
                                            tidak sah, perubahan, pengungkapan, atau penghancuran.
                                        </p>

                                        <p><strong>4.Cookies</strong></p>
                                        <p style="text-align: justify">
                                            Situs kami dapat menggunakan cookies untuk meningkatkan pengalaman pengguna.
                                            Anda bisa menonaktifkan cookies melalui pengaturan browser Anda.
                                        </p>

                                        <p><strong>5.Tautan ke Situs Lain</strong></p>
                                        <p style="text-align: justify">
                                            Situs kami mungkin memuat tautan ke situs pihak ketiga. Kami tidak bertanggung
                                            jawab atas kebijakan privasi atau konten situs tersebut.
                                        </p>

                                        <p><strong>6.Persetujuan</strong></p>
                                        <p style="text-align: justify">
                                            Dengan menggunakan situs ini, Anda menyetujui pengumpulan dan penggunaan data
                                            Anda sebagaimana dijelaskan dalam kebijakan ini.
                                        </p> <br>

                                        <h4>Kebijakan Penggunaan Situs Web </h4> <br>

                                        <p><strong>1. Hak Cipta & Merek Dagang</strong></p>
                                        <p style="text-align: justify">
                                            Seluruh konten di situs ini, termasuk teks, gambar, logo, dan desain, dilindungi
                                            oleh hukum dan merupakan milik. BPR Taruna Adidaya Santosa, kecuali dinyatakan lain.
                                        </p>

                                        <p><strong>2. Batasan Penggunaan</strong></p>
                                        <p style="text-align: justify">
                                            Pengunjung tidak diperbolehkan: Mengubah atau mendistribusikan konten tanpa izin
                                            tertulis Menggunakan konten untuk tujuan komersial tanpa persetujuan
                                        </p>

                                        <p><strong>3. Ketentuan Layanan</strong></p>
                                        <p style="text-align: justify">
                                            Kami berhak mengubah informasi dan fitur di situs kapan saja Kami tidak
                                            bertanggung jawab atas gangguan layanan karena masalah teknis
                                        </p>

                                        <p><strong>4. Keamanan Akses</strong></p>
                                        <p style="text-align: justify">
                                            Anda bertanggung jawab menjaga kerahasiaan informasi login (jika berlaku)
                                            Dilarang melakukan tindakan peretasan atau penyalahgunaan sistem
                                        </p>

                                        <p><strong>6.Persetujuan</strong></p>
                                        <p style="text-align: justify">
                                            Dengan menggunakan situs ini, Anda menyetujui pengumpulan dan penggunaan data
                                            Anda sebagaimana dijelaskan dalam kebijakan ini.
                                        </p>
                                        <br>
                                        <p>

                                            Jika Anda memiliki pertanyaan terkait kebijakan ini, silakan hubungi kami di:
                                        <p>
                                            📧 Email: bprnusaintim@yahoo.com <br>
                                            📞 Telp : (0967) 524482
                                        </p>

                                        </p>
                                    </div>
                                </div>
                            </article>


                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--=====CTA AREA START=======-->



        <!--=====CTA AREA END=======-->

    </body>
@endsection
