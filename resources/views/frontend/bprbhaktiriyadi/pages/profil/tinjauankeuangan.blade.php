@extends('frontend.bprbhaktiriyadi.layout.main')

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
            <div class="col-lg-8 m-auto">
                <div class="main-heading">
                    <h1 style="font-size: 35px">Tinjauan Keuangan</h1>
                    <span class="span"><img src="frontend/bprjas/assets/img/icons/span1.png" alt=""> <a
                            href="/">Home</a> <span class="arrow"><i class="fa-regular fa-angle-right"></i></span>
                        Tinjauan Keuangan <span class="arrow">
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>

<div style="background:#fff; border:1px solid #ddd; border-radius:6px; padding:20px; max-width:1000px; margin:auto;">

    <!-- Tabs -->
    <div style="display:flex; border-bottom:1px solid #ccc; margin-bottom:20px;">
        <button onclick="showChart('tabungan')" id="btn-tabungan"
            style="flex:1; padding:10px; border:none; border-bottom:3px solid #007bff; background:#fff; font-weight:600; cursor:pointer;">
            Tabungan
        </button>
        <button onclick="showChart('deposito')" id="btn-deposito"
            style="flex:1; padding:10px; border:none; border-bottom:3px solid transparent; background:#fff; font-weight:600; cursor:pointer;">
            Deposito
        </button>
        <button onclick="showChart('kredit')" id="btn-kredit"
            style="flex:1; padding:10px; border:none; border-bottom:3px solid transparent; background:#fff; font-weight:600; cursor:pointer;">
            Kredit
        </button>
        <button onclick="showChart('aset')" id="btn-aset"
            style="flex:1; padding:10px; border:none; border-bottom:3px solid transparent; background:#fff; font-weight:600; cursor:pointer;">
            Aset
        </button>
    </div>

    <!-- Chart Canvas -->
    <canvas id="chartCanvas" height="120"></canvas>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> {{-- Panggil dulu Chart.js --}}
<script>
    // Data dummy (contoh)
        const dataSets = {
            tabungan: {
                label: "Pertumbuhan Tabungan (Ribuan)",
                data: [1000, 2000, 5000, 10000, 25000, 40000, 60000, 80000, 95000],
                backgroundColor: "orange"
            },
            deposito: {
                label: "Pertumbuhan Deposito (Ribuan)",
                data: [2000, 3000, 7000, 15000, 30000, 45000, 70000, 85000, 90000],
                backgroundColor: "green"
            },
            kredit: {
                label: "Pertumbuhan Kredit (Ribuan)",
                data: [500, 1000, 3000, 7000, 20000, 35000, 50000, 75000, 92000],
                backgroundColor: "blue"
            },
            aset: {
                label: "Pertumbuhan Aset (Ribuan)",
                data: [1500, 2500, 6000, 12000, 28000, 42000, 68000, 82000, 98000],
                backgroundColor: "red"
            }
        };

        const ctx = document.getElementById('chartCanvas').getContext('2d');
        let chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018"],
                datasets: [dataSets.tabungan]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        function showChart(type) {
            chart.data.datasets = [dataSets[type]];
            chart.update();

            // update tombol aktif
            document.querySelectorAll("button").forEach(btn => {
                btn.style.borderBottom = "3px solid transparent";
            });
            document.getElementById("btn-" + type).style.borderBottom = "3px solid #007bff";
        }
</script>
@endsection