@extends('frontend.bpremas.layout.main')

@section('content')
@php
$date = $eventberita->tanggal_tampil
? \Carbon\Carbon::parse($eventberita->tanggal_tampil)->translatedFormat('d F Y')
: 'Tanggal belum tersedia';
$thumbnail = $eventberita->banner ?: $eventberita->thumbnail;
@endphp

<style>
	.event-detail {
		background: #f5f7fb;
	}

	.event-detail__hero {
		background: linear-gradient(135deg, #0d162f, #234574);
		color: #fff;
	}

	.event-detail__article,
	.event-detail__sidebar {
		background: #fff;
		border-radius: 16px;
		box-shadow: 0 10px 30px rgba(13, 22, 47, .08);
	}

	.event-detail__article {
		overflow: hidden;
	}

	.event-detail__banner {
		aspect-ratio: 16 / 8;
		background: #e8edf4;
		object-fit: cover;
		width: 100%;
	}

	.event-detail__body {
		padding: clamp(1.25rem, 3vw, 2.5rem);
	}

	.event-detail__meta {
		color: #64748b;
		display: flex;
		flex-wrap: wrap;
		font-size: .875rem;
		gap: .75rem 1.5rem;
		margin-bottom: 1rem;
	}

	.event-detail__title {
		color: #0d162f;
		font-size: clamp(1.6rem, 3vw, 2.4rem);
		font-weight: 700;
		line-height: 1.25;
		margin: 0 0 1.5rem;
	}

	.event-detail__content {
		color: #374151;
		font-size: 1rem;
		line-height: 1.8;
		overflow-wrap: anywhere;
	}

	.event-detail__content img,
	.event-detail__content video,
	.event-detail__content iframe {
		height: auto !important;
		max-width: 100% !important;
	}

	.event-detail__content table {
		display: block;
		max-width: 100%;
		overflow-x: auto;
	}

	.event-detail__content a {
		color: #234574;
		text-decoration: underline;
	}

	.event-detail__sidebar {
		padding: 1.25rem;
	}

	.event-detail__sidebar-title {
		color: #0d162f;
		font-size: 1.15rem;
		font-weight: 700;
		margin: 0 0 1rem;
	}

	.event-detail__related {
		border-bottom: 1px solid #e5e7eb;
		display: block;
		padding: .85rem 0;
	}

	.event-detail__related:last-child {
		border-bottom: 0;
	}

	.event-detail__related-date {
		color: #64748b;
		display: block;
		font-size: .75rem;
		margin-bottom: .25rem;
	}

	.event-detail__related-title {
		color: #1f2937;
		font-size: .9rem;
		font-weight: 600;
		line-height: 1.45;
	}

	.event-detail__related:hover {
		text-decoration: none;
	}
</style>

<main class="event-detail">
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
					<article class="event-detail__article">
						@if ($thumbnail)
						<img class="event-detail__banner" src="{{ url('/recfil?display=true&rf=' . $thumbnail) }}"
							alt="{{ $eventberita->title }}">
						@endif
						<div class="event-detail__body">
							<div class="event-detail__meta">
								<span>{{ $eventberita->kategori ?: 'Event' }}</span>
								<time datetime="{{ $eventberita->tanggal_tampil }}">{{ $date }}</time>
							</div>
							<h2 class="event-detail__title">{{ $eventberita->title }}</h2>
							<div class="event-detail__content">{!! $eventberita->content !!}</div>
						</div>
					</article>
				</div>

				<aside class="uk-width-1-3@m">
					<div class="event-detail__sidebar">
						<h2 class="event-detail__sidebar-title">Event Lainnya</h2>
						@forelse ($other_event ?? [] as $item)
						<a class="event-detail__related" href="{{ route('detevent', $item->id) }}">
							<span class="event-detail__related-date">{{ $item->tanggal_tampil ? \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M Y') : '' }}</span>
							<span class="event-detail__related-title">{{ $item->title }}</span>
						</a>
						@empty
						<p class="uk-text-muted uk-margin-remove">Belum ada event lainnya.</p>
						@endforelse
					</div>
				</aside>
			</div>
		</div>
	</section>
</main>
@endsection