@extends('frontend.bpremas.layout.main')

@section('content')
<div id="sc-page-wrapper" class="uk-ef_newsletter">
	<div id="sc-page-content" data-uk-lightbox="animation: fade;toggle:a.lightbox-link">
		@php
		$headerImage = asset('frontend/bpremas/img2.png');
		@endphp

		<section class="uk-hidden@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
			style="background-image: url('{{ $headerImage }}'); height: 400px;">
			<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
			<div class="uk-container">
				<div class="uk-position uk-position-left-center uk-width-4-5">
					<h1 class="uk-h1">Simpanan</h1>
					<p>Nikmati keuntungan dan kenyamanan simpanan yang lebih baik dengan bank bjb.</p>
				</div>
			</div>
		</section>

		<section class="uk-hidden@l uk-visible@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
			style="background-image: url('{{ $headerImage }}'); height: 400px;">
			<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
			<div class="uk-position uk-position-bottom-left uk-width-4-5">
				<div class="uk-container">
					<h1 class="uk-h1">Simpanan</h1>
					<p class="uk-margin-bottom">Nikmati keuntungan dan kenyamanan simpanan yang lebih baik dengan bank.</p>
				</div>
			</div>
		</section>

		<section class="uk-visible@l uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
			style="background-image: url('{{ $headerImage }}'); height: 400px;">
			<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
			<div class="uk-position uk-position-bottom-left uk-width-1-1">
				<div class="uk-container">
					<h1 class="uk-h1">Simpanan</h1>
					<p class="uk-margin-bottom">Nikmati keuntungan dan kenyamanan simpanan yang lebih baik dengan bank.</p>
				</div>
			</div>
		</section>

		<section class="uk-section-default uk-section">
			<div class="uk-container uk-container-small">
				<h2 class="uk-heading-line uk-text-center uk-margin-large-bottom"><span>Tabungan</span></h2>
				<div class="uk-child-width-1-2@s uk-grid-match" uk-grid>
					@forelse ($tabungan as $item)
					@php
					$image = $item->thumbnail ?: $item->banner;
					$description = $item->deskripsi ?: $item->content;
					@endphp
					<div>
						<a class="uk-link-reset" href="{{ route('dettabungan', $item->id) }}">
							<div class="uk-card uk-card-default uk-card-small uk-card-hover">
								<div class="uk-card-media-top">
									<img src="{{ $image ? url('/recfil?display=true&rf=' . $image) : asset('frontend/bpremas/images/600x300.jpg') }}"
										alt="{{ $item->title }}" class="uk-width-1-1" loading="lazy">
								</div>
								<div class="uk-card-body">
									<h3 class="uk-card-title">{{ $item->title }}</h3>
									<p>{{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode((string) $description)), 160) }}</p>
								</div>
								<div class="uk-card-footer"><span class="uk-button uk-button-text">Selengkapnya</span></div>
							</div>
						</a>
					</div>
					@empty
					<div class="uk-width-1-1">
						<p>Data tabungan belum tersedia.</p>
					</div>
					@endforelse
				</div>

				@if (isset($deposito))
				<h2 class="uk-heading-line uk-text-center uk-margin-large-top uk-margin-large-bottom"><span>Deposito</span></h2>
				<div class="uk-child-width-1-2@s uk-grid-match" uk-grid>
					@forelse ($deposito as $item)
					@php
					$image = $item->thumbnail ?: $item->banner;
					$description = $item->deskripsi ?: $item->content;
					@endphp
					<div>
						<a class="uk-link-reset" href="{{ route('detdeposito', $item->id) }}">
							<div class="uk-card uk-card-default uk-card-small uk-card-hover">
								<div class="uk-card-media-top">
									<img src="{{ $image ? url('/recfil?display=true&rf=' . $image) : asset('frontend/bpremas/images/600x300.jpg') }}"
										alt="{{ $item->title }}" class="uk-width-1-1" loading="lazy">
								</div>
								<div class="uk-card-body">
									<h3 class="uk-card-title">{{ $item->title }}</h3>
									<p>{{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode((string) $description)), 160) }}</p>
								</div>
								<div class="uk-card-footer"><span class="uk-button uk-button-text">Selengkapnya</span></div>
							</div>
						</a>
					</div>
					@empty
					<div class="uk-width-1-1">
						<p>Data deposito belum tersedia.</p>
					</div>
					@endforelse
				</div>
				@endif
			</div>
		</section>
	</div>
</div>
@endsection