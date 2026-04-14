@extends('frontend.inc_fe.main')

@section('content')

<div class="content">
<div class="intro-y mt-10">
    <h2 style="font-size: 30px; margin-bottom: 50px;">
        <- CEK SALDO
    </h2>

</div>


    <div class="grid grid-cols-12 gap-6 mt-5">

        <!-- CARD 1 -->
        <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
            <a href="/cek-saldo">
                <div class="box p-8 zoom-in cursor-pointer">

                    <div class="flex justify-center mb-4">
                        <img src="/frontend/nusaintim/assets/img/user/ceksaldo.png"
                            class="w-20 h-20 object-contain">
                    </div>

                    <div class="text-center font-semibold text-lg">
                        Saldo Anda
                    </div>
                </div>
            </a>
        </div>

        <!-- CARD 2 -->
        <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
            <div class="box p-8 zoom-in cursor-pointer"
                 onclick="window.location.href=''">

                <div class="flex justify-center mb-4">
                    <img src="/frontend/nusaintim/assets/img/user/pengajuan.png"
                         class="w-20 h-20 object-contain">
                </div>

                <div class="text-center font-semibold text-lg">
                    Bonus
                </div>
            </div>
        </div>

        <!-- CARD 3 -->
        <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
            <div class="box p-8 zoom-in cursor-pointer"
                 onclick="window.location.href=''">

                <div class="flex justify-center mb-4">
                    <img src="/frontend/nusaintim/assets/img/user/pengaduan.png"
                         class="w-20 h-20 object-contain">
                </div>

                <div class="text-center font-semibold text-lg">
                    Invoice Pembayaran
                </div>
            </div>
        </div>
    

    </div>

     <div class="grid grid-cols-12 gap-6 mt-5">

        <div class="col-span-12 lg:col-span-6 mt-8">
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">Riwayat Pengeluaran</h2>
            </div>

            <div class="intro-y box p-5 mt-12 sm:mt-5">

                <!-- Angka Statik -->
                <div class="flex flex-col md:flex-row md:items-center">
                    <div class="flex items-center space-x-6">
                        <div>
                            <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">
                                12.450
                            </div>
                            <div class="mt-0.5 text-slate-500">Bulan Ini</div>
                        </div>

                        <div style="margin-left: 30px;">
                            <div class="text-slate-500 text-lg xl:text-xl font-medium">
                                145.230
                            </div>
                            <div class="mt-0.5 text-slate-500">Tahun Ini</div>
                        </div>
                    </div>

                    <!-- Dropdown tahun dihapus -->
                </div>

                <!-- Chart -->
                <div class="report-chart mt-8">
                    <div class="h-[275px]">
                        <canvas id="visitorLineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-span-12 lg:col-span-6 mt-8">
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">Ringkasan Saldo Bulan Ini</h2>
            </div>

            <div class="intro-y box p-5 mt-12 sm:mt-5">

                <!-- Angka Statik -->
                <div class="flex flex-col md:flex-row md:items-center">
                    <div class="flex items-center space-x-6">
                        <div>
                            <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">
                                12.450
                            </div>
                            <div class="mt-0.5 text-slate-500">Bulan Ini</div>
                        </div>

                        <div style="margin-left: 30px;">
                            <div class="text-slate-500 text-lg xl:text-xl font-medium">
                                145.230
                            </div>
                            <div class="mt-0.5 text-slate-500">Tahun Ini</div>
                        </div>
                    </div>

                    <!-- Dropdown tahun dihapus -->
                </div>

                <!-- Chart -->
                <div class="report-chart mt-8">
                    <div class="h-[275px]">
                        <canvas id="visitorLineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>



<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("visitorLineChart").getContext("2d");

    new Chart(ctx, {
        type: 'line',

        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],

            datasets: [{
                label: 'Jumlah Visitor',

                // DATA STATIK
                data: [1200, 1350, 1420, 1600, 1750, 1850, 1900, 2100, 2200, 2500, 2300, 2600],

                borderColor: '#22c55e',
                backgroundColor: 'rgba(34,197,94,0.15)',
                tension: 0.4,
                fill: true,
                borderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6,
                pointBackgroundColor: '#22c55e',
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },

            plugins: {
                legend: { display: false }
            },

            scales: {
                x: {
                    grid: { display: false }
                },

                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(200,200,200,0.15)' }
                }
            }
        }
    });
});
</script>
@endsection
