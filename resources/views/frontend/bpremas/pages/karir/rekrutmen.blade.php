@extends('frontend.bpremas.layout.main')

@section('content')
<style>
	.career-page {
		background: #f5f7fb;
	}

	.career-page__hero {
		background: linear-gradient(135deg, #0d162f, #234574);
		color: #fff;
	}

	.career-card {
		background: #fff;
		border-radius: 14px;
		box-shadow: 0 8px 24px rgba(13, 22, 47, .08);
		display: flex;
		flex-direction: column;
		height: 100%;
		overflow: hidden;
	}

	.career-card__image {
		aspect-ratio: 16 / 9;
		background: #e8edf4;
		object-fit: cover;
		width: 100%;
	}

	.career-card__body {
		display: flex;
		flex: 1;
		flex-direction: column;
		padding: 1.25rem;
	}

	.career-card__title {
		color: #0d162f;
		font-size: 1.15rem;
		font-weight: 700;
		line-height: 1.4;
		margin: 0 0 1rem;
	}

	.career-card__meta {
		color: #64748b;
		display: flex;
		flex-wrap: wrap;
		font-size: .85rem;
		gap: .5rem 1rem;
		margin-bottom: 1rem;
	}

	.career-card__meta span {
		align-items: center;
		display: inline-flex;
		gap: .3rem;
	}

	.career-card__description {
		color: #64748b;
		font-size: .9rem;
		line-height: 1.6;
		margin-bottom: 1rem;
	}

	.career-card__link {
		color: #0d162f;
		font-weight: 700;
		margin-top: auto;
	}

	.career-card__link:hover {
		color: #234574;
		text-decoration: none;
	}

	.career-empty {
		background: #fff;
		border: 1px dashed #cbd5e1;
		border-radius: 12px;
		color: #64748b;
		padding: 2rem;
		text-align: center;
	}
</style>

<main class="career-page">
	@php
	$headerImage = asset('frontend/bpremas/kr1.png');
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

	<section class="uk-section uk-section-muted">
		<div class="uk-container">
			<div class="uk-text-center uk-margin-large-bottom">
				<h2 class="uk-h3">Lowongan Tersedia</h2>
				<p class="uk-text-muted">Pilih posisi yang sesuai dengan pengalaman dan minat Anda.</p>
			</div>

			@if ($rekruitmen->isNotEmpty())
			<div class="uk-child-width-1-2@s uk-child-width-1-3@m" data-uk-grid>
				@foreach ($rekruitmen as $item)
				<div>
					<article class="career-card">
						<img class="career-card__image"
							src="{{ $item->gambar ? url('/recfil?display=true&rf=' . $item->gambar) : asset('frontend/bpremas/1ramah.png') }}"
							alt="{{ $item->judul }}" loading="lazy">
						<div class="career-card__body">
							<h3 class="career-card__title">{{ $item->judul }}</h3>
							<div class="career-card__meta">
								<span><span data-uk-icon="icon: location; ratio: .8"></span>{{ $item->lokasi ?: 'Lokasi tidak tersedia' }}</span>
								<span><span data-uk-icon="icon: calendar; ratio: .8"></span>{{ $item->tipe_pekerjaan_text }}</span>
							</div>
							<p class="career-card__description">
								{{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode((string) $item->deskripsi)), 130) }}
							</p>
							<a class="career-card__link" href="{{ route('detrekrutmen', $item->id) }}">Lihat detail posisi</a>
						</div>
					</article>
				</div>
				@endforeach
			</div>
			@else
			<div class="career-empty">Belum ada lowongan yang tersedia saat ini.</div>
			@endif
		</div>
	</section>
</main>
@endsection