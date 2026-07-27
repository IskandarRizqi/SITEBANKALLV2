                <div class="uk-section-default  uk-section uk-padding-remove-top uk-padding-remove-bottom uk-padding-remove-vertical"
                	id="home-random-section">
                	<div class="uk-grid uk-grid-stack" data-uk-grid="" data-uk-scrollspy-class="">
                		<div class="uk-width-1-1@m uk-width-1-1@s uk-first-column">
                			<div data-uk-ef_blog_post="post-type-slug:block/random-section;post-type:Block;"
                				class="uk-ef_blog_post" data-ef-uid="ef-uid-1784557196277-34">
                				<div class="blog-main-content content_builder_render"
                					data-ef-uid="ef-uid-1784557196475-41">
                					<div
                						class="uk-section-default  uk-position-relative uk-section uk-padding-remove-top uk-padding-remove-bottom uk-padding-remove-vertical">
                						<div class="uk-position-cover"
                							style="background-color:rgba(245,246,252,1);"></div>
                						<div class="  uk-position-relative uk-panel">
                							<div class="uk-grid-collapse uk-grid uk-grid-stack" data-uk-grid=""
                								data-uk-scrollspy-class="">
                								<div class="uk-width-1-1@m uk-width-1-1@s uk-first-column">
                									<div class="uk-position-relative uk-visible-toggle uk-light uk-slideshow"
                										data-uk-slideshow="" data-animation="fade"
                										data-ratio="false" role="region"
                										ariaroledescription="carousel">

                										<ul class="uk-slideshow-items"
                											data-uk-height-viewport="offset-top:true;offset-bottom:20;"
                											aria-live="polite" role="presentation"
                											id="uk-slideshow-204-items"
                											style="min-height: calc(80vh);">
                											@forelse($baner as $key => $value)
                											<li class="uk-cover-container uk-active uk-transition-active"
                												role="tabpanel" aria-label="1 of 13" tabindex="-1"
                												id="uk-slideshow-204-item-0" style="z-index: -1;">
                												<img data-src="/recfil?display=true&rf={{ $value->url }}"
                													alt="Slider Image Desktop" width="2600"
                													height="800" class="uk-width-1-1 uk-visible@m"
                													uk-img="" uk-cover=""
                													src="/recfil?display=true&rf={{ $value->url }}"
                													style="height: 640px; width: 2079px;">
                												<img data-src="/recfil?display=true&rf={{ $value->url }}"
                													alt="Slider Image Tablet" width="1600"
                													height="600"
                													class="uk-width-1-1 uk-visible@s uk-hidden@m"
                													uk-img="" uk-cover="" loading="lazy"
                													src="/recfil?display=true&rf={{ $value->url }}"
                													style="height: 640px; width: 1707px;">
                												<img data-src="/recfil?display=true&rf={{ $value->url_mobile }}"
                													alt="Slider Image Mobile"
                													class="uk-visible uk-hidden@s" uk-img=""
                													uk-cover="" loading="lazy"
                													src="/recfil?display=true&rf={{ $value->url_mobile }}"
                													style="height: 640px; width: 1280px;">
                											</li>
                											@empty
                											<li class="uk-cover-container uk-active uk-transition-active"
                												role="tabpanel" aria-label="1 of 13" tabindex="-1"
                												id="uk-slideshow-204-item-0" style="z-index: -1;">
                												<img data-src="{{ asset('frontend/bpremas/bnr1.png') }}"
                													alt="Slider Image Desktop" width="2600"
                													height="800" class="uk-width-1-1 uk-visible@m"
                													uk-img="" uk-cover=""
                													src="{{ asset('frontend/bpremas/bnr1.png') }}"
                													style="height: 640px; width: 2079px;">
                												<img data-src="{{ asset('frontend/bpremas/bnr1.png') }}"
                													alt="Slider Image Tablet" width="1600"
                													height="600"
                													class="uk-width-1-1 uk-visible@s uk-hidden@m"
                													uk-img="" uk-cover="" loading="lazy"
                													src="{{ asset('frontend/bpremas/bnr1.png') }}"
                													style="height: 640px; width: 1707px;">
                												<img data-src="{{ asset('frontend/bpremas/bnr1.png') }}"
                													alt="Slider Image Mobile"
                													class="uk-visible uk-hidden@s" uk-img=""
                													uk-cover="" loading="lazy"
                													src="{{ asset('frontend/bpremas/bnr1.png') }}"
                													style="height: 640px; width: 1280px;">
                											</li>
                											<li class="uk-cover-container uk-active uk-transition-active"
                												role="tabpanel" aria-label="1 of 13" tabindex="-1"
                												id="uk-slideshow-204-item-0" style="z-index: -1;">
                												<img data-src="{{ asset('frontend/bpremas/bnr2.png') }}"
                													alt="Slider Image Desktop" width="2600"
                													height="800" class="uk-width-1-1 uk-visible@m"
                													uk-img="" uk-cover=""
                													src="{{ asset('frontend/bpremas/bnr2.png') }}"
                													style="height: 640px; width: 2079px;">
                												<img data-src="{{ asset('frontend/bpremas/bnr2.png') }}"
                													alt="Slider Image Tablet" width="1600"
                													height="600"
                													class="uk-width-1-1 uk-visible@s uk-hidden@m"
                													uk-img="" uk-cover="" loading="lazy"
                													src="{{ asset('frontend/bpremas/bnr2.png') }}"
                													style="height: 640px; width: 1707px;">
                												<img data-src="{{ asset('frontend/bpremas/bnr2.png') }}"
                													alt="Slider Image Mobile"
                													class="uk-visible uk-hidden@s" uk-img=""
                													uk-cover="" loading="lazy"
                													src="{{ asset('frontend/bpremas/bnr2.png') }}"
                													style="height: 640px; width: 1280px;">
                											</li>
                											@endforelse
                										</ul>

                										<div class=" uk-light">
                											<a class="uk-position-center-left uk-position-large uk-slidenav-primary uk-icon uk-slidenav-previous uk-slidenav"
                												href="#" uk-slidenav-previous=""
                												uk-slideshow-item="previous" role="button"
                												aria-controls="uk-slideshow-204-items"
                												aria-label="Previous slide"><svg width="14"
                													height="24" viewBox="0 0 14 24">
                													<polyline fill="none" stroke="#000"
                														stroke-width="1.4"
                														points="12.775,1 1.225,12 12.775,23">
                													</polyline>
                												</svg></a>
                											<a class="uk-position-center-right uk-position-large uk-slidenav-primary uk-icon uk-slidenav-next uk-slidenav"
                												href="#" uk-slidenav-next=""
                												uk-slideshow-item="next" role="button"
                												aria-controls="uk-slideshow-204-items"
                												aria-label="Next slide"><svg width="14" height="24"
                													viewBox="0 0 14 24">
                													<polyline fill="none" stroke="#000"
                														stroke-width="1.4"
                														points="1.225,23 12.775,12 1.225,1">
                													</polyline>
                												</svg></a>
                										</div>
                										<!-- <ul class="uk-position-bottom uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"
                                                            role="tablist">
                                                            <li uk-slideshow-item="0" role="presentation"
                                                                class="uk-active"><a href="" role="tab"
                                                                    aria-controls="uk-slideshow-204-item-0"
                                                                    aria-label="Slide 1" aria-selected="true"></a>
                                                            </li>
                                                            <li uk-slideshow-item="1" role="presentation"><a href=""
                                                                    role="tab"
                                                                    aria-controls="uk-slideshow-204-item-1"
                                                                    aria-label="Slide 2" aria-selected="false"
                                                                    tabindex="-1"></a></li>
                                                            <li uk-slideshow-item="2" role="presentation"><a href=""
                                                                    role="tab"
                                                                    aria-controls="uk-slideshow-204-item-2"
                                                                    aria-label="Slide 3" aria-selected="false"
                                                                    tabindex="-1"></a></li>
                                                            <li uk-slideshow-item="3" role="presentation"><a href=""
                                                                    role="tab"
                                                                    aria-controls="uk-slideshow-204-item-3"
                                                                    aria-label="Slide 4" aria-selected="false"
                                                                    tabindex="-1"></a></li>
                                                            <li uk-slideshow-item="4" role="presentation"><a href=""
                                                                    role="tab"
                                                                    aria-controls="uk-slideshow-204-item-4"
                                                                    aria-label="Slide 5" aria-selected="false"
                                                                    tabindex="-1"></a></li>
                                                            <li uk-slideshow-item="5" role="presentation"><a href=""
                                                                    role="tab"
                                                                    aria-controls="uk-slideshow-204-item-5"
                                                                    aria-label="Slide 6" aria-selected="false"
                                                                    tabindex="-1"></a></li>
                                                            <li uk-slideshow-item="6" role="presentation"><a href=""
                                                                    role="tab"
                                                                    aria-controls="uk-slideshow-204-item-6"
                                                                    aria-label="Slide 7" aria-selected="false"
                                                                    tabindex="-1"></a></li>
                                                            <li uk-slideshow-item="7" role="presentation"><a href=""
                                                                    role="tab"
                                                                    aria-controls="uk-slideshow-204-item-7"
                                                                    aria-label="Slide 8" aria-selected="false"
                                                                    tabindex="-1"></a></li>
                                                            <li uk-slideshow-item="8" role="presentation"><a href=""
                                                                    role="tab"
                                                                    aria-controls="uk-slideshow-204-item-8"
                                                                    aria-label="Slide 9" aria-selected="false"
                                                                    tabindex="-1"></a></li>
                                                            <li uk-slideshow-item="9" role="presentation"><a href=""
                                                                    role="tab"
                                                                    aria-controls="uk-slideshow-204-item-9"
                                                                    aria-label="Slide 10" aria-selected="false"
                                                                    tabindex="-1"></a></li>
                                                            <li uk-slideshow-item="10" role="presentation"><a
                                                                    href="" role="tab"
                                                                    aria-controls="uk-slideshow-204-item-10"
                                                                    aria-label="Slide 11" aria-selected="false"
                                                                    tabindex="-1"></a></li>
                                                            <li uk-slideshow-item="11" role="presentation"><a
                                                                    href="" role="tab"
                                                                    aria-controls="uk-slideshow-204-item-11"
                                                                    aria-label="Slide 12" aria-selected="false"
                                                                    tabindex="-1"></a></li>
                                                            <li uk-slideshow-item="12" role="presentation"><a
                                                                    href="" role="tab"
                                                                    aria-controls="uk-slideshow-204-item-12"
                                                                    aria-label="Slide 13" aria-selected="false"
                                                                    tabindex="-1"></a></li>
                                                        </ul> -->
                									</div>
                								</div>
                							</div>
                						</div>
                					</div>
                				</div>
                			</div>
                		</div>
                	</div>
                </div>