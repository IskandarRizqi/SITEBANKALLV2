@extends('frontend.bprdatagita.layout.main')

@section('content')
    <style>
        .justify-text {
            text-align: justify;
        }
    </style>
    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax"
        style="background-image: url(frontend/bprdatagita/img/profil/top.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Profile</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-area section-padding-100-0">
        <div class="container">
           
            <div
                style="font-family:'Poppins', sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 10px; margin: 0;">
                <div style="width: 100%; max-width: 1120px;">

                    <div
                        style="background-color: #19178e; color: white; padding: 25px 30px; position: relative; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                        <div
                            style="display: flex; align-items: center; margin-bottom: 15px; font-size: 28px; font-weight: bold;">
                            <img src="frontend/bprrudo/assets/img/icons/visi.png" alt="" style="height: 40px">
                            <span style="margin-left: 10px">Visi</span>
                        </div>
                        <div style="font-size: 20px; line-height: 1.5; padding-left: 47px;">
                            Menjadi Bank Perkreditan Rakyat yang kuat, aman dan terpercaya, serta dapat menjalankan fungsi
                            dan perannya menyediakan jasa perbankan
                            sesuai peraturan serta dapat memenuhi kebutuhan para mitra usaha dengan pelayanan yang prima.

                            <br><br>

                            <strong style="display:block; text-align:center;">
                                "Kuat, aman dan terpercaya dengan pelayanan prima"
                            </strong>
                        </div>
                    </div>

                    <!-- Misi Section -->
                    <div
                        style="background-color: #1a902a; color: white; padding: 25px 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                        <div
                            style="display: flex; align-items: center; margin-bottom: 15px; font-size: 28px; font-weight: bold;">
                            <img src="frontend/bprrudo/assets/img/icons/misi.png" alt="" style="height: 40px">
                            <span style="margin-left: 10px">Misi</span>
                        </div>
                        <div style="font-size: 20px; line-height: 1.5; padding-left: 47px;">
                            Menjadikan BPR sebagai suatu perusahaan yang memiliki struktur keuangan yang sehat agar dapat menunjang
                            pelaksanaan misinya dengan baik dan menjaga serta menjamin kepentingan pihak-pihak yang berkepentingan
                            (stakeholder), Termasuk menjadikan perusahaan ini tempat bekerja yang aman dan nyaman bagi segenap karyawan dan keluarganya

                            <br><br>

                            <strong style="display:block; text-align:center;">
                                "Kami hadir menjadi mitra dan menumbuh kembangkan usaha anda"
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ###### -->
@endsection
