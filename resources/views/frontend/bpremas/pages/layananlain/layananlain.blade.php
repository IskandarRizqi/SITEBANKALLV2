@extends('frontend.bpremas.layout.main')

@section('content')
<div id="sc-page-wrapper" class="uk-ef_newsletter">
	<div id="sc-page-content" data-uk-lightbox="animation: fade;toggle:a.lightbox-link">
		@php
		$headerImage = asset('frontend/bpremas/img3.png');
		@endphp

		<section class="uk-hidden@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
			style="background-image: url('{{ $headerImage }}'); height: 400px;">
			<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
			<div class="uk-container">
				<div class="uk-position uk-position-left-center uk-width-4-5">
					<h1 class="uk-h1">Layanan</h1>
					<p>Bermacam fasilitas perbankan yang Anda butuhkan dalam memenuhi kebutuhan transaksi dan Keuangan Anda.</p>
				</div>
			</div>
		</section>

		<section class="uk-hidden@l uk-visible@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
			style="background-image: url('{{ $headerImage }}'); height: 400px;">
			<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
			<div class="uk-position uk-position-bottom-left uk-width-4-5">
				<div class="uk-container">
					<h1 class="uk-h1">Layanan</h1>
					<p class="uk-margin-bottom">Bermacam fasilitas perbankan yang Anda butuhkan dalam memenuhi kebutuhan transaksi dan Keuangan Anda.</p>
				</div>
			</div>
		</section>

		<section class="uk-visible@l uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
			style="background-image: url('{{ $headerImage }}'); height: 400px;">
			<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
			<div class="uk-position uk-position-bottom-left uk-width-1-1">
				<div class="uk-container">
					<h1 class="uk-h1">Layanan</h1>
					<p class="uk-margin-bottom">Bermacam fasilitas perbankan yang Anda butuhkan dalam memenuhi kebutuhan transaksi dan Keuangan Anda.</p>
				</div>
			</div>
		</section>

		<section class="uk-section-default uk-section">
			<div class="uk-container uk-container-small">
				<div class="uk-child-width-1-2@s uk-grid-match" uk-grid>
					<div class="uk-width-1-3@m uk-width-1-2@s uk-first-column">
						<a class="uk-link-reset"
							href=""
							target="_blank">
							<div
								class="uk-card uk-card-default uk-card-small uk-card-hover">

								<div class="uk-card-media-top">
									<img data-src="{{ asset('frontend/bpremas/images/img_tumbnail-pdam_156.jpg') }}"
										alt="tumbnail-pdam" title="Tagihan Air Minum"
										class="uk-transition-scale-down uk-transition-opaque"
										data-uk-img=""
										src="{{ asset('frontend/bpremas/images/img_tumbnail-pdam_156.jpg') }}">
								</div>

								<div class="uk-card-body">
									<h3 class="uk-card-title">Tagihan Air Minum</h3>
									<p>Layanan Pembayaran Tagihan Air Minum merupakan Layanan penerimaan
										pembayaran tagihan air dari PDAM dengan
										menggunakan nomor tagihan secara online yang
										dapat dibayarkan melalui seluruh jaringan Kantor
										Cabang/KCP/KK/Payment Point bank </p>
								</div>
								<div class="uk-card-footer">
									<p class="uk-button uk-button-text">Selengkapnya
									</p>
								</div>
							</div>
						</a>
					</div>
					<div class="uk-width-1-3@m uk-width-1-2@s uk-first-column">
						<a class="uk-link-reset"
							href=""
							target="_blank">
							<div
								class="uk-card uk-card-default uk-card-small uk-card-hover">

								<div class="uk-card-media-top">
									<img data-src="{{ asset('frontend/bpremas/images/img_tumbnail-pdam_156.jpg') }}"
										alt="tumbnail-pdam" title="Tagihan Air Minum"
										class="uk-transition-scale-down uk-transition-opaque"
										data-uk-img=""
										src="{{ asset('frontend/bpremas/images/img_tumbnail-pdam_156.jpg') }}">
								</div>

								<div class="uk-card-body">
									<h3 class="uk-card-title">Tagihan Air Minum</h3>
									<p>Layanan Pembayaran Tagihan Air Minum merupakan Layanan penerimaan
										pembayaran tagihan air dari PDAM dengan
										menggunakan nomor tagihan secara online yang
										dapat dibayarkan melalui seluruh jaringan Kantor
										Cabang/KCP/KK/Payment Point bank </p>
								</div>
								<div class="uk-card-footer">
									<p class="uk-button uk-button-text">Selengkapnya
									</p>
								</div>
							</div>
						</a>
					</div>
					<div class="uk-width-1-3@m uk-width-1-2@s uk-first-column">
						<a class="uk-link-reset"
							href=""
							target="_blank">
							<div
								class="uk-card uk-card-default uk-card-small uk-card-hover">

								<div class="uk-card-media-top">
									<img data-src="{{ asset('frontend/bpremas/images/img_tumbnail-pdam_156.jpg') }}"
										alt="tumbnail-pdam" title="Tagihan Air Minum"
										class="uk-transition-scale-down uk-transition-opaque"
										data-uk-img=""
										src="{{ asset('frontend/bpremas/images/img_tumbnail-pdam_156.jpg') }}">
								</div>

								<div class="uk-card-body">
									<h3 class="uk-card-title">Tagihan Air Minum</h3>
									<p>Layanan Pembayaran Tagihan Air Minum merupakan Layanan penerimaan
										pembayaran tagihan air dari PDAM dengan
										menggunakan nomor tagihan secara online yang
										dapat dibayarkan melalui seluruh jaringan Kantor
										Cabang/KCP/KK/Payment Point bank </p>
								</div>
								<div class="uk-card-footer">
									<p class="uk-button uk-button-text">Selengkapnya
									</p>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>


@endsection