@extends('frontend.bprman.layout.main')

<style>
        .common-heros {
            background: url('{{ asset(env('GLOBAL_BANERTOPPROFIL')) }}') no-repeat center center;
            background-size: contain;
            height: 170px;
            max-width: 1120px;
            margin: 90px auto 0 auto;
            border-radius: 15px;
        }


        /* Versi Mobile */
        @media (max-width: 768px) {
            .common-heros {
                background: url('{{ asset(env('GLOBAL_TOPMOBILE')) }}') no-repeat center center;
                background-size: 100% 50%;
                /* isi penuh TANPA ruang kosong */
                height: 180px;
                margin-top: 30px;
                /* tinggi tetap */
                padding: 0;
                object-fit: contain
            }

        }

        .section-header {
            font-weight: 600;
            padding: 1.5rem;
            color: #1f2937;
        }

        .section-content {
            padding: 0 1.5rem 1.5rem;
        }

        .border-line {
            height: 4px;
            width: 100%;
            background-color: #e5e7eb;
        }

        .blue-line {
            width: 8px;
            height: 100%;
            background-color: #3b82f6;
            margin-right: 1rem;
            border-radius: 4px;
        }
        
        .subjudul {
            text-align: center;
            margin-bottom: 0px;
            padding-top: 20px;
        }
    </style>

@section('content')
        <body class="body tg-heading-subheading animation-style3">
            
            <div class="common-heros">
        </div>
        
        <h2 class="subjudul">Visi Misi</h2>

            <div
                style="font-family:'Poppins', sans-serif; display: flex; justify-content: center; min-height: 100vh; padding: 20px; margin: 0;">
                <div style="width: 100%; max-width: 1120px;">

                    <div
                        style=" background: linear-gradient(45deg, #0a1c92, #a9a8ac); color: white; margin-top: 20px; padding: 25px 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                        <div
                            style="display: flex; align-items: center; margin-bottom: 15px; font-size: 28px; font-weight: bold;">
                            <img src="frontend/bprrudo/assets/img/icons/misi.png" alt="" style="height: 40px">
                            <span style="margin-left: 10px">Visi</span>
                        </div>
                        <div style="list-style: none; padding-left: 47px;">

                            <div
                                style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">

                                Menjadi BPR yang memberikan kepuasan dan keuntungan bagi pemangku kepentingan dengan berperan aktif meningkatkan kesejahteraan masyarakat.
                            </div>



                        </div>
                    </div>

                    <div
                        style=" background: linear-gradient(45deg, #0a1c92, #aca8a8); color: white; margin-top: 20px; padding: 25px 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                        <div
                            style="display: flex; align-items: center; margin-bottom: 15px; font-size: 28px; font-weight: bold;">
                            <img src="frontend/bprrudo/assets/img/icons/misi.png" alt="" style="height: 40px">
                            <span style="margin-left: 10px">Misi</span>
                        </div>
                        <div style="list-style: none; padding-left: 47px;">

                            <div
                                style="margin-bottom: 12px; font-size: 18px; line-height: 1.5; position: relative; padding-left: 25px;">
                                <ul>
                                    <li>
                                        Menyediakan Produk dan layanan keuangan sesuai kebutuhan masyarakat 
                                    </li>
                                    <li>
                                        Meningkatkan layanan berbasis teknologi dengan cepat, tepat, dan mudah. 
                                    </li>
                                    <li>
                                       Meningkatkan kualitas SDM dalam mengelola Bank yang berkelanjutan dengan tata kelola, manajemen resiko, dan anti fraud.  
                                    </li>
                                    <li>
                                        Meningkatkan modal untuk menambah akselerasi pengembangan BPR
                                    </li>
                                </ul>
                            </div>



                        </div>
                    </div>
                </div>
        </body>
    </div>
@endsection
