@extends('frontend.bpremas.layout.main')

@section('content')

<style>
	.reports-section {
		background: #f5f7fb;
	}

	.reports-group+.reports-group {
		margin-top: 3rem;
	}

	.reports-group__title {
		color: #0d162f;
		font-weight: 700;
		margin-bottom: 1.25rem;
		text-align: center;
	}

	.report-card {
		background: #fff;
		border-radius: 14px;
		box-shadow: 0 8px 24px rgba(13, 22, 47, 0.08);
		display: flex;
		flex-direction: column;
		height: 100%;
		overflow: hidden;
		padding: 1.25rem;
		transition: transform 0.2s ease, box-shadow 0.2s ease;
	}

	.report-card:hover {
		box-shadow: 0 12px 30px rgba(13, 22, 47, 0.14);
		transform: translateY(-3px);
	}

	.report-card__thumbnail {
		aspect-ratio: 4 / 3;
		background: #eef2f7;
		border-radius: 10px;
		object-fit: cover;
		width: 100%;
	}

	.report-card__title {
		color: #0d162f;
		font-size: 1.05rem;
		font-weight: 700;
		margin: 1rem 0;
	}

	.report-card__actions {
		display: flex;
		flex-wrap: wrap;
		gap: 0.5rem;
		margin-top: auto;
	}

	.report-card__action {
		background: #0d162f;
		border-radius: 7px;
		color: #fff;
		display: inline-block;
		font-size: 0.85rem;
		padding: 0.55rem 0.8rem;
	}

	.report-card__action:hover {
		background: #234574;
		color: #fff;
		text-decoration: none;
	}

	.reports-empty {
		background: #fff;
		border: 1px dashed #cbd5e1;
		border-radius: 12px;
		color: #64748b;
		padding: 2rem;
		text-align: center;
	}
</style>

<div id="sc-page-wrapper" class="uk-ef_newsletter">
	<div id="sc-page-content" data-uk-lightbox="animation: fade;toggle:a.lightbox-link">
		@php
		$headerImage = asset('frontend/bpremas/laporan.png');
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

		<section class="reports-section uk-section">
			<div class="uk-container">
				<div class="reports-group">
					<h2 class="reports-group__title">Laporan Publikasi</h2>
					@if (isset($publikasi) && $publikasi->isNotEmpty())
					<div class="uk-child-width-1-2@s uk-child-width-1-3@m" data-uk-grid>
						@foreach ($publikasi as $tahun => $laporanTahun)
						<div>
							<article class="report-card">
								<img class="report-card__thumbnail"
									src="{{ $laporanTahun->first()->thumbnail ? url('/recfil?display=true&rf=' . $laporanTahun->first()->thumbnail) : $headerImage }}"
									alt="Laporan Publikasi {{ $tahun }}" loading="lazy">
								<h3 class="report-card__title">Laporan Publikasi {{ $tahun }}</h3>
								<div class="report-card__actions">
									@foreach ($laporanTahun->groupBy('triwulan') as $triwulan => $items)
									@if ($items->first()->url)
									<a class="report-card__action" href="{{ url('/recfil?display=true&rf=' . $items->first()->url) }}"
										target="_blank" rel="noopener">{{ $triwulan }}</a>
									@endif
									@endforeach
								</div>
							</article>
						</div>
						@endforeach
					</div>
					@else
					<div class="reports-empty">Belum ada laporan publikasi.</div>
					@endif
				</div>

				<div class="reports-group">
					<h2 class="reports-group__title">Laporan Tahunan</h2>
					@if (isset($tahunan) && $tahunan->isNotEmpty())
					<div class="uk-child-width-1-2@s uk-child-width-1-3@m" data-uk-grid>
						@foreach ($tahunan as $item)
						<div>
							<article class="report-card">
								<img class="report-card__thumbnail"
									src="{{ $item->thumbnail ? url('/recfil?display=true&rf=' . $item->thumbnail) : $headerImage }}"
									alt="{{ $item->title }}" loading="lazy">
								<h3 class="report-card__title">{{ $item->title }}</h3>
								@if ($item->url)
								<div class="report-card__actions">
									<a class="report-card__action" href="{{ url('/recfil?display=true&rf=' . $item->url) }}"
										target="_blank" rel="noopener">Buka laporan</a>
								</div>
								@endif
							</article>
						</div>
						@endforeach
					</div>
					@else
					<div class="reports-empty">Belum ada laporan tahunan.</div>
					@endif
				</div>

				<div class="reports-group">
					<h2 class="reports-group__title">Laporan Keberlanjutan</h2>
					@if (isset($keberlanjutan) && $keberlanjutan->isNotEmpty())
					<div class="uk-child-width-1-2@s uk-child-width-1-3@m" data-uk-grid>
						@foreach ($keberlanjutan as $item)
						<div>
							<article class="report-card">
								<img class="report-card__thumbnail"
									src="{{ $item->thumbnail ? url('/recfil?display=true&rf=' . $item->thumbnail) : $headerImage }}"
									alt="{{ $item->title }}" loading="lazy">
								<h3 class="report-card__title">{{ $item->title }}</h3>
								@if ($item->url)
								<div class="report-card__actions">
									<a class="report-card__action" href="{{ url('/recfil?display=true&rf=' . $item->url) }}"
										target="_blank" rel="noopener">Buka laporan</a>
								</div>
								@endif
							</article>
						</div>
						@endforeach
					</div>
					@else
					<div class="reports-empty">Belum ada laporan keberlanjutan.</div>
					@endif
				</div>
			</div>
		</section>
	</div>
</div>
@endsection