@extends('frontend.bpremas.layout.main')

@section('content')

<div id="sc-page-wrapper" class="uk-ef_newsletter">
    <div id="sc-page-content" data-uk-lightbox="animation: fade;toggle:a.lightbox-link">
        @php
        $headerImage = asset('frontend/bpremas/simulasi.png');
        @endphp

        <section class="uk-hidden@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
            style="background-image: url('{{ $headerImage }}'); height: 400px;">
            <div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
            <div class="uk-container">
                <div class="uk-position uk-position-left-center uk-width-4-5">
                    <h1 class="uk-h1">Simulasi</h1>
                </div>
            </div>
        </section>

        <section class="uk-hidden@l uk-visible@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
            style="background-image: url('{{ $headerImage }}'); height: 400px;">
            <div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
            <div class="uk-position uk-position-bottom-left uk-width-4-5">
                <div class="uk-container">
                    <h1 class="uk-h1">Simulasi</h1>
                </div>
            </div>
        </section>

        <section class="uk-visible@l uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
            style="background-image: url('{{ $headerImage }}'); height: 400px;">
            <div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
        </section>
        <section class="uk-section uk-section-muted">
            <div class="uk-container">
                <div class="uk-child-width-1-3@m uk-grid-match" data-uk-grid>
                    <div>
                        <a class="uk-card uk-card-default uk-card-body uk-card-hover uk-link-reset" href="{{ url('/simulasi-kredit') }}">
                            <h2 class="uk-card-title">Simulasi Kredit</h2>
                            <p>Hitung estimasi angsuran dan tenor pinjaman.</p>
                            <span class="uk-button uk-button-text">Mulai simulasi</span>
                        </a>
                    </div>
                    <div>
                        <a class="uk-card uk-card-default uk-card-body uk-card-hover uk-link-reset" href="{{ url('/simulasi-tabungan') }}">
                            <h2 class="uk-card-title">Simulasi Tabungan</h2>
                            <p>Hitung estimasi hasil tabungan Anda.</p>
                            <span class="uk-button uk-button-text">Mulai simulasi</span>
                        </a>
                    </div>
                    <div>
                        <a class="uk-card uk-card-default uk-card-body uk-card-hover uk-link-reset" href="{{ url('/simulasi-deposito') }}">
                            <h2 class="uk-card-title">Simulasi Deposito</h2>
                            <p>Hitung estimasi hasil deposito Anda.</p>
                            <span class="uk-button uk-button-text">Mulai simulasi</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection