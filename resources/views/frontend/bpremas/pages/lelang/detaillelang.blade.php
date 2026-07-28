@extends('frontend.bpremas.layout.main')

@section('content')
<style>
    .auction-detail {
        background: #f5f7fb;
        color: #172b4d;
    }

    .auction-detail__hero {
        background: linear-gradient(90deg, rgba(13, 22, 47, .94), rgba(13, 22, 47, .48)),
        url('{{ asset(' frontend/bpremas/1ramah.png') }}') center/cover;
        color: #fff;
        padding: 7rem 0 3rem;
    }

    .auction-detail__breadcrumb {
        align-items: center;
        color: rgba(255, 255, 255, .72);
        display: flex;
        flex-wrap: wrap;
        font-size: .85rem;
        gap: .5rem;
        margin-bottom: 1.25rem;
    }

    .auction-detail__breadcrumb a {
        color: #fff;
        text-decoration: none;
    }

    .auction-detail__title {
        color: #fff;
        font-size: clamp(1.8rem, 4vw, 2.8rem);
        font-weight: 700;
        line-height: 1.2;
        margin: 0;
        max-width: 52rem;
    }

    .auction-detail__content {
        padding: clamp(2.5rem, 5vw, 4.5rem) 0;
    }

    .auction-detail__article,
    .auction-detail__aside {
        background: #fff;
        border: 1px solid #e4eaf2;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(13, 22, 47, .06);
    }

    .auction-detail__article {
        overflow: hidden;
    }

    .auction-detail__image {
        aspect-ratio: 16 / 9;
        background: #e8edf4;
        display: block;
        object-fit: cover;
        width: 100%;
    }

    .auction-detail__body {
        padding: clamp(1.25rem, 3vw, 2.25rem);
    }

    .auction-detail__type {
        color: #0d4c8d;
        font-size: .78rem;
        font-weight: 700;
        letter-spacing: .06em;
        margin-bottom: .55rem;
        text-transform: uppercase;
    }

    .auction-detail__heading {
        color: #0d162f;
        font-size: clamp(1.45rem, 3vw, 2rem);
        font-weight: 700;
        line-height: 1.3;
        margin: 0 0 1.5rem;
    }

    .auction-detail__section {
        border-top: 1px solid #e8edf4;
        color: #374151;
        font-size: 1rem;
        line-height: 1.75;
        padding-top: 1.5rem;
    }

    .auction-detail__section+.auction-detail__section {
        margin-top: 1.75rem;
    }

    .auction-detail__section-title,
    .auction-detail__aside-title {
        color: #0d162f;
        font-size: 1.15rem;
        font-weight: 700;
        margin: 0 0 .85rem;
    }

    .auction-detail__richtext {
        overflow-wrap: anywhere;
    }

    .auction-detail__richtext img,
    .auction-detail__richtext iframe {
        height: auto;
        max-width: 100%;
    }

    .auction-detail__richtext table {
        display: block;
        max-width: 100%;
        overflow-x: auto;
    }

    .auction-detail__richtext a {
        color: #0d4c8d;
        text-decoration: underline;
    }

    .auction-detail__aside {
        padding: 1.25rem;
        position: sticky;
        top: 1.5rem;
    }

    .auction-detail__status {
        align-items: center;
        background: #e6f5ee;
        border-radius: 8px;
        color: #126c4b;
        display: inline-flex;
        font-size: .78rem;
        font-weight: 700;
        gap: .4rem;
        margin-bottom: 1.1rem;
        padding: .45rem .65rem;
    }

    .auction-detail__facts {
        margin: 0;
    }

    .auction-detail__fact {
        border-bottom: 1px solid #edf0f5;
        padding: .8rem 0;
    }

    .auction-detail__fact:first-child {
        padding-top: 0;
    }

    .auction-detail__fact:last-child {
        border-bottom: 0;
    }

    .auction-detail__fact dt {
        color: #64748b;
        font-size: .78rem;
        margin-bottom: .2rem;
    }

    .auction-detail__fact dd {
        color: #172b4d;
        font-size: .93rem;
        font-weight: 600;
        margin: 0;
        overflow-wrap: anywhere;
    }

    .auction-detail__price {
        color: #0d4c8d !important;
        font-size: 1.05rem !important;
    }

    .auction-detail__action {
        align-items: center;
        background: #0d4c8d;
        border-radius: 8px;
        color: #fff;
        display: flex;
        font-size: .92rem;
        font-weight: 700;
        gap: .5rem;
        justify-content: center;
        margin-top: 1.25rem;
        min-height: 48px;
        padding: .75rem 1rem;
        text-align: center;
        text-decoration: none;
        transition: background .2s ease;
    }

    .auction-detail__action:hover,
    .auction-detail__action:focus-visible {
        background: #0a396c;
        color: #fff;
        text-decoration: none;
    }

    .auction-detail__back {
        color: #0d4c8d;
        display: inline-flex;
        font-size: .9rem;
        font-weight: 700;
        gap: .45rem;
        margin-top: 1.5rem;
        text-decoration: none;
    }

    .auction-detail__back:hover {
        color: #0a396c;
        text-decoration: underline;
    }

    @media (max-width: 959px) {
        .auction-detail__aside {
            position: static;
        }
    }

    @media (max-width: 639px) {
        .auction-detail__hero {
            padding: 6rem 0 2.5rem;
        }

        .auction-detail__content {
            padding-top: 2rem;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .auction-detail__action {
            transition: none;
        }
    }
</style>

@php
$fallbackImage = asset('frontend/bpremas/1ramah.png');
$detailImage = $lelang->banner ?: ($lelang->thumbnail ?: null);
$detailImageUrl = $detailImage ? url('/recfil?display=true&rf=' . $detailImage) : $fallbackImage;
$auctionLink = filter_var($lelang->link, FILTER_VALIDATE_URL) ? $lelang->link : null;
$startDate = $lelang->mulai ? \Carbon\Carbon::parse($lelang->mulai)->translatedFormat('d M Y') : '-';
$endDate = $lelang->selesai ? \Carbon\Carbon::parse($lelang->selesai)->translatedFormat('d M Y') : '-';
$guaranteeDate = $lelang->batas_akhir_jaminan
? \Carbon\Carbon::parse($lelang->batas_akhir_jaminan)->translatedFormat('d M Y')
: '-';
@endphp

<main class="auction-detail">
    <header class="auction-detail__hero">
        <div class="uk-container">
            <nav class="auction-detail__breadcrumb" aria-label="Breadcrumb">
                <a href="{{ url('/lelang-jualaset') }}">Lelang Aset</a>
                <span aria-hidden="true">/</span>
                <span>Detail Lelang</span>
            </nav>
            <h1 class="auction-detail__title">{{ $lelang->title ?: 'Detail lelang aset' }}</h1>
        </div>
    </header>

    <section class="auction-detail__content">
        <div class="uk-container">
            <div class="uk-grid-large" data-uk-grid>
                <div class="uk-width-2-3@m">
                    <article class="auction-detail__article">
                        <img class="auction-detail__image" src="{{ $detailImageUrl }}"
                            alt="{{ $lelang->title ?: 'Aset lelang' }}">

                        <div class="auction-detail__body">
                            <div class="auction-detail__type">{{ $lelang->type == 1 ? 'Jual Aset' : 'Lelang' }}</div>
                            <h2 class="auction-detail__heading">{{ $lelang->title ?: 'Aset lelang' }}</h2>

                            <section class="auction-detail__section" aria-labelledby="description-title">
                                <h3 class="auction-detail__section-title" id="description-title">Uraian Aset</h3>
                                <div class="auction-detail__richtext">
                                    {!! $lelang->uraian ?: '<p>Uraian aset belum tersedia.</p>' !!}
                                </div>
                            </section>

                            <section class="auction-detail__section" aria-labelledby="attachment-title">
                                <h3 class="auction-detail__section-title" id="attachment-title">Lampiran</h3>
                                <div class="auction-detail__richtext">
                                    {!! $lelang->lampiran ?: '<p>Lampiran belum tersedia.</p>' !!}
                                </div>
                            </section>

                            <a class="auction-detail__back" href="{{ url('/lelang-jualaset') }}">
                                <span data-uk-icon="icon: arrow-left; ratio: .85" aria-hidden="true"></span>
                                Kembali ke daftar lelang
                            </a>
                        </div>
                    </article>
                </div>

                <aside class="uk-width-1-3@m">
                    <div class="auction-detail__aside">
                        <div class="auction-detail__status">
                            <span data-uk-icon="icon: check; ratio: .75" aria-hidden="true"></span>
                            Informasi lelang
                        </div>
                        <h2 class="auction-detail__aside-title">Ringkasan Lelang</h2>

                        <dl class="auction-detail__facts">
                            <div class="auction-detail__fact">
                                <dt>Nilai limit</dt>
                                <dd class="auction-detail__price">
                                    {{ $lelang->limit ? 'Rp ' . number_format($lelang->limit, 0, ',', '.') : 'Tidak tersedia' }}
                                </dd>
                            </div>
                            <div class="auction-detail__fact">
                                <dt>Uang jaminan</dt>
                                <dd>{{ $lelang->jaminan ? 'Rp ' . number_format($lelang->jaminan, 0, ',', '.') : 'Tidak tersedia' }}</dd>
                            </div>
                            <div class="auction-detail__fact">
                                <dt>Cara penawaran</dt>
                                <dd>{{ (int) $lelang->cara_penawaran === 1 ? 'Closed Bidding' : 'Open Bidding' }}</dd>
                            </div>
                            <div class="auction-detail__fact">
                                <dt>Mulai lelang</dt>
                                <dd>{{ $startDate }}</dd>
                            </div>
                            <div class="auction-detail__fact">
                                <dt>Batas akhir lelang</dt>
                                <dd>{{ $endDate }}</dd>
                            </div>
                            <div class="auction-detail__fact">
                                <dt>Batas akhir uang jaminan</dt>
                                <dd>{{ $guaranteeDate }}</dd>
                            </div>
                            <div class="auction-detail__fact">
                                <dt>Kode lot</dt>
                                <dd>{{ $lelang->kode_lot ?: '-' }}</dd>
                            </div>
                            <div class="auction-detail__fact">
                                <dt>Penyelenggara</dt>
                                <dd>{{ $lelang->penyelenggara ?: '-' }}</dd>
                            </div>
                            <div class="auction-detail__fact">
                                <dt>Lokasi</dt>
                                <dd>{{ collect([$lelang->kota, $lelang->provinsi])->filter()->implode(', ') ?: '-' }}</dd>
                            </div>
                        </dl>

                        @if ($auctionLink)
                        <a class="auction-detail__action" href="{{ $auctionLink }}" target="_blank" rel="noopener noreferrer">
                            Ikuti lelang
                            <span data-uk-icon="icon: arrow-up-right; ratio: .85" aria-hidden="true"></span>
                        </a>
                        @endif
                    </div>
                </aside>
            </div>
        </div>
    </section>
</main>
@endsection