@extends('frontend.bpremas.layout.main')

@section('content')
<div id="sc-page-wrapper" class="uk-ef_newsletter">
	<div id="sc-page-content" data-uk-lightbox="animation: fade;toggle:a.lightbox-link">
		@php
		$headerImage = asset('frontend/bpremas/img1.png');
		@endphp

		<section class="uk-hidden@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
			style="background-image: url('{{ $headerImage }}'); height: 400px;">
			<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
			<div class="uk-container">
				<div class="uk-position uk-position-left-center uk-width-4-5">
					<h1 class="uk-h1">Prime Landing Rate</h1>

				</div>
			</div>
		</section>

		<section class="uk-hidden@l uk-visible@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
			style="background-image: url('{{ $headerImage }}'); height: 400px;">
			<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
			<div class="uk-position uk-position-bottom-left uk-width-4-5">
				<div class="uk-container">
					<h1 class="uk-h1">Kredit</h1>
					<p class="uk-margin-bottom">Wujudkan kebutuhan Anda dengan pilihan kredit yang sesuai dari bank.</p>
				</div>
			</div>
		</section>

		<section class="uk-visible@l uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
			style="background-image: url('{{ $headerImage }}'); height: 400px;">
			<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
			<div class="uk-position uk-position-bottom-left uk-width-1-1">
				<div class="uk-container">
					<h1 class="uk-h1">Kredit</h1>
					<p class="uk-margin-bottom">Wujudkan kebutuhan Anda dengan pilihan kredit yang sesuai dari bank.</p>
				</div>
			</div>
		</section>
		<div class="blog-main-content content_builder_render" data-ef-uid=ef-uid-1784986711616-27>
			<div class="uk-section-default uk-section">




				<div class="uk-container uk-container-small">



					<div class="uk-grid uk-grid-stack" data-uk-grid data-uk-scrollspy-class>


						<div class="uk-width-1-1@m uk-width-1-1@s uk-first-column">






							<div class=ef-text>
								<center><strong>Suku Bunga Dasar Kredit Rupiah (Prime Lending Rate)
									</strong><br><strong>PT Bank Pembangunan Daerah Jawa Barat dan Banten, Tbk</strong>
								</center>
								<center></center>
								<center>
									<center></center>
								</center>
								<center></center>
								<center></center>
								<center></center>
								<center></center>
								<center></center>
								<p><span style=font-size:10pt>Berlaku mulai 09 Juli 2026</span></p>
								<div class=uk-overflow-auto>
									<table border=1>
										<thead>
											<tr style=height:22px>
												<th style=width:185.896px;text-align:center;height:40px rowspan=2>Periode Data
													30 Juni 2026</th>
												<th style=text-align:center;height:18px;width:129.208px colspan=2>Kredit
													Non-UMKM</th>
												<th style=width:210.521px;text-align:center;height:18px colspan=3>Kredit UMKM
												</th>
												<th style=width:68.2708px;text-align:center;height:40px rowspan=2>KPR/KPA</th>
												<th style=width:76.3125px;text-align:center;height:40px rowspan=2>
													Non-KPR/Non-KPA</th>
											</tr>
											<tr style=height:22px>
												<th style=width:72.6458px;text-align:center;height:22px>Korporasi</th>
												<th style=width:42.4375px;text-align:center;height:22px>Ritel</th>
												<th style=width:80.1458px;text-align:center;height:22px>Menengah</th>
												<th style=width:51.0625px;text-align:center;height:22px>Kecil</th>
												<th style=width:51.0625px;text-align:center;height:22px>Mikro</th>
											</tr>
											<tr style=height:22px>
												<td style=width:185.896px;text-align:center;height:22px>Harga Pokok Dana untuk
													Kredit (HPDK) (%)</td>
												<td style=width:72.6458px;text-align:center;height:22px>4.76%</td>
												<td style=width:42.4375px;text-align:center;height:22px>4.76%</td>
												<td style=width:80.1458px;text-align:center;height:22px>4.76%</td>
												<td style=width:51.0625px;text-align:center;height:22px>4.76%</td>
												<td style=width:51.0625px;text-align:center;height:22px>4.76%</td>
												<td style=width:68.2708px;text-align:center;height:22px>4.76%</td>
												<td style=width:76.3125px;text-align:center;height:22px>4.76%</td>
											</tr>
											<tr style=height:22px>
												<td style=width:185.896px;text-align:center;height:22px>Biaya Overhead (%)
												</td>
												<td style=width:72.6458px;text-align:center;height:22px>0.29%</td>
												<td style=width:42.4375px;text-align:center;height:22px>1.27%</td>
												<td style=width:80.1458px;text-align:center;height:22px>0.79%</td>
												<td style=width:51.0625px;text-align:center;height:22px>1.54%</td>
												<td style=width:51.0625px;text-align:center;height:22px>2.75%</td>
												<td style=width:68.2708px;text-align:center;height:22px>2.32%</td>
												<td style=width:76.3125px;text-align:center;height:22px>2.85%</td>
											</tr>
											<tr style=height:22px>
												<td style=width:185.896px;text-align:center;height:22px>Marjin Keuntungan (%)
												</td>
												<td style=width:72.6458px;text-align:center;height:22px>1.22%</td>
												<td style=width:42.4375px;text-align:center;height:22px>1.46%</td>
												<td style=width:80.1458px;text-align:center;height:22px>1.58%</td>
												<td style=width:51.0625px;text-align:center;height:22px>2.23%</td>
												<td style=width:51.0625px;text-align:center;height:22px>3.14%</td>
												<td style=width:68.2708px;text-align:center;height:22px>1.36%</td>
												<td style=width:76.3125px;text-align:center;height:22px>1.23%</td>
											</tr>
											<tr style=height:67px>
												<td style=width:185.896px;text-align:center;height:67px>Suku Bunga Dasar
													Kredit (SBDK) (%) (HPDK+Overhead+Marjin)</td>
												<td style=width:72.6458px;text-align:center;height:67px>6.27%</td>
												<td style=width:42.4375px;text-align:center;height:67px>7.49%</td>
												<td style=width:80.1458px;text-align:center;height:67px>7.13%</td>
												<td style=width:51.0625px;text-align:center;height:67px>8.53%</td>
												<td style=width:51.0625px;text-align:center;height:67px>10.65%</td>
												<td style=width:68.2708px;text-align:center;height:67px>8.44%</td>
												<td style=width:76.3125px;text-align:center;height:67px>8.84%</td>
											</tr>
										</thead>
									</table>
								</div>
								<div class=uk-overflow-auto>
									<table border=1>
										<thead>
											<tr>
												<th style=width:80px;text-align:center>Kategori</th>
												<th style=width:142.988px;text-align:center>Definisi Kategori</th>
												<th style=width:410.996px;text-align:center>Indikator/Kriteri dari Kategori
													Kredit</th>
											</tr>
											<tr>
												<td style=width:80px;text-align:center>Korporasi</td>
												<td style=width:142.988px;text-align:center>Kredit untuk tujuan pebiayaan yang
													bersifat Produktif</td>
												<td style=width:410.996px;text-align:left>
													<ol>
														<li style=text-align:justify>Kredit dengan tujuan produktif kepada Calon
															Debitur/Debitur beserta grup usaha dengan plafond kredit dan/atau
															total eksposure di atas Rp 100 M.</li>
														<li style=text-align:justify>Pembiayaan dalam bentuk Kredit Jangka
															Pendek, Skema Sindikasi dan Club Deal serta kredit kepada BUMN, BUMN
															Holding dan Grup BUMN tanpa batasan plafond sampai dengan BMPK.</li>
													</ol>
												</td>
											</tr>
											<tr>
												<td style=width:80px;text-align:center>Ritel</td>
												<td style=width:142.988px;text-align:center>Kredit untuk tujuan pembiayaan
													yang bersifat Produktif</td>
												<td style=width:410.996px;text-align:left>
													<ol>
														<li style=text-align:justify>Kredit Komersial mengelola kredit produktif
															dengan kriteria calon debitur sebagai berikut Pemerintah Daerah, BUMD
															Holding/BUMD/anak perusahaan BUMD, BLU, BLUD, Perguruan Tinggi Negeri
															(PTN) Kedinasan/berbadan hukum/non badan hukum, Perusahaan Swasta
															dan/atau multinasional (MNC) berikut afiliasinya atau grup
															perusahaannya, Badan usaha lainya seperti Perseroan terbatas (PT),
															Yayasan, Koperasi, BUMDes, CV, Firma, Perusahaan Dagang (PD),
															Perorangan, BPR Konvensional dan LKM.</li>
														<li style=text-align:justify>Plafon Pengajuan Kredit dan/atau total
															eksposur:
															<ol style=list-style-type:lower-alpha>
																<li style=text-align:justify>Khusus untuk produk Kredit Modal
																	Kerja (KMK) dan Kredit Investasi (KI) dengan kriteria Calon
																	Debitur/Debitur yang masuk kedalam segmentasi Divisi Komersial
																	dan sesuai dengan ketentuan pada Manual Produk di Divisi
																	Komersial :
																	<ul>
																		<li style=text-align:justify>Calon debitur/Debitur
																			Perorangan diatas Rp.2.000.000.000,- (dua miliar rupiah)
																			sampai dengan Rp.10.000.000.000.- (sepuluh miliar
																			rupiah);</li>
																		<li style=text-align:justify>Calon Debitur/Debitur Non
																			Perorangan diatas Rp.2.000.000.000,- (dua miliar
																			rupiah)sampai dengan Rp.100.000.000.000.- (seratus miliar
																			rupiah);</li>
																	</ul>
																</li>
																<li style=text-align:justify>Untuk seluruh produk komersial selain
																	Kredit Modal Kerja (KMK) dan Investasi (KI):<br>
																	<ul>
																		<li style=text-align:justify>Calon Debitur/Debitur
																			Perorangan dengan eksposur sampai dengan maksimal Rp.
																			10.000.000.000,- (sepuluh miliar rupiah);</li>
																		<li style=text-align:justify>Calon Debitur/Debitur Non
																			Perorangan dengan eksposur sampai dengan maksimal
																			Rp.100.000.000.000,- (seratus<br>miliar rupiah).</li>
																	</ul>
																</li>
															</ol>
														</li>
													</ol>
												</td>
											</tr>
										</thead>
									</table>
								</div>
								<p><strong>Keterangan :</strong></p>
								<ul>
									<li style=text-align:justify>Suku Bunga Dasar Kredit (SBDK) ditentukan BUK berdasarkan
										berbagai faktor, diantaranya suku bunga acuan yang ditetapkan oleh otoritas yang
										berwenang, harga pokok dana untuk kredit (cost of fund), biaya overhead, margin
										keuntungan, dan perkembangan kondisi ekonomi.</li>
									<li style=text-align:justify>SBDK belum memperhitungkan komponen estimasi premi risiko
										yang besarnya tergantung dari penilaian BUK terhadap risiko untuk masing-masing
										debitur atau kelompok debitur.</li>
									<li style=text-align:justify>Besarnya suku bunga kredit yang dikenakan kepada debitur
										belum tentu sama dengan SBDK.</li>
									<li style=text-align:justify>Informasi SBDK yang berlaku setiap saat dapat dilihat pada
										publikasi di setiap kantor bank <strong>bjb</strong> dan/atau website bank
										<strong>bjb</strong> (<a href=https://www.bankbjb.co.id />www.bankbjb.co.id</a>).
									</li>
									<li style=text-align:justify>Tingkat suku bunga efektif p.a.</li>
								</ul>

							</div>




						</div>

					</div>


				</div>



			</div>
		</div>


	</div>
</div>
@endsection