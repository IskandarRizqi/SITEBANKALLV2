@extends('frontend.bprkeduarthasetia.layout.main')

@section('content')
    <style>
        .common-hero {
            background: url('{{ asset(env('GLOBAL_TOPPAGE')) }}') no-repeat center center;
            background-size: cover;
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

        .event-content {
            max-width: 100%;
            overflow-x: auto;
            /* biar kalau ada tabel / gambar besar, muncul scroll horizontal */
            word-wrap: break-word;
            /* biar teks panjang gak keluar area */
            line-height: 1.6;
            /* biar enak dibaca */
            text-align: justify;
            font-family: 'Archivo', sans-serif;
        }
    </style>

    <body class="body tg-heading-subheading animation-style3">


        <!--=====HERO AREA START=======-->

        <div class="common-hero">
            <div class="container">
                <div class="row align-items-center text-center">
                    <div class="col-lg-8 m-auto">
                        <div class="main-heading">
                            <h1 style="font-size:35px; color: #fff;">SEJARAH</h1>
                            <span class="span">
                                <a href="index.html">Beranda</a> <span class="arrow"><i class="fa-regular fa-angle-right"></i></span> Profil <span class="arrow"><i class="fa-regular fa-angle-right"></i></span> Sejarah <span class="arrow">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>



        <!--=====SERVICE DETAILS AREA START=======-->

        <div class="service-details-area-all sp" style="  padding-top: 0px;">
            <div class="container">
                <div class="row">
                <div class="col-lg-4" >
                <div class="sidebar-box-area sidebar-bg mb-40">
                            <h3>Profil Terkait</h3>
                            <ul class="features-list">
                                <li><a href="sejarah">Sejarah <span><i class="fa-regular fa-angle-right"></i></span></a></li>
                                <li><a href="pengurus">Pengurus <span><i class="fa-regular fa-angle-right"></i></span></a></li>
                                <li><a href="organisasi">Struktur Organisasi<span><i class="fa-regular fa-angle-right"></i></span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Kanan: Text -->
                    <div class="col-lg-8 col-md-12 col-12 ">
                        <div class="service-details-post">
                          @if($sejarah)
                            <article>
                                <div class="details-post-area">
                                    <div class="image" style="text-align:center;">
                            <img src="/recfil?display=true&rf={{ $sejarah->banner }}" alt="{{ $sejarah->title }}"
                                style="border-radius:8px; height: 550px; width: 500px;">
                        </div>
                        @endif
                        <div class="space30"></div>
                                    <div class="heading1">
                                        <div class="event-content">
                                            <p>
                                                PT Bank Perkreditan Rakyat Kedu Arthasetia didirikan di Kecamatan Kedu, Kabupaten Temanggung berdasarkan Akta Notaris No. 2 dihadapan Notaris Hiasinta Yanti Susanti Tan, SH, MH yang berkedudukan di Magelang tertanggal 04 April 1995. PT Bank Perkreditan Rakyat Kedu Arthasetia telah memperoleh izin prinsip dari Menteri Keuangan No. Kep-453/KM.17/1996 tanggal 04 Desember 1996, serta telah diumumkan dalam lembar Berita Negara tertanggal 23 Juli 1996, No. 13 tambahan 3587. Perubahan Seluruh Anggaran Dasar dimuat dalam Akta No. 21 dihadapat Notaris Hiasinta Yanti Susanti Tan, SH, MH tertanggal 27 Maret 2008 yang telah mendapatakan persetujuan dari Mentri Hukum San Hak Asasi Manusia Republik Indonesia No. AHU-52084.AH.01.02 tahun 2008 dengan Surat Keputusan tertanggal 19 Agustus 2008 dan telah diumumkan dalam Berita Negara Republik Idonesia tertanggal 14 Juli 2019 No. 56, tambahan no. 18429/2009.
                                            </p>
                                            <br>
                                            <p>
                                                PT BPR Kedu Arthasetia berdomisili di Jalan Raya No. 89 Kedu Kabupaten Temanggung didirikan pada tanggal 4 April 1995, sesuai dengan akta Notaris No. 2, yang dibuat dihadapan Notaris Hiasinta Yanti Susanti Tan, SH, yang Anggaran Dasar telah mendapat pengesahan Menteri Kehakiman Republik Indonesia pada tanggal 23 Juli 1996, No. C2 -8122.HT.01.01.Th96 dan telah diumumkan dalam Berita Acara Republik Indonesia tertanggal 14 Nopember 1997, No.91,Tambahan No. 5388/1997 dan perubahan Anggaran Dasar yang terakhir telah mendapat pengesahan dari Menteri Hukum dan Hak Asasi Manusia Republik Indonesia berdasarkan surat keputusan tertanggal 24 Agustus 2004 No. C-21410 HT.01.04.Th.2004 yang kemudian dirubah lagi dengan Akta tertanggal 06 April 2007. Perubahan Anggaran Dasar yang terakhir dengan Akta Notaris Hiasinta Yanti Susanti Tan, SH tertanggal 03 Maret 2014 No. 01.
                                            </p>
                                            <br>
                                            <p>
                                                Seiring dengan kemajuan dan perkembangan dari PT BPR Kedu Arthasetia dan atas ijin Bank Indonesia pada tanggal 11 September 2002 resmi berdiri kantor pelayanan kas PT BPR Kedu Arthasetia yang pertama yang beralamat di Ruko Pasar Ngadirejo dan pada tanggal 1 Februari 2008   kantor pelayanan kas Ngadirejo pindah alamat ke Jl. Raya Ngadirejo No. 201 Ngadirejo Temanggung. Pemindahan alamat Kantor Kas Ngadirejo yang semula beralamat di Jl. Raya Ngadirejo No. 201 Kecamatan Ngadirejo Kabupaten Temanggung ke Dusun Sindoro Asri RT.04 RW 07 Medari Kec. Ngadirejo Kabupaten Temanggung di karenakan masa sewa Kantor Kas yang lama telah habis. Pemindahan alamat Kantor Kas ini telah di catat dalam administrasi pengawasan Bank Indonesia dengan No surat : 13/131/DKBU/IDAd/Sm tertanggal 28 Januari 2011. Untuk Kantor Kas Ngadirejo pada Bulan Maret 2016 telah memperpanjang sewa Kantor Kas selama 10 tahun dengan alamat yang sama di Dusun Sindoro Asri RT.04 RW.07 Medari Kec. Ngadirejo Kabupaten Temanggung.
                                            </p>
                                            <br>
                                            <p>
                                                PT. BPR Kedu Arthasetia kembali atas ijin Bank Indonesia pada tanggal 15 September 2003 membuka Kantor Pelayanan Kas yang kedua yang beralamat di Jl. Suyoto No 6 Temanggung. Pemindahan Kantor Kas Temanggung dari Jl. Suyoto No 6 Kabupaten Temanggung ke Jl. Suyoto No. 4A Kabupaten Temanggung di karenakan Kantor kas pelayanan yang lama akan di renovasi sehingga pihak Bank menyewa Kantor kas baru di sebelah kantor kas yang direnovasi. Pelaksanaan pemindahan alamat Kantor Kas ini telah di catat dalam administrasi pengawasan Bank Indonesia dengan Nomor 13/1042/DKBU/IDAd/Sm tertanggal 12 Juli 2011. Kemudian pada tanggal 1 Mei 2013 kembali Kantor Kas Temanggung pindah alamat dari Jl. Suyoto No.4A Temanggung ke Jl. Suyoto No. 6 Temanggung dan telah mendapat persetujuan dari Bank Indonesia dengan No Surat : 15/646/DKBU/IDAd/Sm tertanggal 17 April 2013.
                                            </p>
                                        </div>
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
