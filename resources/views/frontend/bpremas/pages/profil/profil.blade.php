@extends('frontend.bpremas.layout.main')
@section('content')
<div id="sc-page-wrapper" class="uk-ef_newsletter">
	<div id="sc-page-content" data-uk-lightbox="animation: fade;toggle:a.lightbox-link">
		@php
		$headerImage = asset('frontend/bpremas/ofc1.png');
		$imgstrukturorganisasi1 = asset('frontend/bpremas/sto1.png');
		$imgstrukturorganisasi2= asset('frontend/bpremas/sto2.png');
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
				<div class="uk-grid" data-uk-grid="">
					<div class="uk-width-1-3@m uk-visible@m uk-first-column">
						<div class="uk-sticky-placeholder" style="height: 0px; width: 0px; margin: 0px;"
							hidden=""></div>
						<div class="active-sticky-zero-z-index uk-sticky"
							uk-sticky="end: !.uk-grid;offset:100;media:@m"
							style="position: sticky; top: 100px;">
							<ul class="single-post-subnav uk-nav uk-nav-default"
								uk-switcher="connect:#main-content-single-page;toggle:> li a.ef-content-switch"
								role="tablist" aria-orientation="vertical">
								<li class="uk-active" role="presentation">
									<a class="single-post-subnav-link ef-content-switch" href="#"
										target="" "="" aria-selected=" true" role="tab"
										id="uk-switcher-115-tab-0" aria-controls="uk-switcher-115-tabpanel-0">
										<span class="single-post-subnav-link-icon uk-margin-right"></span>
										Visi
									</a>
									<hr>
								</li>
								<li class="" role="presentation">
									<a class="single-post-subnav-link ef-content-switch" href="#"
										target="" "="" aria-selected=" false" tabindex="-1" role="tab"
										id="uk-switcher-115-tab-1" aria-controls="uk-switcher-115-tabpanel-1">
										<span class="single-post-subnav-link-icon uk-margin-right"></span>
										Manajemen
									</a>
									<hr>
								</li>
								<li class="" role="presentation">
									<a class="single-post-subnav-link ef-content-switch" href="#"
										target="" "="" aria-selected=" false" tabindex="-1" role="tab"
										id="uk-switcher-115-tab-2" aria-controls="uk-switcher-115-tabpanel-2">
										<span class="single-post-subnav-link-icon uk-margin-right"></span>
										Struktur Organisasi
									</a>
									<hr>
								</li>

							</ul>
						</div>
					</div>
					<div class="uk-width-1-1 uk-hidden@m">
						<div class="single-post-subnav-mobile uk-inline uk-width-1-1">
							<button
								class="uk-button uk-button-primary uk-width-1-1 uk-flex uk-flex-between uk-flex-middle"
								type="button" aria-haspopup="true">
								<span>
									Visi
								</span>
								<span uk-drop-parent-icon="" class="uk-icon uk-drop-parent-icon"><svg width="12"
										height="12" viewBox="0 0 12 12">
										<polyline fill="none" stroke="#000" stroke-width="1.1"
											points="1 3.5 6 8.5 11 3.5"></polyline>
									</svg></span>
							</button>
							<div class="uk-card uk-card-body uk-card-default uk-width-1-1 uk-drop"
								uk-drop="mode: click;stretch:x;">
								<ul class="single-post-subnav-mobile-switcher uk-nav uk-nav-default uk-width-1-1"
									uk-switcher="connect:#main-content-single-page;toggle:> * > a.ef-content-switch"
									role="tablist" aria-orientation="vertical">
									<li class="uk-active" role="presentation">
										<a class="ef-content-switch" href="#" aria-selected="true" role="tab"
											id="uk-switcher-119-tab-0"
											aria-controls="uk-switcher-115-tabpanel-0">Visi</a>
									</li>
									<li class="" role="presentation">
										<a class="ef-content-switch" href="#" aria-selected="false"
											tabindex="-1" role="tab" id="uk-switcher-119-tab-1"
											aria-controls="uk-switcher-115-tabpanel-1">Manajemen</a>
									</li>
									<li class="" role="presentation">
										<a class="ef-content-switch" href="#" aria-selected="false"
											tabindex="-1" role="tab" id="uk-switcher-119-tab-2"
											aria-controls="uk-switcher-115-tabpanel-2">Struktur Organisasi</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="uk-width-2-3@m">
						<ul class="uk-switcher" id="main-content-single-page" role="presentation"
							style="touch-action: pan-y pinch-zoom;">
							<li class="uk-active" id="uk-switcher-115-tabpanel-0" role="tabpanel"
								aria-labelledby="uk-switcher-119-tab-0">
								<div data-subnav-id="f9d62121-f0db-46b6-7009-08d9bd6a7f01"
									class="data-uk-content_builder_render blog-subnav-content content_builder_render"
									data-uk-content_builder_render="" data-ef-uid="ef-uid-1784557156798-27">
									<div class="uk-section-default  uk-section uk-padding-remove-top">
										<div class="uk-container   ">
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s uk-first-column">
													<div class="ef-text">
														<h3>Visi Misi</h3>
														<div class="uk-overflow-auto">
															<div class="uk-overflow-auto">
																<div class="uk-overflow-auto">
																	<div class="uk-overflow-auto">
																		<div class="uk-overflow-auto">
																			<div class="uk-overflow-auto">
																				<div class="uk-overflow-auto">
																					<div
																						class="uk-overflow-auto">
																						<table>
																							<thead>
																								<tr>
																									<th>VISI
																									</th>
																									<th>MISI
																									</th>
																								</tr>
																							</thead>
																							<tbody>
																								<tr>
																									<td>
																										<p>MENJADIKAN BPR YANG SEHAT, BERKEMBANG DAN TERPERCAYA
																										</p>
																									</td>
																									<td
																										style="text-align: justify;">
																										<ul>
																											<li>MEMBERIKAN LAYANAN PRIMA DAN SOLUSI TERBAIK DEMI KEPUASAN NASABAH
																											</li>
																											<li>MENGUTAMAKAN PENGHIMPUNAN DANA MASYARAKAT DAN MENYALURKAN KREDIT SEGMEN UMKM
																											</li>
																											<li>MENGEMBANGAKAN SDM YANG PROFESIONAL DALAM BUDAYA ERJA YANG BERSIH, JUJUR DAN BERTANGGUNG JAWAB
																											</li>
																											<li>MENYELENGGARAKAN OPERASIONAL BANK YANG SEHAT SESUAI STANDAR PERBANKAN YANG BERLAKU
																											</li>
																										</ul>
																									</td>
																								</tr>
																							</tbody>
																						</table>
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
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s uk-first-column">
													<div class="ef-text">
														<h3>Profil Perusahaan</h3>
														<div class="uk-overflow-auto">
															<div class="uk-overflow-auto">
																<div class="uk-overflow-auto">
																	<div class="uk-overflow-auto">
																		<div class="uk-overflow-auto">
																			<div class="uk-overflow-auto">
																				<div class="uk-overflow-auto">
																					<div
																						class="uk-overflow-auto">
																						<table class="table"
																							cellspacing="5">
																							<thead>
																								<tr>
																									<th style="text-align: center;"
																										scope="col">
																										Nama
																										Perusahaan
																									</th>
																									<th style="text-align: center;"
																										scope="col">
																										BPR Enggal Makmur Adi Santoso
																									</th>
																								</tr>
																							</thead>
																							<tbody>
																								<tr>
																									<td
																										scope="col">
																										Nama
																										Panggilan
																									</td>
																									<td>bpr emas
																									</td>
																								</tr>
																								<tr>
																									<td
																										scope="col">
																										Bidang
																										Usaha
																									</td>
																									<td>Perbankan
																									</td>
																								</tr>
																								<tr>
																									<td
																										scope="col">
																										Dasar
																										Hukum
																										Pendirian
																									</td>
																									<td>akta nomor 135 tanggal 16 Juni 1990 oleh Notaris Liliana Tedjosaputro, SH dan telah mendapat persetujuan dari Menteri Kehakiman Republik Indonesia tertanggal 5 Agustus 1991 nomor : C2-3617 HT.01.04.TH.91, Surat Keputusan Mentri Keuangan Republik Indonesia Nomor KEP.306/KM.13/1991, tertanggal 7 Oktober 1991. PT BPR Enggal Makm ur Adi Santoso Kendal beralamat di jalan Raya Kaliwungu No 300 Kecamatan Kaliwungu Kabupaten Kendal Jawa Tengah.
																									</td>
																								</tr>
																								<tr>
																									<td
																										scope="col">
																										Tanggal
																										Pendirian
																									</td>
																									<td>16 Juni 1990
																									</td>
																								</tr>
																								<tr>
																									<td
																										scope="col">
																										Kepemilikan
																									</td>
																									<td>
																										<ul>
																											<li>
																											</li>
																											<li>
																											</li>
																											<li>
																											</li>
																											<li>
																											</li>
																											<li>
																											</li>
																										</ul>
																									</td>
																								</tr>
																								<tr>
																									<td
																										scope="col">
																										Modal
																										Dasar
																									</td>
																									<td>Rp12.000.000.000,-
																									</td>
																								</tr>
																								<tr>
																									<td
																										scope="col">
																										Modal Di
																										tempatkan
																										dan
																										disetor
																										penuh
																									</td>
																									<td>
																									</td>
																								</tr>
																								<tr>
																									<td
																										scope="col">
																										Website
																									</td>
																									<td>
																									</td>
																								</tr>
																								<tr>
																									<td
																										scope="col">
																										Email
																										Perusahaan
																									</td>
																									<td>
																									</td>
																								</tr>
																								<tr>
																									<td>Email
																										Pengaduan
																										Nasabah
																									</td>
																									<td>
																									</td>
																								</tr>

																								<tr>
																									<td
																										scope="col">
																										Alamat
																										Korespondensi
																									</td>
																									<td>

																										<ul>

																											<li>Jl Raya Kaliwungu No 300 <br>
																												Kec. Kaliwungu
																												<br>
																												Kab. Kendal
																												<br>
																												Jawa Tengah
																											</li>
																											<li>Tel
																												:
																												0294 - 381629
																											</li>
																											<li>WhatsApp
																												:
																												081327665038
																											</li>
																											<li>Website
																												:
																												https://enggalmakmuradisantoso.com/
																											</li>
																											<li>Email
																												:

																											</li>
																										</ul>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<p style="text-align: center;"><a
																class="uk-button uk-button-primary" hidden=""
																href="./files_2023_12_bank-bjb-company-profile_pdf.html"
																target="_blank" rel="noopener">Unduh Profil
																Selengkapnya</a></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="" id="uk-switcher-115-tabpanel-1" role="tabpanel"
								aria-labelledby="uk-switcher-119-tab-1">
								<!-- <div data-subnav-id="050dcdb6-dd07-400a-700a-08d9bd6a7f01"
									class="data-uk-content_builder_render blog-subnav-content content_builder_render"
									data-uk-content_builder_render="" data-ef-uid="ef-uid-1784557156798-28">
									<div class="uk-section-default  uk-section uk-padding-remove-top">
										<div class="uk-container   ">
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="ef-text">
														<h3>Direksi</h3>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-3@m uk-width-1-1@s    ">
													<div class="uk-navbar-item nav-overlay ">
														<a href="./index.html">
															<img class="uk-flex-center normal-logo"
																src="./images/img_bod-web-ayi-subarna_230.webp"
																width="">
														</a>
													</div>
												</div>
												<div class="uk-width-2-3@m uk-width-1-1@s    ">
													<div class="ef-text">
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: 18pt;"><strong>Ayi
																			Subarna<br></strong></span><span
																		style="font-size: medium;">Direktur
																		Utama</span><br></span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Warga Negara
																		Indonesia, lahir di Bandung pada Tahun
																		1975. Meraih gelar Sarjana di Fakultas
																		Ekonomi jurusan Manajemen dari STIE
																		INABA Bandung pada tahun
																		2008.</span></span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Jabatan lain
																		yang pernah atau sedang dipegang antara
																		lain :</span></span></span></p>
														<ul>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Direktur
																			Operasional dan Teknologi Informasi
																			bank bjb (2025 -
																			2026)</span></span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Pj.
																			Pemimpin Divisi Corporate Secretary
																			bank bjb,
																			(2024-2025)</span></span></span>
															</li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Pemimpin
																			Kantor Cabang Soreang bank bjb,
																			(2023 - 2024)</span></span></span>
															</li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Pemimpin
																			Kantor Cabang Cimahi bank bjb (2021
																			– 2023)</span></span></span></li>
														</ul>
													</div>
												</div>
											</div>
											<div class="uk-margin-medium uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="uk-tile-default  uk-tile uk-padding-remove">
														<div class="ef-text">
															<hr>
														</div>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-3@m uk-width-1-1@s    ">
													<div class="uk-navbar-item nav-overlay ">
														<a href="./index.html">
															<img class="uk-flex-center normal-logo"
																src="./images/img_bod-web-asep-dani-fadilah_231.webp"
																width="">
														</a>
													</div>
												</div>
												<div class="uk-width-2-3@m uk-width-1-1@s    ">
													<div class="ef-text">
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: 18pt;"><strong>Asep
																			Dani
																			Fadillah<br></strong></span><span
																		style="font-size: medium;">Direktur
																		Kepatuhan</span><br></span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Warga Negara
																		Indonesia, Lahir pada tahun 1971. Meraih
																		gelar Sarjana di bidang Manajemen dari
																		Universitas STIE Kuningan pada tahun
																		2000, Meraih gelar Magister di bidang
																		Manajemen dari Universitas STIE Ganesha
																		pada tahun 2003 dan Meraih gelar
																		Magister di bidang Hukum Ekonomi dari
																		Universitas Pasundan - Bandung pada
																		tahun 2018. </span></span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Jabatan lain
																		yang pernah atau sedang dipegang antara
																		lain :</span></span></span></p>
														<ul>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Menjabat
																			sebagai SEVP Enterprise Risk bank
																			bjb (2024 – 2026)
																		</span></span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Pemimpin
																			Divisi Manajemen Risiko bank bjb
																			(2019 - 2023)</span></span></span>
															</li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Pemimpin
																			Divisi Hukum bank bjb (2018 - 2019)
																		</span></span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Pemimpin
																			Divisi Manajemen Anak Perusahaan
																			bank bjb (2018 - 2018)
																		</span></span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Pemimpin
																			Divisi Umum bank bjb (2017 - 2018)
																		</span></span></span></li>
														</ul>
													</div>
												</div>
											</div>
											<div class="uk-margin-medium uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="uk-tile-default  uk-tile uk-padding-remove">
														<div class="ef-text">
															<hr>
														</div>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-3@m uk-width-1-1@s    ">
													<div class="uk-navbar-item nav-overlay ">
														<a href="./index.html">
															<img class="uk-flex-center normal-logo"
																src="./images/img_bod-web-hana-dartiwan_232.webp"
																width="">
														</a>
													</div>
												</div>
												<div class="uk-width-2-3@m uk-width-1-1@s    ">
													<div class="ef-text">
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;"><span
																			style="font-size: 18pt;"><strong>Hana
																				Dartiwan</strong></span><br>Direktur
																		Keuangan</span></span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Warga Negara
																		Indonesia. Lahir di Tasikmalaya pada
																		tahun 1970. Meraih gelar Sarjana Teknik
																		Industri di Universitas Islam Bandung
																		pada tahun 1996 dan Meraih gelar
																		Magister Manajemen Keuangan di
																		Universitas Padjajaran pada tahun
																		2009.</span></span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Jabatan lain
																		yang pernah atau sedang dipegang antara
																		lain :</span></span></span></p>
														<ul>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Komisaris
																			bjb Sekuritas (2023 - Juli
																			2024)</span></span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Anggota
																			Dewan Pengawas Dana Pensiun bank bjb
																			(2022 - Juli
																			2024)</span></span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Pemimpin
																			Divisi Treasury bank bjb (2018 –
																			Juli 2024)</span></span></span></li>
														</ul>
													</div>
												</div>
											</div>
											<div class="uk-margin-medium uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="uk-tile-default  uk-tile uk-padding-remove">
														<div class="ef-text">
															<hr>
														</div>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-3@m uk-width-1-1@s    ">
													<div class="uk-navbar-item nav-overlay ">
														<a href="./index.html">
															<img class="uk-flex-center normal-logo"
																src="./images/img_bod-web-mulyana_233.webp"
																width="">
														</a>
													</div>
												</div>
												<div class="uk-width-2-3@m uk-width-1-1@s    ">
													<div class="ef-text">
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;"><strong><span
																				style="font-size: 18pt;">Mulyana</span></strong><br>Direktur
																		Korporasi dan UMKM</span></span></span>
														</p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Warga Negara
																		Indonesia. Lahir di Bandung pada tahun
																		1971. Meraih gelar Sarjana Manajemen di
																		STIE INABA pada tahun
																		2001.</span></span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Jabatan lain
																		yang pernah atau sedang dipegang antara
																		lain :</span></span></span></p>
														<ul>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Pemimpin
																			Divisi Kebijakan dan Prosedur bank
																			bjb, (2023 –
																			2025)</span></span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Pemimpin
																			Kantor Cabang Cikarang bank bjb,
																			(Februari 2023 – September
																			2023)</span></span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Pemimpin
																			Kantor Cabang Purwakarta bank bjb,
																			(2022 – 2023)</span></span></span>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="ef-text">
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-3@m uk-width-1-1@s    ">
													<div class="uk-navbar-item nav-overlay ">
														<a href="./index.html">
															<img class="uk-flex-center normal-logo"
																src="./images/img_bod-web-nunung-suhartini_234.webp"
																width="">
														</a>
													</div>
												</div>
												<div class="uk-width-2-3@m uk-width-1-1@s    ">
													<div class="ef-text">
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;"><span
																			style="font-size: 18pt;"><strong>Nunung
																				Suhartini</strong></span><br>Direktur
																		Konsumer dan Ritel</span></span></span>
														</p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Warga Negara
																		Indonesia. Lahir di Bandung pada tahun
																		1971. Meraih gelar Sarjana Manajemen SDM
																		di STIA LAN RI Bandung pada tahun 2002
																		dan Meraih gelar Magister Manajemen
																		Pemasaran Universitas Pasundan pada
																		tahun 2004.</span></span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Jabatan lain
																		yang pernah atau sedang dipegang antara
																		lain :</span></span></span></p>
														<ul>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Pemimpin
																			Divisi Jaringan dan Layanan bank
																			bjb, (2022 –
																			2025)</span></span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">CEO
																			Regional 3 bank bjb, (2019 –
																			2022)</span></span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Pemimpin
																			Kantor Cabang Saharjo bank bjb,
																			(Januari 2019 – September
																			2019)</span></span></span></li>
														</ul>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="ef-text">
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-3@m uk-width-1-1@s    ">
													<div class="uk-navbar-item nav-overlay ">
														<a href="./index.html">
															<img class="uk-flex-center normal-logo"
																src="./images/img_bod-web-muhammad-asadi-budiman_235.webp"
																width="">
														</a>
													</div>
												</div>
												<div class="uk-width-2-3@m uk-width-1-1@s    ">
													<div class="ef-text">
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;"><span
																			style="font-size: 18pt;"><strong>Muhammad
																				As'adi
																				Budiman</strong></span><br>Direktur
																		Teknologi Informasi</span></span></span>
														</p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Warga Negara
																		Indonesia, Lahir pada tahun 1981. Meraih
																		gelar Sarjana di bidang Ekonomi dan
																		Studi Pembangunan dari Universitas
																		Padjadjaran Bandung pada tahun 2004 dan
																		Meraih gelar Magister di bidang Ekonomi
																		dari Universitas Padjadjaran Bandung
																		pada tahun 2009. </span></span></span>
														</p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Jabatan lain
																		yang pernah atau sedang dipegang antara
																		lain :</span></span></span></p>
														<ul>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Menjabat
																			sebagai SEVP Korporasi &amp;
																			Komersial bank bjb (2025 – 2026)
																		</span></span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Menjabat
																			sebagai SEVP Treasury &amp;
																			International Banking bank bjb (2024
																			– 2025) </span></span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Menjabat
																			sebagai Pemimpin Divisi Keuangan
																			bank bjb (2020 –
																			2024)</span></span></span></li>
														</ul>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="ef-text">
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-3@m uk-width-1-1@s    ">
													<div class="uk-navbar-item nav-overlay ">
														<a href="./index.html">
															<img class="uk-flex-center normal-logo"
																src="./images/img_bod-web-herfinia_236.webp"
																width="">
														</a>
													</div>
												</div>
												<div class="uk-width-2-3@m uk-width-1-1@s    ">
													<div class="ef-text">
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;"><span
																			style="font-size: 18pt;"><strong>Herfinia</strong></span><br>Direktur
																		Operasional</span></span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Warga Negara
																		Indonesia, lahir di Bandung pada tahun
																		1975. Meraih gelar Sarjana di bidang
																		Ekonomi Pertanian dari Universitas
																		Padjajaran pada tahun 1999 dan Meraih
																		gelar Magister di Bidang Pertanian dari
																		Universitas Padjajaran pada tahun
																		2004.</span></span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Jabatan lain
																		yang pernah atau sedang dipegang antara
																		lain :</span></span></span></p>
														<ul>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Pemimpin
																			Divisi Corporate Secretary bank bjb
																			(2025 - 2026)</span></span></span>
															</li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Pemimpin
																			Unit Dana Pensiun Lembaga Keuangan
																			bank bjb (2020 –
																			2025)</span></span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Pemimpin
																			Grup Rekrutmen &amp; Pengembangan
																			bank bjb (2015 -
																			2020)</span></span></span></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="uk-section-default  uk-section">
										<div class="uk-container   ">
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="ef-text">
														<h3>Dewan Komisaris</h3>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-3@m uk-width-1-1@s    ">
													<div class="uk-navbar-item nav-overlay ">
														<a href="./index.html">
															<img class="uk-flex-center normal-logo"
																src="./images/img_boc-web-susi-pudjiastuti_237.webp"
																width="">
														</a>
													</div>
												</div>
												<div class="uk-width-2-3@m uk-width-1-1@s    ">
													<div class="ef-text">
														<p><span style="color: #000000; font-size: 18pt;"><span
																	style="font-family: Myriad Pro, sans-serif;"><strong>Susi
																		Pudjiastuti<br></strong></span></span><span
																style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Komisaris
																		Utama Independen*</span></span></span>
														</p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Warga Negara
																		Indonesia, berdomisili di Kabupaten
																		Pangandaran, berusia 61
																		tahun.</span></span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Jabatan lain
																		yang pernah atau sedang dipegang antara
																		lain :</span></span></span></p>
														<ul>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">CEO PT
																			ASI Pudjiastuti Aviation (2005 s.d.
																			saat ini)</span></span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Menteri
																			Kelautan dan Perikanan Republik
																			Indonesia (2014 s.d.
																			2019)</span></span></span></li>
														</ul>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Riwayat
																		pendidikan antara
																		lain:</span></span></span></p>
														<ul>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Doktor
																			Honoris Causa, Universitas
																			Diponegoro
																			(2016)</span></span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Doktor
																			Honoris Causa, Institut Teknologi
																			Surabaya (2017)</span></span></span>
															</li>
														</ul>
														<p><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">*Berlaku
																		efektif sejak persetujuan dari Otoritas
																		Jasa Keuangan atas Penilaian Kemampuan
																		dan Kepatutan (PKK) dan memenuhi
																		ketentuan perundang-undangan yang
																		berlaku.</span></span></span></p>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="ef-text">
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-3@m uk-width-1-1@s    ">
													<div class="uk-navbar-item nav-overlay ">
														<a href="./index.html">
															<img class="uk-flex-center normal-logo"
																src="./images/img_boc-web-novian-herodwijanto_238.webp"
																width="">
														</a>
													</div>
												</div>
												<div class="uk-width-2-3@m uk-width-1-1@s    ">
													<div class="ef-text">
														<p class="western"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;"><span
																			style="font-size: 18pt;"><strong>Novian
																				Herodwijanto</strong></span><br></span></span></span><span
																style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;">Komisaris
																	Independen bank bjb</span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;">Warga
																	Negara Indonesia. Lahir di Temanggung pada
																	tahun 1967. Meraih gelar Sarjana Ekonomi
																	Akuntansi di Universitas Gajah Mada pada
																	tahun 1993 dan Meraih gelar Magister
																	Manajemen di Universitas Gajah Mada pada
																	tahun 2000.</span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;">Jabatan
																	lain yang pernah atau sedang dipegang antara
																	lain :</span></span></p>
														<ul>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;">Staf
																		Ahli Bidang BUMN, BUMD, dan Kekayaan
																		Negara / Daerah yang Dipisahkan Lainnya
																		(2020 - Januari 2025). </span></span>
															</li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;">Auditor
																		Utama Keuangan Negara V, (2019 - 2020)
																	</span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;">Auditor
																		Utama Keuangan Negara II, (2018 - 2019)
																	</span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;">Kepala
																		BPK Perwakilan Provinsi Jawa Timur,
																		(2016 - 2018) </span></span></li>
														</ul>
													</div>
												</div>
											</div>
											<div class="uk-margin-medium uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="ef-text">
														<hr>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-3@m uk-width-1-1@s    ">
													<div class="uk-navbar-item nav-overlay ">
														<a href="./index.html">
															<img class="uk-flex-center normal-logo"
																src="./images/img_boc_239.webp" width="">
														</a>
													</div>
												</div>
												<div class="uk-width-2-3@m uk-width-1-1@s    ">
													<div class="ef-text">
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;"><strong><span
																				style="font-size: 18pt;">Eydu
																				Oktain
																				Panjaitan</span><br></strong></span></span></span><span
																style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Komisaris
																		Independen*</span></span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Warga Negara
																		Indonesia, lahir pada tahun 1969,
																		berdomisili di Jakarta. Meraih gelar
																		Sarjana Akuntansi dari Universitas
																		Gadjah Mada pada tahun 1995 dan Meraih
																		gelar Magister Akuntansi dari
																		Universitas Gadjah Mada pada tahun
																		2001.</span></span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">Jabatan lain
																		yang pernah atau sedang dipegang antara
																		lain :</span></span></span></p>
														<ul>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Kepala
																			BPK Perwakilan Provinsi Jawa Barat
																			(2025 s.d.
																			sekarang)</span></span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Kepala
																			BPK Perwakilan Provinsi Sumatera
																			Utara (2020 s.d.
																			2025)</span></span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;"><span
																			style="font-size: medium;">Kepala
																			BPK Perwakilan Provinsi Sulawesi
																			Barat (2017 s.d.
																			2020)</span></span></span></li>
														</ul>
														<p><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;">*Berlaku
																		efektif sejak persetujuan dari Otoritas
																		Jasa Keuangan atas Penilaian Kemampuan
																		dan Kepatutan (PKK) dan memenuhi
																		ketentuan perundang-undangan yang
																		berlaku.</span></span></span></p>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="ef-text">
														<hr>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-3@m uk-width-1-1@s    ">
													<div class="uk-navbar-item nav-overlay ">
														<a href="./index.html">
															<img class="uk-flex-center normal-logo"
																src="./images/img_boc-web-rudie-kusmayadi_240.webp"
																width="">
														</a>
													</div>
												</div>
												<div class="uk-width-2-3@m uk-width-1-1@s    ">
													<div class="ef-text">
														<p class="western"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;"><span
																			style="font-size: 18pt;"><strong>Rudie
																				Kusmayadi</strong></span><br></span></span></span><span
																style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;">Komisaris
																	bank bjb</span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;">Warga
																	Negara Indonesia, Lahir di Ciamis tahun
																	1958, Menyelesaikan pendidikan Bachelor of
																	Engineering di Akademi Teknik Pekerjaan Umum
																	tahun 1982, Pendidikan Sarjana Manajemen
																	Pembangunan Daerah STIA LAN Tahun 2001 dan
																	Pendidikan Pasca Sarjana Manajemen
																	Pembangunan Daerah dari STIA LAN Tahun
																	2004.</span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;">Menjabat
																	Komisaris bank bjb sejak 9 Agustus 2023.
																	Jabatan yang pernah atau sedang dipegang
																	antara lain:</span></span></p>
														<ul>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;">Direktur
																		Utama Perumda Air Minum Tirta Raharja
																		(2009 – 2023)</span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;">Plt
																		Direktur Utama Perumda Air Minum Tirta
																		Raharja (2007 – 2009)</span></span></li>
														</ul>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="ef-text">
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-3@m uk-width-1-1@s    ">
													<div class="uk-navbar-item nav-overlay ">
														<a href="./index.html">
															<img class="uk-flex-center normal-logo"
																src="./images/img_boc-web-herman-suryatman_241.webp"
																width="">
														</a>
													</div>
												</div>
												<div class="uk-width-2-3@m uk-width-1-1@s    ">
													<div class="ef-text">
														<p><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;"><span
																		style="font-size: medium;"><strong><span
																				style="font-size: x-large;">Herman
																				Suryatman</span></strong><br>Komisaris
																		bank bjb</span></span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;">Warga
																	Negara Indonesia. Lahir di Sumedang pada
																	tahun 1970. Menyelesaikan pendidikan di
																	Sekolah Tinggi Pemerintahan Dalam Negeri
																	1992, Institut Pemerintahan Politik
																	Pemerintahan 1999, menyelesaikan pendidikan
																	Magister Manajemen Keuangan, Universitas
																	Padjajaran 2019, menyelesaikan pendidikan
																	Doktoral Ilmu Pemerintahan, Institut
																	Pemerintahan Politik Dalam Negeri
																	2024</span></span></p>
														<p align="justify"><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;">Jabatan
																	lain yang pernah atau sedang dipegang antara
																	lain :</span></span></p>
														<ul>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;">Sekretaris
																		Daerah Provinsi Jawa Barat (April 2024 -
																		Sekarang) </span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;">Penjabat
																		Bupati Kabupaten Sumedang (September
																		2023 - April 2024) </span></span></li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;">Sekretaris
																		Daerah Kabupaten Sumedang
																		(2019-September 2023) </span></span>
															</li>
															<li><span style="color: #000000;"><span
																		style="font-family: Myriad Pro, sans-serif;">Sekretaris
																		Deputi Bidang SDM Aparatur Pada
																		Kementerian PAN RB, (2017 - 2019)
																	</span></span></li>
														</ul>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="ef-text">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class=" uk-section">
										<div class="uk-grid uk-grid-stack" data-uk-grid=""
											data-uk-scrollspy-class="">
											<div class="uk-width-1-3@m uk-width-1-1@s    ">
												<div class="uk-navbar-item nav-overlay ">
													<a href="./index.html">
														<img class="uk-flex-center normal-logo"
															src="./images/img_boc-web-tomsi-tohir_242.png"
															width="">
													</a>
												</div>
											</div>
											<div class="uk-width-2-3@m uk-width-1-1@s    ">
												<div class="ef-text">
													<p class="western"><span style="color: #000000;"><span
																style="font-family: Myriad Pro, sans-serif;"><span
																	style="font-size: medium;"><span
																		style="font-size: 18pt;"><strong>Tomsi
																			Tohir</strong></span><br></span></span></span><span
															style="color: #000000;"><span
																style="font-family: Myriad Pro, sans-serif;">Komisaris
																bank bjb</span></span></p>
													<p align="justify"><span style="color: #000000;"><span
																style="font-family: Myriad Pro, sans-serif;">Warga
																Negara Indonesia, Lahir di Tanjung Karang Tahun
																1969, Menyelesaikan pendidikan Akademi
																Kepolisian pada Tahun 1990 dan Menyelesakan
																pendidikan Magister Police Science di
																Universitas Indonesia Tahun 2001</span></span>
													</p>
													<p align="justify"><span style="color: #000000;"><span
																style="font-family: Myriad Pro, sans-serif;">Menjabat
																Komisaris bank bjb sejak 9 Agustus 2023. Jabatan
																yang pernah atau sedang dipegang antara
																lain:</span></span></p>
													<ul>
														<li><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;">Sekertaris
																	Jenderal Kementerian Dalam Negeri (Februari
																	2025 - Sekarang) </span></span></li>
														<li><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;">Inspektur
																	Jenderal Kementerian Dalam Negeri (2022 –
																	Februari 2025) </span></span></li>
														<li><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;">Staff
																	Ahli Bidang Sosial Politik Kapolri (2020 –
																	2022) </span></span></li>
														<li><span style="color: #000000;"><span
																	style="font-family: Myriad Pro, sans-serif;">Kapolda
																	Nusa Tenggara Barat (2019 – 2020)
																</span></span></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="uk-grid uk-grid-stack" data-uk-grid=""
											data-uk-scrollspy-class="">
											<div class="uk-width-1-1@m uk-width-1-1@s    ">
												<div class="ef-text">
													<hr>
												</div>
											</div>
										</div>
									</div>
									<div class=" uk-section">
										<div class="uk-grid uk-grid-stack" data-uk-grid=""
											data-uk-scrollspy-class="">
											<div class="uk-width-1-1@m uk-width-1-1@s    ">
												<div class="ef-text">
													<hr>
												</div>
											</div>
										</div>
									</div>
								</div> -->
							</li>
							<li class="" id="uk-switcher-115-tabpanel-2" role="tabpanel"
								aria-labelledby="uk-switcher-119-tab-2">
								<div data-subnav-id="91583f82-2118-4d1c-700b-08d9bd6a7f01"
									class="data-uk-content_builder_render blog-subnav-content content_builder_render"
									data-uk-content_builder_render="" data-ef-uid="ef-uid-1784557156799-29">
									<div class="uk-section-default  uk-section uk-padding-remove-top">
										<div class="uk-container   ">
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="ef-text">
														<h3>Struktur Organisasi</h3>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="">
														<div class="is-gallery is-ratio-auto uk-child-width-1-1 uk-grid uk-grid-stack"
															data-uk-grid="" data-uk-lightbox="animation: fade">
															<div class="">
																<img src="{{$imgstrukturorganisasi1}}"
																	alt="" class="uk-width-1-1" uk-image="{{$imgstrukturorganisasi1}}">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="">
														<div class="is-gallery is-ratio-auto uk-child-width-1-1 uk-grid uk-grid-stack"
															data-uk-grid="" data-uk-lightbox="animation: fade">
															<div class="">
																<img src="{{$imgstrukturorganisasi2}}"
																	alt="" class="uk-width-1-1" uk-image="{{$imgstrukturorganisasi2}}">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="uk-section-default  uk-section uk-padding-remove-vertical">
										<div class="uk-container   ">
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="uk-tile-default  uk-tile uk-padding-remove">
														<div class="ef-text">
															<style>
																.is-ratio-7-5 img {
																	aspect-ratio: auto;
																}
															</style>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="" id="uk-switcher-115-tabpanel-3" role="tabpanel"
								aria-labelledby="uk-switcher-119-tab-3">
								<div data-subnav-id="da5853f1-2f8a-47f9-5e7a-08d9bd98b8f0"
									class="data-uk-content_builder_render blog-subnav-content content_builder_render"
									data-uk-content_builder_render="" data-ef-uid="ef-uid-1784557156799-30">
									<div class="uk-section-default  uk-section uk-padding-remove-top">
										<div class="uk-container uk-container-small   ">
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="ef-text">
														<h3>Etika Perusahaan bank bjb</h3>
														<p style="text-align: justify;">Dalam rangka mendukung
															pencapaian visi dan misi
															bank&nbsp;<strong>bjb</strong> untuk berkinerja baik
															di Indonesia, bank <strong>bjb</strong> telah
															melakukan beberapa perubahan, salah satunya
															transformasi budaya perusahaan. Budaya perusahaan
															tersebut mencerminkan semangat bank
															<strong>bjb</strong> dalam menghadapi persaingan
															perbankan yang semakin ketat dan dinamis.
															Nilai-nilai budaya perusahaan (corporate values)
															yang telah dirumuskan yaitu GO SPIRIT yang merupakan
															perwujudan dari Service
															Excellence,&nbsp;Professionalism,&nbsp;Integrity,&nbsp;Respect,&nbsp;Innovation,&nbsp;Trust
															yang dijabarkan dalam 12 perilaku utama :
														</p>
													</div>
												</div>
											</div>
											<div class="uk-container uk-container-xsmall uk-margin ">
												<div class="uk-grid uk-grid-stack" data-uk-grid=""
													data-uk-scrollspy-class="">
													<div class="uk-width-1-1@m uk-width-1-1@s    ">
														<div class="uk-tile-default  uk-tile uk-tile-small">
															<div class="">
																<div class="is-gallery is-ratio-1-1 uk-child-width-1-1 uk-grid uk-grid-stack"
																	data-uk-grid=""
																	data-uk-lightbox="animation: fade">
																	<div class="">
																		<a tabindex="0"
																			class="uk-inline uk-light uk-visible-toggle"
																			href="./files__2021_12_19110110-181119035149-2_jpeg.html"
																			data-caption="" role="button">
																			<img src="./images/img_19110110-181119035149-2_244.jpeg"
																				alt="" class="uk-width-1-1"
																				uk-image="">
																			<div
																				class="uk-overlay-primary uk-position-cover uk-hidden-hover uk-transition-fade">
																				<div class="uk-position-center">
																					<span uk-overlay-icon=""
																						class="uk-icon uk-overlay-icon"><svg
																							width="40"
																							height="40"
																							viewBox="0 0 40 40">
																							<rect x="19" y="0"
																								width="1"
																								height="40">
																							</rect>
																							<rect x="0" y="19"
																								width="40"
																								height="1">
																							</rect>
																						</svg></span>
																				</div>
																			</div>
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="ef-text">
														<p>Adapun panduan untuk pelaksanaan budaya perusahaan
															ini telah tersusun dalam Pedoman Budaya Perusahaan
															bank&nbsp;<strong>bjb</strong>.</p>
														<p>Bank&nbsp;<strong>bjb</strong>&nbsp;telah melakukan
															beberapa langkah sebagai upaya internalisasi
															corporate values yang berada di bawah koordinasi
															Divisi&nbsp;<em>Human Capital</em>. Proses
															internalisasi tersebut dibantu oleh Tim
															Internalisasi Budaya beserta para Change Leaders,
															Change Coordinator dan Change Agents yang telah
															ditunjuk di setiap unit kerja dengan salah satu
															fungsinya yaitu melakukan internalisasi budaya
															perusahaan kepada unit kerjanya masing-masing.
															Program-program yang telah dilaksanakan
															oleh&nbsp;<em>Divisi Human Capital</em>&nbsp;antara
															lain :</p>
														<ul>
															<li>Perumusan dan Penetapan Nilai-Nilai Budaya
																Perusahaan bank&nbsp;<strong>bjb</strong>.</li>
															<li>Pembentukan tim Internalisasi Budaya di setiap
																unit kerja yang terdiri dari Tim Internalisasi
																Budaya,&nbsp;<em>Change
																	Leaders</em>,&nbsp;<em>Change
																	Coordinator</em>,&nbsp;<em>Change
																	Agents</em>&nbsp;dan Change Target
																serta&nbsp;<em>Divisi Human
																	Capital</em>&nbsp;sebagai divisi yang
																menjadi koordinator dalam proses internalisasi
																budaya secara keseluruhan.</li>
															<li>Sosialisasi Program-Program Budaya Perusahaan
																bank&nbsp;<strong>bjb</strong>&nbsp;baik secara
																On site maupun melalui media cetak dan
																elektronik.</li>
															<li>Eksternalisasi Program Budaya Perusahaan
																bank&nbsp;<strong>bjb</strong>.<br>Penguatan
																Budaya Perusahaan
																bank&nbsp;<strong>bjb</strong>.</li>
															<li>Training dan up-skilling kepada Change Leaders,
																Change Coordinator &amp; Change Agents.</li>
															<li>Survey Budaya Perusahaan untuk mengetahui dan
																mengevaluasi tingkat pengetahuan, pemahaman,
																persepsi kepentingan, dan keyakinan para pegawai
																terhadap proses transformasi organisasi dan
																budaya perusahaan.</li>
															<li>Pengukuran Budaya Perusahaan untuk mengetahui
																tingkat kesehatan budaya perusahaan pada
																masing-masing unit kerja.</li>
														</ul>
														<p>Proses perubahan budaya bukanlah suatu hal yang
															mudah, namun dengan adanya komitmen yang kuat dari
															seluruh jajaran organisasi
															bank&nbsp;<strong>bjb</strong>&nbsp;terutama top
															management, dapat dipastikan pencapaian visi dan
															misi bank bjb melalui transformasi budaya perusahaan
															dapat terwujud dengan baik.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="uk-section-default  uk-section uk-padding-remove-vertical">
										<div class="uk-grid uk-grid-stack" data-uk-grid=""
											data-uk-scrollspy-class="">
											<div class="uk-width-1-1@m uk-width-1-1@s    ">
												<div class="uk-tile-default  uk-tile uk-padding-remove">
													<div class="ef-text">
														<style>
															.is-ratio-1-1 img {
																aspect-ratio: auto;
															}
														</style>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="" id="uk-switcher-115-tabpanel-4" role="tabpanel"
								aria-labelledby="uk-switcher-119-tab-4">
								<div data-subnav-id="b3fd60ea-3b16-409f-5e7b-08d9bd98b8f0"
									class="data-uk-content_builder_render blog-subnav-content content_builder_render"
									data-uk-content_builder_render="" data-ef-uid="ef-uid-1784557156799-31">
									<div class="uk-section-default  uk-section uk-padding-remove-top">
										<div class="uk-container uk-container-small   ">
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-1@m uk-width-1-1@s    ">
													<div class="ef-text">
														<h3>Sekretaris Perusahaan</h3>
													</div>
												</div>
											</div>
											<div class="uk-grid uk-grid-stack" data-uk-grid=""
												data-uk-scrollspy-class="">
												<div class="uk-width-1-3@m uk-width-1-1@s    ">
													<div class="uk-navbar-item nav-overlay ">
														<a href="./index.html">
															<img class="uk-flex-center normal-logo"
																src="./images/img_corporate-secretary-irwan-risw_245.jpg"
																width="">
														</a>
													</div>
												</div>
												<div class="uk-width-2-3@m uk-width-1-1@s    ">
													<div class="ef-text">
														<p style="text-align: justify;" align="left"><span
																style="font-family: 'Myriad Pro', sans-serif; font-size: 12pt;"><span
																	style="font-size: 18pt;"><strong><span
																			style="color: #222222;">Irwan
																			Riswandi&nbsp;</span></strong></span><br><span
																	style="color: #222222;">Pj. Pemimpin Divisi
																	Corporate Secretary bank bjb</span></span>
														</p>
														<p style="text-align: justify;" align="left"><span
																style="font-family: 'Myriad Pro', sans-serif; font-size: 12pt;"><br><span
																	style="color: #222222;">bank bjb telah
																	menunjuk Irwan Riswandi sebagai Pj. Pemimpin
																	Divisi Corporate Secretary bank bjb yang
																	efektif per tanggal 11 Mei
																	2026.</span><br><br><span
																	style="color: #222222;">Irwan Riswandi,
																	Warga Negara Indonesia, lahir pada tahun
																	1975. Meraih gelar Sarjana Akuntansi dari
																	Universitas Pasundan Bandung pada tahun 1999
																	serta gelar Magister Manajemen Keuangan dari
																	Universitas Padjadjaran Bandung pada tahun
																	2011.</span><br><br><span
																	style="color: #222222;">Sebelum menjabat
																	sebagai Corporate Secretary, Irwan Riswandi
																	telah menempati sejumlah posisi strategis di
																	lingkungan bank bjb, antara lain sebagai
																	Wakil Pemimpin Divisi Umum pada periode
																	September 2025 hingga April 2026, Pemimpin
																	Kantor Cabang Cianjur, serta Pemimpin Kantor
																	Cabang Batam.</span><br><br><span
																	style="color: #222222;">Corporate Secretary
																	memiliki peranan penting dalam menjembatani
																	komunikasi baik kepada pihak internal maupun
																	eksternal Perseroan seperti komunikasi
																	dengan karyawan, regulator, para pemegang
																	saham, investor, serta pemangku kepentingan
																	lainnya. Corporate Secretary juga berperan
																	dalam memastikan bahwa Perseroan telah patuh
																	terhadap ketentuan peraturan
																	perundang-undangan di bidang Pasar
																	Modal.</span><br><br><span
																	style="color: #222222;">Komunikasi yang
																	dibangun oleh Corporate Secretary dilakukan
																	melalui berbagai sarana informasi yang
																	dimiliki Perseroan seperti situs perusahaan,
																	media sosial resmi, layanan kontak
																	perusahaan, serta berbagai kanal komunikasi
																	lainnya. Hal tersebut dilakukan guna
																	memastikan bahwa Perseroan senantiasa
																	menjalankan prinsip keterbukaan informasi
																	kepada seluruh pemangku kepentingan.</span>
															</span></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection