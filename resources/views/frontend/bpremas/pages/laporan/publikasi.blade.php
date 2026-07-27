@extends('frontend.bpremas.layout.main')

@section('content')
<div id="sc-page-wrapper" class="uk-ef_newsletter">
	<div id="sc-page-content" data-uk-lightbox="animation: fade;toggle:a.lightbox-link">
		@php
		$headerImage = asset('frontend/bpremas/1ramah.png');
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

	</div>
</div>
@endsection