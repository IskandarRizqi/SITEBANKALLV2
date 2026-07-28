@extends('frontend.bpremas.layout.main')

@section('content')
<style>
    .auction-page {
        background: #f5f7fb;
        color: #172b4d;
    }

    .auction-hero {
        align-items: center;
        background: linear-gradient(90deg, rgba(13, 22, 47, .92), rgba(13, 22, 47, .42)),
        url('{{ asset(' frontend/bpremas/1ramah.png') }}') center/cover;
        color: #fff;
        display: flex;
        min-height: 300px;
        padding: 7rem 0 4rem;
    }

    .auction-hero__eyebrow {
        color: #b9d5ff;
        font-size: .8rem;
        font-weight: 700;
        letter-spacing: .12em;
        margin-bottom: .75rem;
        text-transform: uppercase;
    }

    .auction-hero__title {
        color: #fff;
        font-size: clamp(2rem, 5vw, 3.25rem);
        font-weight: 700;
        line-height: 1.15;
        margin: 0 0 .85rem;
    }

    .auction-hero__description {
        color: rgba(255, 255, 255, .84);
        font-size: 1rem;
        line-height: 1.7;
        margin: 0;
        max-width: 36rem;
    }

    .auction-section {
        padding: clamp(3rem, 6vw, 5rem) 0;
    }

    .auction-section__heading {
        margin-bottom: 2rem;
    }

    .auction-section__title {
        color: #0d162f;
        font-size: clamp(1.55rem, 3vw, 2rem);
        font-weight: 700;
        margin: 0 0 .45rem;
    }

    .auction-section__lead {
        color: #64748b;
        margin: 0;
    }

    .auction-card {
        background: #fff;
        border: 1px solid #e4eaf2;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(13, 22, 47, .06);
        display: flex;
        flex-direction: column;
        height: 100%;
        overflow: hidden;
        transition: box-shadow .2s ease, transform .2s ease;
    }

    .auction-card:hover {
        box-shadow: 0 16px 32px rgba(13, 22, 47, .12);
        transform: translateY(-4px);
    }

    .auction-card__link {
        color: inherit;
        display: flex;
        flex: 1;
        flex-direction: column;
        text-decoration: none;
    }

    .auction-card__link:focus-visible,
    .auction-card__link:focus-visible .auction-card {
        outline: 3px solid #78aefb;
        outline-offset: 3px;
    }

    .auction-card__image-wrap {
        background: #e8edf4;
        position: relative;
    }

    .auction-card__image {
        aspect-ratio: 16 / 10;
        display: block;
        object-fit: cover;
        width: 100%;
    }

    .auction-card__status {
        background: #16845b;
        border-radius: 999px;
        color: #fff;
        font-size: .72rem;
        font-weight: 700;
        left: 1rem;
        letter-spacing: .04em;
        padding: .45rem .7rem;
        position: absolute;
        text-transform: uppercase;
        top: 1rem;
    }

    .auction-card__body {
        display: flex;
        flex: 1;
        flex-direction: column;
        padding: 1.25rem;
    }

    .auction-card__type {
        color: #526d96;
        font-size: .78rem;
        font-weight: 700;
        letter-spacing: .04em;
        margin-bottom: .5rem;
        text-transform: uppercase;
    }

    .auction-card__title {
        color: #0d162f;
        font-size: 1.12rem;
        font-weight: 700;
        line-height: 1.4;
        margin: 0 0 1rem;
    }

    .auction-card__meta {
        color: #64748b;
        display: flex;
        flex-wrap: wrap;
        font-size: .85rem;
        gap: .5rem 1rem;
        margin-bottom: 1.1rem;
    }

    .auction-card__meta span {
        align-items: center;
        display: inline-flex;
        gap: .35rem;
    }

    .auction-card__prices {
        border-bottom: 1px solid #edf0f5;
        border-top: 1px solid #edf0f5;
        display: grid;
        gap: 1rem;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        margin-bottom: 1rem;
        padding: .9rem 0;
    }

    .auction-card__label {
        color: #64748b;
        display: block;
        font-size: .75rem;
        margin-bottom: .25rem;
    }

    .auction-card__price {
        color: #0d162f;
        display: block;
        font-size: .9rem;
        font-weight: 700;
        line-height: 1.35;
        overflow-wrap: anywhere;
    }

    .auction-card__summary {
        color: #64748b;
        font-size: .88rem;
        line-height: 1.6;
        margin: 0 0 1.1rem;
    }

    .auction-card__footer {
        align-items: center;
        border-top: 1px solid #edf0f5;
        color: #0d4c8d;
        display: flex;
        font-size: .9rem;
        font-weight: 700;
        gap: .5rem;
        justify-content: space-between;
        margin-top: auto;
        padding-top: 1rem;
    }

    .auction-empty {
        background: #fff;
        border: 1px dashed #bdc9d8;
        border-radius: 16px;
        color: #64748b;
        padding: 3rem 1.5rem;
        text-align: center;
    }

    .auction-empty__icon {
        color: #0d4c8d;
        margin-bottom: 1rem;
    }

    @media (max-width: 639px) {
        .auction-hero {
            min-height: 260px;
            padding: 6rem 0 3rem;
        }

        .auction-card__body {
            padding: 1rem;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .auction-card {
            transition: none;
        }
    }
</style>

@php
$fallbackImage = asset('frontend/bpremas/1ramah.png');
@endphp

<main class="auction-page">
    <section class="auction-hero" aria-labelledby="auction-page-title">
        <div class="uk-container">
            <p class="auction-hero__eyebrow">Informasi aset</p>
            <h1 class="auction-hero__title" id="auction-page-title">Lelang Aset</h1>
            <p class="auction-hero__description">
                Temukan informasi aset lelang BPR Emas secara lengkap dan transparan.
            </p>
        </div>
    </section>

    <section class="auction-section" aria-labelledby="auction-list-title">
        <div class="uk-container">
            <div class="auction-section__heading">
                <h2 class="auction-section__title" id="auction-list-title">Lelang yang sedang berlangsung</h2>
                <p class="auction-section__lead">Pilih aset untuk melihat informasi dan ketentuan lelang secara detail.</p>
            </div>

            @if ($lelang->isNotEmpty())
            <div class="uk-child-width-1-2@s uk-child-width-1-3@l" data-uk-grid>
                @foreach ($lelang as $item)
                @php
                $image = $item->thumbnail ?: ($item->banner ?: $fallbackImage);
                $imageUrl = $image === $fallbackImage ? $fallbackImage : url('/recfil?display=true&rf=' . $image);
                $deadline = $item->batas_akhir_jaminan ?: $item->selesai;
                $summary = trim(strip_tags(html_entity_decode((string) $item->uraian)));
                @endphp
                <div>
                    <article class="auction-card">
                        <a class="auction-card__link" href="{{ route('detlelang', $item->id) }}">
                            <div class="auction-card__image-wrap">
                                <img class="auction-card__image" src="{{ $imageUrl }}"
                                    alt="{{ $item->title ?: 'Aset lelang' }}" loading="lazy">
                                <span class="auction-card__status">
                                    <span data-uk-icon="icon: check; ratio: .7" aria-hidden="true"></span>
                                    Aktif
                                </span>
                            </div>

                            <div class="auction-card__body">
                                <div class="auction-card__type">{{ $item->type_text ?: 'Lelang' }}</div>
                                <h3 class="auction-card__title">{{ $item->title ?: 'Aset lelang' }}</h3>

                                <div class="auction-card__meta">
                                    @if ($item->kota || $item->provinsi)
                                    <span>
                                        <span data-uk-icon="icon: location; ratio: .8" aria-hidden="true"></span>
                                        {{ $item->kota ?: $item->provinsi }}
                                    </span>
                                    @endif
                                    @if ($deadline)
                                    <span>
                                        <span data-uk-icon="icon: calendar; ratio: .8" aria-hidden="true"></span>
                                        Berakhir {{ \Carbon\Carbon::parse($deadline)->translatedFormat('d M Y') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="auction-card__prices">
                                    <div>
                                        <span class="auction-card__label">Nilai limit</span>
                                        <strong class="auction-card__price">
                                            {{ $item->limit ? 'Rp ' . number_format($item->limit, 0, ',', '.') : 'Tidak tersedia' }}
                                        </strong>
                                    </div>
                                    <div>
                                        <span class="auction-card__label">Uang jaminan</span>
                                        <strong class="auction-card__price">
                                            {{ $item->jaminan ? 'Rp ' . number_format($item->jaminan, 0, ',', '.') : 'Tidak tersedia' }}
                                        </strong>
                                    </div>
                                </div>

                                <p class="auction-card__summary">
                                    {{ $summary ? \Illuminate\Support\Str::limit($summary, 120) : 'Lihat detail aset, jadwal, dan ketentuan lelang.' }}
                                </p>

                                <div class="auction-card__footer">
                                    <span>Lihat detail lelang</span>
                                    <span data-uk-icon="icon: arrow-right; ratio: .9" aria-hidden="true"></span>
                                </div>
                            </div>
                        </a>
                    </article>
                </div>
                @endforeach
            </div>
            @else
            <div class="auction-empty" role="status">
                <div class="auction-empty__icon" data-uk-icon="icon: info; ratio: 1.6" aria-hidden="true"></div>
                <h2 class="uk-h4">Belum ada lelang aktif</h2>
                <p class="uk-margin-remove-bottom">Informasi lelang akan ditampilkan di halaman ini saat tersedia.</p>
            </div>
            @endif
        </div>
    </section>
</main>
@endsection