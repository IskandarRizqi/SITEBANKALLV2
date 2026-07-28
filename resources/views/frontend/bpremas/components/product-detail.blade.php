@php
$productImage = $product->banner ?: $product->thumbnail;
$typeLabels = [
'kredit' => 'Kredit',
'tabungan' => 'Tabungan',
'deposito' => 'Deposito',
];
$typeLabel = $typeLabels[$productType] ?? 'Produk';
@endphp

<style>
    .product-detail {
        background: #f5f7fb;
    }

    .product-detail__hero {
        background: linear-gradient(135deg, #0d162f, #234574);
        color: #fff;
    }

    .product-detail__article,
    .product-detail__sidebar {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(13, 22, 47, .08);
    }

    .product-detail__article {
        overflow: hidden;
    }

    .product-detail__banner {
        aspect-ratio: 16 / 7;
        background: #e8edf4;
        object-fit: cover;
        width: 100%;
    }

    .product-detail__body {
        padding: clamp(1.25rem, 3vw, 2.5rem);
    }

    .product-detail__meta {
        color: #64748b;
        font-size: .9rem;
        margin-bottom: 1rem;
    }

    .product-detail__title {
        color: #0d162f;
        font-size: clamp(1.6rem, 3vw, 2.4rem);
        font-weight: 700;
        line-height: 1.25;
        margin: 0 0 1.5rem;
    }

    .product-detail__content {
        color: #374151;
        font-size: 1rem;
        line-height: 1.8;
        overflow-wrap: anywhere;
    }

    .product-detail__content img,
    .product-detail__content video,
    .product-detail__content iframe {
        height: auto !important;
        max-width: 100% !important;
    }

    .product-detail__content table {
        display: block;
        max-width: 100%;
        overflow-x: auto;
    }

    .product-detail__content a {
        color: #234574;
        text-decoration: underline;
    }

    .product-detail__actions {
        display: flex;
        flex-wrap: wrap;
        gap: .75rem;
        margin-top: 2rem;
    }

    .product-detail__action {
        background: #0d162f;
        border-radius: 8px;
        color: #fff;
        display: inline-block;
        font-weight: 700;
        padding: .8rem 1.2rem;
    }

    .product-detail__action:hover {
        background: #234574;
        color: #fff;
        text-decoration: none;
    }

    .product-detail__action--secondary {
        background: #e8edf4;
        color: #0d162f;
    }

    .product-detail__sidebar {
        padding: 1.25rem;
    }

    .product-detail__sidebar-title {
        color: #0d162f;
        font-size: 1.15rem;
        font-weight: 700;
        margin: 0 0 1rem;
    }

    .product-detail__related {
        border-bottom: 1px solid #e5e7eb;
        color: #1f2937;
        display: block;
        padding: .85rem 0;
    }

    .product-detail__related:last-child {
        border-bottom: 0;
    }

    .product-detail__related:hover {
        color: #234574;
        text-decoration: none;
    }
</style>

<main class="product-detail">
    @php
    $headerImage = asset('frontend/bpremas/1ramah.png');
    @endphp

    <section class="uk-hidden@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
        style="background-image: url('{{ $headerImage }}'); height: 400px;">
        <div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>

    </section>

    <section class="uk-hidden@l uk-visible@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
        style="background-image: url('{{ $headerImage }}'); height: 400px;">
        <div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>

    </section>

    <section class="uk-visible@l uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
        style="background-image: url('{{ $headerImage }}'); height: 400px;">
        <div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>

    </section>

    <section class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-large" data-uk-grid>
                <div class="uk-width-2-3@m">
                    <article class="product-detail__article">
                        @if ($productImage)
                        <img class="product-detail__banner"
                            src="{{ url('/recfil?display=true&rf=' . $productImage) }}"
                            alt="{{ $product->title }}">
                        @endif
                        <div class="product-detail__body">
                            <div class="product-detail__meta">Informasi Produk {{ $typeLabel }}</div>
                            <h2 class="product-detail__title">{{ $product->title }}</h2>
                            <div class="product-detail__content">{!! $product->content !!}</div>
                            <div class="product-detail__actions">
                                <a class="product-detail__action" href="{{ url($applicationUrl) }}">Ajukan Sekarang</a>
                                <a class="product-detail__action product-detail__action--secondary" href="{{ url('/' . $productType) }}">Kembali ke {{ $typeLabel }}</a>
                            </div>
                        </div>
                    </article>
                </div>

                <aside class="uk-width-1-3@m">
                    <div class="product-detail__sidebar">
                        <h2 class="product-detail__sidebar-title">Produk {{ $typeLabel }} Lainnya</h2>
                        @forelse ($otherProducts ?? [] as $item)
                        <a class="product-detail__related" href="{{ url($detailBaseUrl . '/' . $item->id) }}">
                            {{ $item->title }}
                        </a>
                        @empty
                        <p class="uk-text-muted uk-margin-remove">Belum ada produk lainnya.</p>
                        @endforelse
                    </div>
                </aside>
            </div>
        </div>
    </section>
</main>