@extends('frontend.inc_fe.main')

@section('content')

<div class="content">
<div class="intro-y mt-10">
    <h2 style="font-size: 30px; margin-bottom: 50px;">
        Selamat Datang di Dashboard Anda
    </h2>

    <h2 class="text-lg font-medium">
        Fitur Layanan
    </h2>
</div>


    <div class="grid grid-cols-12 gap-6 mt-5">

        <!-- CARD 1 -->
        {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
            <a href="/cek-saldo">
                <div class="box p-8 zoom-in cursor-pointer">

                    <div class="flex justify-center mb-4">
                        <img src="/frontend/nusaintim/assets/img/user/ceksaldo.png"
                            class="w-20 h-20 object-contain">
                    </div>

                    <div class="text-center font-semibold text-lg">
                        Cek Saldo
                    </div>
                </div>
            </a>
        </div> --}}
       
        <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
            <a href="javascript:void(0)" onclick="comingSoon()">
                <div class="box p-8 zoom-in cursor-pointer transition duration-300 hover:shadow-lg">
                    <!-- Gambar -->
                    <div class="flex justify-center mb-4">
                        <img src="/frontend/nusaintim/assets/img/user/ceksaldo.png" class="w-20 h-20 object-contain" alt="Cek Saldo">
                    </div>
                    <!-- Judul -->
                    <div class="text-center font-semibold text-lg">
                        Cek Saldo
                    </div>
                </div>
            </a>
        </div>


        <!-- CARD 2 -->
        {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
            <div class="box p-8 zoom-in cursor-pointer"
                 onclick="window.location.href=''">

                <div class="flex justify-center mb-4">
                    <img src="/frontend/nusaintim/assets/img/user/pengajuan.png"
                         class="w-20 h-20 object-contain">
                </div>

                <div class="text-center font-semibold text-lg">
                    Pengajuan
                </div>
            </div>
        </div> --}}
        <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
            <a href="javascript:void(0)" onclick="comingSoon()">
                <div class="box p-8 zoom-in cursor-pointer transition duration-300 hover:shadow-lg">
                    <!-- Gambar -->
                    <div class="flex justify-center mb-4">
                        <img src="/frontend/nusaintim/assets/img/user/pengajuan.png" class="w-20 h-20 object-contain" alt="Cek Saldo">
                    </div>
                    <!-- Judul -->
                    <div class="text-center font-semibold text-lg">
                        Pengajuan
                    </div>
                </div>
            </a>
        </div>

        <!-- CARD 3 -->
        <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
            <a href="/lacak-pengaduan">
                <div class="box p-8 zoom-in cursor-pointer">

                    <div class="flex justify-center mb-4">
                        <img src="/frontend/nusaintim/assets/img/user/pengaduan.png"
                            class="w-20 h-20 object-contain">
                    </div>

                    <div class="text-center font-semibold text-lg">
                        Pengaduan
                    </div>
                </div>
            </a>
        </div>
       

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function comingSoon() {
    Swal.fire({
        title: 'Coming Soon!',
        text: 'Fitur ini sedang dalam pengembangan.',
        icon: 'info',
        // confirmButtonText: 'OK',
        confirmButtonColor: '#3b82f6', // biru Tailwind
        background: '#f0f9ff', // latar belakang lembut
        timer: 3000,
        timerProgressBar: true
    });
}
</script>

@endsection
