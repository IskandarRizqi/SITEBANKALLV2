@extends('frontend.bpremas.layout.main')

@section('content')
@php
$date = $berita->tanggal_tampil
? \Carbon\Carbon::parse($berita->tanggal_tampil)->translatedFormat('d F Y')
: 'Tanggal belum tersedia';
$thumbnail = $berita->banner ?: $berita->thumbnail;
@endphp

<style>
	.detail-page {
		background: #f5f7fb;
	}

	.detail-page__hero {
		background: linear-gradient(135deg, #0d162f, #234574);
		color: #fff;
	}

	.detail-page__article,
	.detail-page__sidebar {
		background: #fff;
		border-radius: 16px;
		box-shadow: 0 10px 30px rgba(13, 22, 47, .08);
	}

	.detail-page__article {
		overflow: hidden;
	}

	.detail-page__banner {
		aspect-ratio: 16 / 8;
		background: #e8edf4;
		object-fit: cover;
		width: 100%;
	}

	.detail-page__body {
		padding: clamp(1.25rem, 3vw, 2.5rem);
	}

	.detail-page__meta {
		color: #64748b;
		display: flex;
		flex-wrap: wrap;
		font-size: .875rem;
		gap: .75rem 1.5rem;
		margin-bottom: 1rem;
	}

	.detail-page__title {
		color: #0d162f;
		font-size: clamp(1.6rem, 3vw, 2.4rem);
		font-weight: 700;
		line-height: 1.25;
		margin: 0 0 1.5rem;
	}

	.detail-page__content {
		color: #374151;
		font-size: 1rem;
		line-height: 1.8;
		overflow-wrap: anywhere;
	}

	.detail-page__content img,
	.detail-page__content video,
	.detail-page__content iframe {
		height: auto !important;
		max-width: 100% !important;
	}

	.detail-page__content table {
		display: block;
		max-width: 100%;
		overflow-x: auto;
	}

	.detail-page__content a {
		color: #234574;
		text-decoration: underline;
	}

	.detail-page__sidebar {
		padding: 1.25rem;
	}

	.detail-page__sidebar-title {
		color: #0d162f;
		font-size: 1.15rem;
		font-weight: 700;
		margin: 0 0 1rem;
	}

	.detail-page__related {
		border-bottom: 1px solid #e5e7eb;
		display: block;
		padding: .85rem 0;
	}

	.detail-page__related:last-child {
		border-bottom: 0;
	}

	.detail-page__related-date {
		color: #64748b;
		display: block;
		font-size: .75rem;
		margin-bottom: .25rem;
	}

	.detail-page__related-title {
		color: #1f2937;
		font-size: .9rem;
		font-weight: 600;
		line-height: 1.45;
	}

	.detail-page__related:hover {
		text-decoration: none;
	}
</style>

<main class="detail-page">
	@php
	$headerImage = asset('frontend/bpremas/nws1.png');
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
					<article class="detail-page__article">
						@if ($thumbnail)
						<img class="detail-page__banner" src="{{ url('/recfil?display=true&rf=' . $thumbnail) }}"
							alt="{{ $berita->title }}">
						@endif
						<div class="detail-page__body">
							<div class="detail-page__meta">
								<span>{{ $berita->kategori ?: 'Berita' }}</span>
								<time datetime="{{ $berita->tanggal_tampil }}">{{ $date }}</time>
							</div>
							<h2 class="detail-page__title">{{ $berita->title }}</h2>
							<div class="detail-page__content">{!! $berita->content !!}</div>
						</div>
					</article>
				</div>

				<aside class="uk-width-1-3@m">
					<div class="detail-page__sidebar">
						<h2 class="detail-page__sidebar-title">Berita Lainnya</h2>
						@forelse ($other_berita ?? [] as $item)
						<a class="detail-page__related" href="{{ route('detberita', $item->id) }}">
							<span class="detail-page__related-date">{{ $item->tanggal_tampil ? \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M Y') : '' }}</span>
							<span class="detail-page__related-title">{{ $item->title }}</span>
						</a>
						@empty
						<p class="uk-text-muted uk-margin-remove">Belum ada berita lainnya.</p>
						@endforelse
					</div>
				</aside>
			</div>
		</div>
	</section>
</main>
@endsection