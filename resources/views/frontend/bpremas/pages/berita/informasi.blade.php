@extends('frontend.bpremas.layout.main')

@section('content')
@php
$excerpt = static function ($content) {
$plainText = html_entity_decode(strip_tags((string) $content), ENT_QUOTES | ENT_HTML5, 'UTF-8');
$plainText = preg_replace('/\s+/u', ' ', trim($plainText));

return \Illuminate\Support\Str::limit($plainText, 120);
};
@endphp
<style>
	.information-page {
		background: #f5f7fb;
	}

	.information-page__hero {
		background: linear-gradient(135deg, #0d162f, #234574);
		color: #fff;
	}

	.information-tabs {
		display: flex;
		flex-wrap: wrap;
		gap: 0.6rem;
		justify-content: center;
	}

	.information-tabs__button {
		background: #e8edf4;
		border: 0;
		border-radius: 8px;
		color: #475569;
		cursor: pointer;
		font-weight: 700;
		padding: 0.75rem 1.25rem;
	}

	.information-tabs__button.is-active,
	.information-tabs__button:hover {
		background: #0d162f;
		color: #fff;
	}

	.information-panel {
		display: none;
	}

	.information-panel.is-active {
		display: block;
	}

	.information-card {
		background: #fff;
		border-radius: 14px;
		box-shadow: 0 8px 24px rgba(13, 22, 47, 0.08);
		display: flex;
		flex-direction: column;
		height: 100%;
		overflow: hidden;
		transition: transform 0.2s ease, box-shadow 0.2s ease;
	}

	.information-card:hover {
		box-shadow: 0 12px 30px rgba(13, 22, 47, 0.14);
		transform: translateY(-3px);
	}

	.information-card__image {
		aspect-ratio: 16 / 9;
		background: #e8edf4;
		object-fit: cover;
		width: 100%;
	}

	.information-card__body {
		display: flex;
		flex: 1;
		flex-direction: column;
		padding: 1.25rem;
	}

	.information-card__date {
		color: #64748b;
		font-size: 0.8rem;
		margin-bottom: 0.65rem;
	}

	.information-card__title {
		color: #0d162f;
		font-size: 1.1rem;
		font-weight: 700;
		line-height: 1.4;
		margin: 0 0 0.65rem;
	}

	.information-card__excerpt {
		color: #64748b;
		font-size: 0.9rem;
		line-height: 1.6;
		margin-bottom: 1rem;
	}

	.information-card__link {
		color: #0d162f;
		font-size: 0.9rem;
		font-weight: 700;
		margin-top: auto;
	}

	.information-card__link:hover {
		color: #234574;
		text-decoration: none;
	}

	.information-empty {
		background: #fff;
		border: 1px dashed #cbd5e1;
		border-radius: 12px;
		color: #64748b;
		padding: 2rem;
		text-align: center;
	}

	@media (max-width: 480px) {
		.information-tabs__button {
			flex: 1 1 100%;
		}
	}
</style>

<main class="information-page">
	<div id="sc-page-content" data-uk-lightbox="animation: fade;toggle:a.lightbox-link">
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

		<section class="uk-section uk-section-muted">
			<div class="uk-container">
				<div class="information-tabs uk-margin-large-bottom" role="tablist">
					<button class="information-tabs__button is-active" data-information-tab="berita" type="button">
						Berita
					</button>
					<button class="information-tabs__button" data-information-tab="event" type="button">
						Event
					</button>
				</div>

				<div class="information-panel is-active" data-information-panel="berita">
					@if ($berita->isNotEmpty())
					<div class="uk-child-width-1-2@s uk-child-width-1-3@m" data-uk-grid>
						@foreach ($berita as $item)
						<div>
							<article class="information-card">
								<img class="information-card__image"
									src="{{ $item->thumbnail ? url('/recfil?display=true&rf=' . $item->thumbnail) : asset('frontend/bpremas/1ramah.png') }}"
									alt="{{ $item->title }}" loading="lazy">
								<div class="information-card__body">
									<time class="information-card__date" datetime="{{ $item->tanggal_tampil }}">
										{{ $item->tanggal_tampil ? \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M Y') : 'Tanggal belum tersedia' }}
									</time>
									<h2 class="information-card__title">{{ $item->title }}</h2>
									<p class="information-card__excerpt">
										{{ $excerpt($item->content) }}
									</p>
									<a class="information-card__link" href="{{ route('detberita', $item->id) }}">
										Baca selengkapnya
									</a>
								</div>
							</article>
						</div>
						@endforeach
					</div>
					@else
					<div class="information-empty">Belum ada berita tersedia.</div>
					@endif
				</div>

				<div class="information-panel" data-information-panel="event">
					@if ($event->isNotEmpty())
					<div class="uk-child-width-1-2@s uk-child-width-1-3@m" data-uk-grid>
						@foreach ($event as $item)
						<div>
							<article class="information-card">
								<img class="information-card__image"
									src="{{ $item->thumbnail ? url('/recfil?display=true&rf=' . $item->thumbnail) : asset('frontend/bpremas/1ramah.png') }}"
									alt="{{ $item->title }}" loading="lazy">
								<div class="information-card__body">
									<time class="information-card__date" datetime="{{ $item->tanggal_tampil }}">
										{{ $item->tanggal_tampil ? \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d M Y') : 'Tanggal belum tersedia' }}
									</time>
									<h2 class="information-card__title">{{ $item->title }}</h2>
									<p class="information-card__excerpt">
										{{ $excerpt($item->content) }}
									</p>
									<a class="information-card__link" href="{{ route('detevent', $item->id) }}">
										Lihat detail event
									</a>
								</div>
							</article>
						</div>
						@endforeach
					</div>
					@else
					<div class="information-empty">Belum ada event tersedia.</div>
					@endif
				</div>
			</div>
		</section>
</main>

<script>
	(() => {
		const tabs = document.querySelectorAll('[data-information-tab]');
		const panels = document.querySelectorAll('[data-information-panel]');

		tabs.forEach((tab) => {
			tab.addEventListener('click', () => {
				const selected = tab.dataset.informationTab;

				tabs.forEach((item) => item.classList.toggle('is-active', item === tab));
				panels.forEach((panel) => {
					panel.classList.toggle('is-active', panel.dataset.informationPanel === selected);
				});
			});
		});
	})();
</script>
@endsection