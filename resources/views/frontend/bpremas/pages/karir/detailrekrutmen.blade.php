@extends('frontend.bpremas.layout.main')

@section('content')
<style>
	.career-detail {
		background: #f5f7fb;
	}

	.career-detail__hero {
		background: linear-gradient(135deg, #0d162f, #234574);
		color: #fff;
	}

	.career-detail__article,
	.career-detail__aside {
		background: #fff;
		border-radius: 16px;
		box-shadow: 0 10px 30px rgba(13, 22, 47, .08);
	}

	.career-detail__article {
		overflow: hidden;
	}

	.career-detail__image {
		aspect-ratio: 16 / 7;
		background: #e8edf4;
		object-fit: cover;
		width: 100%;
	}

	.career-detail__body {
		padding: clamp(1.25rem, 3vw, 2.5rem);
	}

	.career-detail__title {
		color: #0d162f;
		font-size: clamp(1.6rem, 3vw, 2.5rem);
		font-weight: 700;
		line-height: 1.25;
		margin: 0 0 1rem;
	}

	.career-detail__meta {
		color: #64748b;
		display: flex;
		flex-wrap: wrap;
		font-size: .9rem;
		gap: .75rem 1.5rem;
		margin-bottom: 1.5rem;
	}

	.career-detail__meta span {
		align-items: center;
		display: inline-flex;
		gap: .35rem;
	}

	.career-detail__section {
		border-top: 1px solid #e5e7eb;
		color: #374151;
		font-size: 1rem;
		line-height: 1.8;
		padding-top: 1.5rem;
	}

	.career-detail__section+.career-detail__section {
		margin-top: 1.5rem;
	}

	.career-detail__section-title {
		color: #0d162f;
		font-size: 1.15rem;
		font-weight: 700;
		margin-bottom: .75rem;
	}

	.career-detail__section img,
	.career-detail__section iframe,
	.career-detail__section table {
		max-width: 100%;
	}

	.career-detail__section table {
		display: block;
		overflow-x: auto;
	}

	.career-detail__aside {
		padding: 1.25rem;
	}

	.career-detail__aside-title {
		color: #0d162f;
		font-size: 1.15rem;
		font-weight: 700;
		margin: 0 0 1rem;
	}

	.career-detail__action {
		background: #0d162f;
		border-radius: 8px;
		color: #fff;
		display: block;
		font-weight: 700;
		margin-top: 1.5rem;
		padding: .85rem 1rem;
		text-align: center;
	}

	.career-detail__action:hover {
		background: #234574;
		color: #fff;
		text-decoration: none;
	}
</style>

<main class="career-detail">
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

	<section class="uk-section">
		<div class="uk-container">
			<div class="uk-grid-large" data-uk-grid>
				<div class="uk-width-2-3@m">
					<article class="career-detail__article">
						@if ($detrekrutmen->gambar)
						<img class="career-detail__image" src="{{ url('/recfil?display=true&rf=' . $detrekrutmen->gambar) }}"
							alt="{{ $detrekrutmen->judul }}">
						@endif
						<div class="career-detail__body">
							<h2 class="career-detail__title">{{ $detrekrutmen->judul }}</h2>
							<div class="career-detail__meta">
								<span><span data-uk-icon="icon: location"></span>{{ $detrekrutmen->lokasi ?: 'Lokasi tidak tersedia' }}</span>
								<span><span data-uk-icon="icon: calendar"></span>{{ $detrekrutmen->tipe_pekerjaan_text }}</span>
								@if ($detrekrutmen->tanggal_berakhir)
								<span><span data-uk-icon="icon: clock"></span>Berakhir {{ \Carbon\Carbon::parse($detrekrutmen->tanggal_berakhir)->translatedFormat('d F Y') }}</span>
								@endif
							</div>

							<section class="career-detail__section">
								<h3 class="career-detail__section-title">Deskripsi Pekerjaan</h3>
								{!! $detrekrutmen->deskripsi !!}
							</section>
							<section class="career-detail__section">
								<h3 class="career-detail__section-title">Kualifikasi</h3>
								{!! $detrekrutmen->kualifikasi !!}
							</section>
						</div>
					</article>
				</div>

				<aside class="uk-width-1-3@m">
					<div class="career-detail__aside">
						<h2 class="career-detail__aside-title">Informasi Lowongan</h2>
						<dl class="uk-description-list uk-description-list-divider">
							<dt>Tipe Pekerjaan</dt>
							<dd>{{ $detrekrutmen->tipe_pekerjaan_text }}</dd>
							<dt>Lokasi</dt>
							<dd>{{ $detrekrutmen->lokasi ?: 'Tidak tersedia' }}</dd>
							<dt>Batas Lamaran</dt>
							<dd>{{ $detrekrutmen->tanggal_berakhir ? \Carbon\Carbon::parse($detrekrutmen->tanggal_berakhir)->translatedFormat('d F Y') : 'Tidak tersedia' }}</dd>
						</dl>
						<a class="career-detail__action" href="{{ url('/pengaduan') }}">Hubungi Kami</a>
					</div>
				</aside>
			</div>
		</div>
	</section>
</main>
@endsection