@extends('frontend.bprsms.layout.main')

@section('content')

<div class="breadcumb-area style2 bg-smoke4">
    <div class="breadcumb-wrapper" data-bg-src="frontend/bprsms/assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Frequently Asked Question ( FAQ )</h1>
                <ul class="breadcumb-menu">
                    <li><a href="/">Profil</a></li>
                    <li>Frequently Asked Question ( FAQ )</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--=====FAQ AREA START=======-->

<div class="faq3 sp text-center">
    <div class="container">
        <div class="space40"></div>
        <div class="row justify-content-center">
            <!-- Kolom Kiri -->
            <div class="col-lg-6 d-flex justify-content-center">
                <div class="accordion accordion1 accordion-flush w-100" id="accordionFlushExample"
                    style="text-align: left;">
                    <div class="accordion-item active" data-aos="fade-up" data-aos-duration="700">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Apa itu BPR JAS?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                BPR JAS adalah lembaga keuangan bank yang melayani masyarakat dalam hal simpanan dan
                                pembiayaan, dengan fokus pada sektor usaha mikro, kecil, dan menengah (UMKM), serta
                                individu.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-duration="1200">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                Apakah BPR JAS menerima simpanan seperti bank umum?
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Ya. BPR JAS menerima simpanan dalam bentuk tabungan dan deposito
                                berjangka, dan juga dijamin oleh Lembaga Penjamin Simpanan (LPS) sesuai dengan ketentuan
                                yang berlaku.</div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-duration="900">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Apakah dana saya aman di BPR JAS?
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Ya, dana nasabah di BPR JAS dijamin oleh LPS (Lembaga Penjamin
                                Simpanan) hingga jumlah tertentu, sesuai dengan syarat dan ketentuan yang berlaku.</div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFour" aria-expanded="false"
                                aria-controls="flush-collapseFour">
                                Siapa saja yang bisa mengajukan kredit di BPR JAS?
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
                                Apa keunggulan meminjam di BPR JAS dibandingkan BPR Lain?
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>Proses cepat dan mudah</p>
                                <p>Syarat dokumen lebih ringan</p>
                                <p>Pelayanan lebih personal</p>
                                <p>Didukung oleh tim yang memahami kebutuhan lokal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="col-lg-6 d-flex justify-content-center">
                <div class="accordion accordion2 accordion-flush w-100" id="accordionFlushExample2"
                    style="text-align: left;">
                    <div class="accordion-item" data-aos="fade-up" data-aos-duration="1100">
                        <h2 class="accordion-header" id="flush-headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseSix" aria-expanded="false"
                                aria-controls="flush-collapseSix">
                                Apa syarat untuk membuka rekening tabungan di BPR JAS?
                            </button>
                        </h2>
                        <div id="flush-collapseSix" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample2">
                            <div class="accordion-body">
                                <p>Fotokopi KTP atau identitas sah lainnya,</p>
                                <p>Mengisi formulir pembukaan rekening,</p>
                                <p>Setoran awal sesuai jenis tabungan</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-duration="900">
                        <h2 class="accordion-header" id="flush-headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseSeven" aria-expanded="false"
                                aria-controls="flush-collapseSeven">
                                Apakah BPR JAS menyediakan layanan digital?
                            </button>
                        </h2>
                        <div id="flush-collapseSeven" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample2">
                            <div class="accordion-body">BPR JAS kini menyediakan layanan mobile banking, internet
                                banking, atau SMS banking, Untuk Mempermudah Nasabah</div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-duration="1200">
                        <h2 class="accordion-header" id="flush-headingEight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseEight" aria-expanded="false"
                                aria-controls="flush-collapseEight">
                                Bagaimana cara mengajukan kredit di BPR JAS?
                            </button>
                        </h2>
                        <div id="flush-collapseEight" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample2">
                            <div class="accordion-body">
                                <p>Mengunjungi kantor cabang BPR terdekat,</p>
                                <p>Membawa dokumen yang diperlukan (KTP, KK, slip gaji, dll.),</p>
                                <p>Mengisi formulir permohonan,</p>
                                <p>Menunggu proses analisis dan persetujuan kredit</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-duration="900">
                        <h2 class="accordion-header" id="flush-headingNine">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseNine" aria-expanded="false"
                                aria-controls="flush-collapseNine">
                                Dimana saya bisa melihat informasi suku bunga dan produk BPR JAS?
                            </button>
                        </h2>
                        <div id="flush-collapseNine" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample2">
                            <div class="accordion-body">
                                <p>Informasi dapat dilihat di:</p>
                                <p>Website resmi BPR JAS,</p>
                                <p>Kantor cabang terdekat BPT JAS,</p>
                                <p>Akun media sosial resmi BPR JAS</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item active" data-aos="fade-up" data-aos-duration="1200">
                        <h2 class="accordion-header" id="flush-headingTen">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTen" aria-expanded="false"
                                aria-controls="flush-collapseTen">
                                Apa saja layanan yang disediakan oleh BPR JAS?
                            </button>
                        </h2>
                        <div id="flush-collapseTen" class="accordion-collapse collapse show"
                            aria-labelledby="flush-headingTen" data-bs-parent="#accordionFlushExample2">
                            <div class="accordion-body">
                                <p>BPR menyediakan berbagai layanan, antara lain:</p>
                                <p><strong>Deposito:</strong> Depostio Rate, Deposito Berjangka</p>
                                <p><strong>Kredit:</strong> Kredit Modal Usaha, Kredit Multiguna, Kredit Investasi,
                                    Kredit Konsumtif</p>
                                <p><strong>Tabungan:</strong> Tabungan Berjangka, Tabungan Qurban, Tabungan Arisan</p>
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