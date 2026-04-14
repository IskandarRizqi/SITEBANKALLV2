@extends('layouts.app')
<style>
    .password-eye {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='gray' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'/%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 14px center;
        background-size: 18px;
        cursor: pointer;
    }
</style>

@section('content')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('admin/dist/images/logo.svg') }}">
                    <span class="text-white text-lg ml-3"> {{ env('APP_NAME') }} </span>
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                        src="{{ asset('admin/dist/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        {{-- Selamat Datang Kembali! --}}
                        <br>
                        {{-- Silakan masuk ke akun Anda. --}}
                    </div>
                    {{-- <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400"> Kelola semua layanan perbankan Anda dalam satu tempat.</div> --}}
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Sign In
                    </h2>
                    <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your
                        account. Manage all your site</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="intro-x mt-8">
                            <input id="validation-form-1" type="email"
                                class="intro-x login__input form-control @error('email') is-invalid @enderror py-3 px-4 block"
                                placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                name="email">
                            @error('email')
                                <div class="mt-2" style="color: red !important;">{{ $message }}</div>
                            @enderror
                            {{-- <input type="password" id="password" class="intro-x login__input form-control @error('password') is-invalid @enderror py-3 px-4 block mt-4" placeholder="Password" name="password" required autocomplete="current-password"> --}}
                            <input type="password" id="password"
                                class="intro-x login__input form-control @error('password') is-invalid @enderror py-3 px-4 pr-12 block mt-4 password-eye"
                                placeholder="Password" name="password" required autocomplete="current-password">

                            @error('password')
                                <div class="mt-2" style="color: red !important;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input id="remember-me" type="checkbox" class="form-check-input border mr-2"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                            </div>
                            <!-- <a href="">Forgot Password?</a> -->
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit"
                                class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>

                        </div>
                    </form>

                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
    <script>
        document.getElementById('password').addEventListener('click', function(e) {
            if (e.offsetX > this.offsetWidth - 40) {
                this.type = this.type === 'password' ? 'text' : 'password';
            }
        });
    </script>
@endsection
