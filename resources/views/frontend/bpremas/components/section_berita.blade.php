<section id="home-news" class="uk-section-default uk-section">
	@php
	$newsCategories = collect($berita ?? [])
	->map(fn ($item) => \Illuminate\Support\Str::slug((string) $item->kategori))
	->filter()
	->unique()
	->values();
	@endphp

	<div class="uk-container">
		<div class="uk-flex uk-flex-between uk-flex-middle uk-margin-medium-bottom">
			<h3 class="uk-margin-remove-bottom uk-h1">Berita Terkini</h3>
			<a class="uk-button uk-button-text" href="{{ url('/informasi') }}">Lihat Berita Lainnya</a>
		</div>

		<div class="uk-ef_blog_posts" data-post-type="news" data-limit="6"
			data-is-pagination="false" data-mode="slider-style-2"
			data-column="uk-width-1-3@m uk-width-1-2@s"
			data-categories="{{ $newsCategories->implode(',') }}"
			data-sort="CreatedDate" data-sort-type="DESC">
			<div class="uk-margin-bottom uk-flex-top uk-flex uk-grid-small" uk-grid>
				<div class="uk-width-expand@m">
					<ul class="uk-visible@m uk-subnav-pill uk-grid-small ef-post-filter uk-flex uk-padding-remove uk-width-1-1"
						data-uk-switcher="" uk-grid role="tablist">
						<li class="uk-active uk-width-auto" role="presentation"><a role="tab" href="#" class="uk-subnav__link" data-field="Categories"
								data-filter="">Semua</a></li>
						@foreach ($newsCategories as $category)
						<li class="uk-width-auto text-uppercase" role="presentation"><a role="tab" class="uk-subnav__link" href="#" data-field="Categories"
								data-filter="{{ $category }}">{{ \Illuminate\Support\Str::headline($category) }}</a></li>
						@endforeach
					</ul>

					<select class="uk-hidden@m uk-select ef-post-filter-mobile" aria-label="Pilih kategori berita">
						<option value="">Semua</option>
						@foreach ($newsCategories as $category)
						<option value="{{ $category }}" data-field="Categories"
							data-filter="{{ $category }}">{{ \Illuminate\Support\Str::headline($category) }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="uk-position-relative uk-slider-container-offset uk-slider-container" uk-slider>
				<ul class="uk-slider-items uk-grid-match uk-grid" uk-grid>
					@forelse ($berita as $item)
					@php
					$category = \Illuminate\Support\Str::slug((string) $item->kategori);
					$image = $item->banner ?: $item->thumbnail;
					@endphp
					<li class="uk-width-1-1@m" data-category="{{ $category }}">
						<a class="uk-link-reset" href="{{ route('detberita', $item->id) }}">
							<div class="uk-card uk-card-default uk-grid-collapse uk-grid" uk-grid>
								<div class="uk-card-media-left uk-width-1-2@m uk-background-cover uk-flex-last@m uk-height-large"
									style="background-image: url('{{ $image ? url('/recfil?display=true&rf=' . $image) : asset('frontend/bpremas/images/600x300.jpg') }}');">
								</div>
								<div class="uk-width-1-2@m uk-flex uk-flex-middle">
									<div class="uk-card-body">
										<span class="uk-text-meta uk-margin-small-bottom">
											{{ $item->kategori ?: 'Berita' }}
										</span>
										<h4 class="uk-margin-remove-top">{{ $item->title }}</h4>
										<p class="news-description">{{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode((string) $item->content)), 160) }}</p>
										<span class="uk-button uk-button-text">Selengkapnya</span>
									</div>
								</div>
							</div>
						</a>
					</li>
					@empty
					<li class="uk-width-1-1">
						<p>Belum ada berita.</p>
					</li>
					@endforelse
				</ul>
				<a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous
					uk-slider-item="previous" aria-label="Sebelumnya"></a>
				<a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next
					uk-slider-item="next" aria-label="Berikutnya"></a>
			</div>
		</div>
	</div>
</section>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const section = document.querySelector('#home-news');
		if (!section) return;

		const cards = section.querySelectorAll('li[data-category]');
		const mobileFilter = section.querySelector('.ef-post-filter-mobile');
		const slider = section.querySelector('[uk-slider]');

		const filterCards = function(category) {
			cards.forEach(function(card) {
				card.classList.toggle('uk-hidden', Boolean(category) && card.dataset.category !== category);
			});

			if (window.UIkit && slider) {
				window.UIkit.update(slider);
			}
		};

		section.addEventListener('click', function(event) {
			const filter = event.target.closest('a[data-field="Categories"][data-filter]');
			if (!filter || !section.contains(filter)) return;

			event.preventDefault();
			filterCards(filter.dataset.filter || '');
			section.querySelectorAll('a[data-field="Categories"][data-filter]').forEach(function(item) {
				item.setAttribute('aria-selected', item === filter ? 'true' : 'false');
			});
		});

		if (mobileFilter) {
			mobileFilter.addEventListener('change', function() {
				filterCards(this.value);
			});
		}
	});
</script>

<style>
	#home-news .news-description {
		white-space: normal;
		overflow-wrap: anywhere;
		word-break: normal;
	}
</style>