<section id="home-promo" class="uk-section-default uk-section"
	data-uk-scrollspy="cls:uk-animation-slide-bottom-medium;repeat:false;" data-target=".uk-card" data-delay="500">
	@php
	$promoCategories = collect($kategori_slug ?? [])->filter()->unique()->values();
	$promoCategoryList = $promoCategories->implode(',');
	@endphp

	<div class="uk-container">
		<div class="uk-flex uk-flex-between uk-flex-middle uk-margin-medium-bottom">
			<h3 class="uk-margin-remove-bottom uk-h1">Promo</h3>
		</div>

		<div class="uk-ef_blog_posts" data-post-type="promo" data-limit="6"
			data-is-pagination="false" data-mode="slider"
			data-column="uk-width-1-3@m uk-width-1-2@s"
			data-categories="{{ $kategori_slug_implode ?? $promoCategoryList }}"
			data-sort="CreatedDate" data-sort-type="DESC">
			<div class="uk-margin-bottom uk-flex-top uk-flex uk-grid-small" uk-grid>
				<div class="uk-width-expand@m">
					<ul class="uk-visible@m uk-subnav-pill uk-grid-small ef-post-filter uk-flex uk-padding-remove uk-width-1-1"
						data-uk-switcher="" uk-grid role="tablist">
						<li class="uk-active uk-width-auto" role="presentation"><a href="#" data-field="Categories" class="uk-subnav__link" href="#"
								role="tab"
								data-filter="">Semua</a></li>
						@foreach ($promoCategories as $category)
						<li class="uk-width-auto" role="presentation"><a href="#" data-field="Categories"
								class="uk-subnav__link" href="#"
								role="tab"
								data-filter="{{ $category }}">{{ \Illuminate\Support\Str::headline($category) }}</a></li>
						@endforeach
					</ul>

					<select class="uk-hidden@m uk-select ef-post-filter-mobile" aria-label="Pilih kategori promo">
						<option value="">Semua</option>
						@foreach ($promoCategories as $category)
						<option value="{{ $category }}" data-field="Categories"
							data-filter="{{ $category }}">{{ \Illuminate\Support\Str::headline($category) }}</option>
						@endforeach
					</select>
				</div>
				<div class="uk-width-auto@m">
					<a class="uk-button uk-button-text" href="{{ url('/informasi') }}">Lihat Program Lainnya</a>
				</div>
			</div>

			<div class="uk-position-relative uk-slider-container-offset uk-slider-container" uk-slider>
				<ul class="uk-slider-items uk-grid-match uk-grid" uk-grid>
					@forelse ($event as $item)
					@php
					$category = \Illuminate\Support\Str::slug((string) $item->kategori);
					$image = $item->banner ?: $item->thumbnail;
					@endphp
					<li class="uk-width-1-3@m uk-width-1-2@s" data-category="{{ $category }}">
						<a class="uk-link-reset" href="{{ route('detevent', $item->id) }}">
							<div class="uk-card uk-card-default uk-card-small uk-card-hover">
								<div class="uk-card-media-top">
									<img src="{{ $image ? url('/recfil?display=true&rf=' . $image) : asset('frontend/bpremas/images/600x300.jpg') }}"
										alt="{{ $item->title }}" class="uk-width-1-1" loading="lazy">
								</div>
								<div class="is-card-overlay">
									<h3 class="uk-card-title uk-light">{{ $item->title }}</h3>
                                        <p class="uk-margin-remove promo-description">{{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode((string) $item->content)), 160) }}</p>
									<span class="uk-button uk-button-text uk-margin-auto-top">Info Lebih Lanjut</span>
								</div>
								<div class="uk-card-body">
									<h3 class="uk-card-title">{{ $item->title }}</h3>
								</div>
								<div class="uk-card-footer">
									<p class="uk-text-meta uk-text-small uk-margin-remove-top">
										{{ $item->tanggal_tampil ? \Carbon\Carbon::parse($item->tanggal_tampil)->translatedFormat('d F Y') : '-' }}
									</p>
								</div>
							</div>
						</a>
					</li>
					@empty
					<li class="uk-width-1-1">
						<p>Belum ada promo.</p>
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
		const section = document.querySelector('#home-promo');
		if (!section) return;

		const cards = section.querySelectorAll('li[data-category]');
		const filters = section.querySelectorAll('[data-field="Categories"][data-filter]');
		const mobileFilter = section.querySelector('.ef-post-filter-mobile');

		const filterCards = function(category) {
			cards.forEach(function(card) {
				card.hidden = Boolean(category) && card.dataset.category !== category;
			});
		};

		filters.forEach(function(filter) {
			filter.addEventListener('click', function(event) {
				event.preventDefault();
				const category = filter.dataset.filter || '';
				filterCards(category);
				filters.forEach(function(item) {
					item.setAttribute('aria-selected', item === filter ? 'true' : 'false');
				});
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
    #home-promo .promo-description {
        white-space: normal;
        overflow-wrap: anywhere;
        word-break: normal;
    }
</style>
