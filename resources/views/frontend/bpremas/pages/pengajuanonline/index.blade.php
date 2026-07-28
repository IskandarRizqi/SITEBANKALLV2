@extends('frontend.bpremas.layout.main')

@section('content')
<style>
	.application-page {
		background: #f5f7fb;
	}

	.application-page__hero {
		background: linear-gradient(135deg, #0d162f, #234574);
		color: #fff;
	}

	.application-card {
		background: #fff;
		border-radius: 18px;
		box-shadow: 0 12px 35px rgba(13, 22, 47, 0.1);
	}

	.application-card__section {
		border-top: 1px solid #e5e7eb;
		margin-top: 1.75rem;
		padding-top: 1.5rem;
	}

	.application-card__section-title {
		color: #0d162f;
		font-size: 1.1rem;
		font-weight: 700;
		margin-bottom: 1rem;
	}

	.application-label {
		color: #374151;
		display: block;
		font-size: 0.875rem;
		font-weight: 600;
		margin-bottom: 0.4rem;
	}

	.application-input,
	.application-select,
	.application-textarea {
		background: #fff;
		border: 1px solid #d1d5db;
		border-radius: 8px;
		box-sizing: border-box;
		color: #1f2937;
		min-height: 46px;
		padding: 0.7rem 0.9rem;
		width: 100%;
	}

	.application-textarea {
		min-height: 110px;
		resize: vertical;
	}

	.application-input:focus,
	.application-select:focus,
	.application-textarea:focus {
		border-color: #0d162f;
		box-shadow: 0 0 0 3px rgba(13, 22, 47, 0.12);
		outline: 0;
	}

	.application-field--currency {
		position: relative;
	}

	.application-field--currency .application-input {
		padding-left: 2.7rem;
	}

	.application-field__prefix {
		color: #64748b;
		font-weight: 700;
		left: 0.9rem;
		position: absolute;
		top: 50%;
		transform: translateY(-50%);
	}

	.application-type {
		gap: 0.6rem;
	}

	.application-type__option {
		background: #eef2f7;
		border: 0;
		border-radius: 7px;
		color: #475569;
		cursor: pointer;
		flex: 1;
		font-weight: 600;
		padding: 0.75rem 0.5rem;
		text-align: center;
	}

	.application-type__option.is-active {
		background: #0d162f;
		color: #fff;
	}

	.application-type__option:hover {
		background: #dbe4f0;
	}

	.application-type__option.is-active:hover {
		background: #0d162f;
		color: #fff;
	}

	.application-actions {
		display: flex;
		gap: 0.75rem;
	}

	.application-actions>* {
		flex: 1;
	}

	.application-actions .uk-button {
		border-radius: 8px;
		min-height: 46px;
	}

	.application-form-panel {
		display: none;
	}

	.application-form-panel.is-active {
		display: block;
	}

	@media (max-width: 640px) {
		.application-actions {
			flex-direction: column-reverse;
		}

		.application-type__option {
			font-size: 0.8rem;
		}
	}
</style>

<main class="application-page">
	<div id="sc-page-content" data-uk-lightbox="animation: fade;toggle:a.lightbox-link">
		@php
		$headerImage = asset('frontend/bpremas/1ramah.png');
		@endphp

		<section class="uk-hidden@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
			style="background-image: url('{{ $headerImage }}'); height: 400px;">
			<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
			<div class="uk-container">
				<div class="uk-position uk-position-left-center uk-width-4-5">
					<h1 class="uk-h1">Pengajuan online</h1>
					<p>Wujudkan kebutuhan finansial Anda lebih mudah melalui layanan pengajuan online. Proses cepat, transparan, dan dapat dilakukan kapan saja serta di mana saja, didukung sistem yang aman dan terpercaya.</p>
				</div>
			</div>
		</section>

		<section class="uk-hidden@l uk-visible@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
			style="background-image: url('{{ $headerImage }}'); height: 400px;">
			<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
			<div class="uk-position uk-position-bottom-left uk-width-4-5">
				<div class="uk-container">
					<h1 class="uk-h1">Pengajuan online</h1>
					<p class="uk-margin-bottom">Wujudkan kebutuhan finansial Anda lebih mudah melalui layanan pengajuan online. Proses cepat, transparan, dan dapat dilakukan kapan saja serta di mana saja, didukung sistem yang aman dan terpercaya.</p>
				</div>
			</div>
		</section>

		<section class="uk-visible@l uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
			style="background-image: url('{{ $headerImage }}'); height: 400px;">
			<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
			<div class="uk-position uk-position-bottom-left uk-width-1-1">
				<div class="uk-container">
					<h1 class="uk-h1">Pengajuan online</h1>
					<p class="uk-margin-bottom">Wujudkan kebutuhan finansial Anda lebih mudah melalui layanan pengajuan online. Proses cepat, transparan, dan dapat dilakukan kapan saja serta di mana saja, didukung sistem yang aman dan terpercaya.</p>
				</div>
			</div>
		</section>

		<section class="uk-section uk-section-muted">
			<div class="uk-container uk-container-small">
				<div class="application-card uk-padding">
					@if ($errors->any())
					<div class="uk-alert-danger" data-uk-alert>
						<a class="uk-alert-close" data-uk-close></a>
						<ul class="uk-margin-remove-bottom">
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif

					@if (session('success'))
					<div class="uk-alert-success" data-uk-alert>{{ session('success') }}</div>
					@endif

					<h2 class="uk-h3">Pilih Jenis Pengajuan</h2>
					<div class="application-type uk-flex uk-child-width-expand uk-margin-medium-bottom" role="tablist">
						<button class="application-type__option is-active" data-application-type="kredit" type="button">Kredit</button>
						<button class="application-type__option" data-application-type="tabungan" type="button">Tabungan</button>
						<button class="application-type__option" data-application-type="deposito" type="button">Deposito</button>
					</div>

					<form action="{{ url('/simpan-data-pengajuan') }}" method="POST">
						@csrf
						<input id="application-type" name="jenis_pengajuan" type="hidden" value="kredit">

						<div class="application-card__section uk-margin-remove-top uk-padding-remove-top">
							<h3 class="application-card__section-title">Data Pemohon</h3>
							<div class="uk-child-width-1-2@s" data-uk-grid>
								<div>
									<label class="application-label" for="nm_lengkap">Nama Lengkap *</label>
									<input class="application-input" id="nm_lengkap" name="nm_lengkap" required type="text" value="{{ old('nm_lengkap') }}">
								</div>
								<div>
									<label class="application-label" for="no_ktp">No. KTP *</label>
									<input class="application-input" id="no_ktp" inputmode="numeric" maxlength="16" name="no_ktp" pattern="[0-9]{16}" required type="text" value="{{ old('no_ktp') }}">
								</div>
								<div>
									<label class="application-label" for="no_hp">No. Handphone *</label>
									<input class="application-input" id="no_hp" inputmode="tel" maxlength="15" name="no_hp" required type="tel" value="{{ old('no_hp') }}">
								</div>
								<div>
									<label class="application-label" for="email">Email *</label>
									<input class="application-input" id="email" name="email" required type="email" value="{{ old('email') }}">
								</div>
								<div class="uk-width-1-1">
									<label class="application-label" for="alamat">Alamat Lengkap *</label>
									<textarea class="application-textarea" id="alamat" name="alamat" required>{{ old('alamat') }}</textarea>
								</div>
							</div>
						</div>

						<div class="application-card__section application-form-panel is-active" data-application-panel="kredit">
							<h3 class="application-card__section-title">Data Pengajuan Kredit</h3>
							<div class="uk-child-width-1-2@s" data-uk-grid>
								<div>
									<label class="application-label" for="jns_kredit">Jenis Kredit *</label>
									<select class="application-select" id="jns_kredit" name="jns_kredit">
										<option value="">Pilih jenis kredit</option>
										@foreach ($produkkredit as $item)
										<option value="{{ $item->id }}">{{ $item->title }}</option>
										@endforeach
									</select>
								</div>
								<div>
									<label class="application-label" for="jml_kredit">Jumlah Kredit *</label>
									<div class="application-field--currency">
										<span class="application-field__prefix">Rp</span>
										<input class="application-input" id="jml_kredit" inputmode="numeric" name="jml_kredit" type="text">
									</div>
								</div>
								<div>
									<label class="application-label" for="kredit-tenor">Jangka Waktu *</label>
									<select class="application-select" id="kredit-tenor" name="jngka_wkt">
										<option value="">Pilih jangka waktu</option>
										<option value="6">6 Bulan</option>
										<option value="12">12 Bulan</option>
										<option value="24">24 Bulan</option>
										<option value="36">36 Bulan</option>
									</select>
								</div>
								<div>
									<label class="application-label" for="pekerjaan">Pekerjaan *</label>
									<input class="application-input" id="pekerjaan" name="pekerjaan" type="text">
								</div>
								<div class="uk-width-1-1">
									<label class="application-label" for="tujuan_kredit">Tujuan Kredit</label>
									<textarea class="application-textarea" data-optional="true" id="tujuan_kredit" name="tujuan_kredit"></textarea>
								</div>
							</div>
						</div>

						<div class="application-card__section application-form-panel" data-application-panel="tabungan">
							<h3 class="application-card__section-title">Data Pengajuan Tabungan</h3>
							<div class="uk-child-width-1-2@s" data-uk-grid>
								<div>
									<label class="application-label" for="jns_tab">Jenis Tabungan *</label>
									<select class="application-select" id="jns_tab" name="jns_tab">
										<option value="">Pilih jenis tabungan</option>
										@foreach ($produktabungan as $item)
										<option value="{{ $item->id }}">{{ $item->title }}</option>
										@endforeach
									</select>
								</div>
								<div>
									<label class="application-label" for="setor_awal">Setoran Awal *</label>
									<div class="application-field--currency">
										<span class="application-field__prefix">Rp</span>
										<input class="application-input" id="setor_awal" inputmode="numeric" name="setor_awal" type="text">
									</div>
								</div>
								<div>
									<label class="application-label" for="sumber_dn_tabungan">Sumber Dana *</label>
									<input class="application-input" id="sumber_dn_tabungan" name="sumber_dn" type="text">
								</div>
								<div>
									<label class="application-label" for="tujuan_bk_rek">Tujuan Pembukaan Rekening</label>
									<input class="application-input" data-optional="true" id="tujuan_bk_rek" name="tujuan_bk_rek" type="text">
								</div>
								<div class="uk-width-1-1">
									<label class="application-label" for="cat_tmbhn_tabungan">Catatan Tambahan</label>
									<textarea class="application-textarea" data-optional="true" id="cat_tmbhn_tabungan" name="cat_tmbhn"></textarea>
								</div>
							</div>
						</div>

						<div class="application-card__section application-form-panel" data-application-panel="deposito">
							<h3 class="application-card__section-title">Data Pengajuan Deposito</h3>
							<div class="uk-child-width-1-2@s" data-uk-grid>
								<div>
									<label class="application-label" for="nmnl_depo">Nominal Deposito *</label>
									<div class="application-field--currency">
										<span class="application-field__prefix">Rp</span>
										<input class="application-input" id="nmnl_depo" inputmode="numeric" name="nmnl_depo" type="text">
									</div>
								</div>
								<div>
									<label class="application-label" for="deposito-tenor">Jangka Waktu *</label>
									<select class="application-select" id="deposito-tenor" name="jngka_wkt">
										<option value="">Pilih jangka waktu</option>
										<option value="1">1 Bulan</option>
										<option value="3">3 Bulan</option>
										<option value="6">6 Bulan</option>
										<option value="12">12 Bulan</option>
									</select>
								</div>
								<div>
									<label class="application-label" for="sumber_dn_deposito">Sumber Dana *</label>
									<input class="application-input" id="sumber_dn_deposito" name="sumber_dn" type="text">
								</div>
								<div>
									<label class="application-label" for="rek_pencairan">Rekening Pencairan *</label>
									<input class="application-input" id="rek_pencairan" name="rek_pencairan" type="text">
								</div>
								<div class="uk-width-1-1">
									<label class="application-label" for="cat_tmbhn_deposito">Catatan Tambahan</label>
									<textarea class="application-textarea" data-optional="true" id="cat_tmbhn_deposito" name="cat_tmbhn"></textarea>
								</div>
							</div>
						</div>

						<div class="application-actions uk-margin-large-top">
							<a class="uk-button uk-button-default" href="{{ url('/') }}">Batal</a>
							<button class="uk-button uk-button-primary" type="submit">Kirim Pengajuan</button>
						</div>
					</form>
				</div>
			</div>
		</section>
</main>

<script>
	(() => {
		const typeInput = document.getElementById('application-type');
		const options = document.querySelectorAll('[data-application-type]');
		const panels = document.querySelectorAll('[data-application-panel]');

		const updateFormType = (type) => {
			typeInput.value = type;

			options.forEach((option) => {
				option.classList.toggle('is-active', option.dataset.applicationType === type);
			});

			panels.forEach((panel) => {
				const active = panel.dataset.applicationPanel === type;
				panel.classList.toggle('is-active', active);
				panel.querySelectorAll('input, select, textarea').forEach((field) => {
					field.disabled = !active;
					field.required = active && field.dataset.optional !== 'true';
				});
			});
		};

		options.forEach((option) => {
			option.addEventListener('click', () => updateFormType(option.dataset.applicationType));
		});

		document.querySelectorAll('input[inputmode="numeric"]').forEach((field) => {
			field.addEventListener('input', () => {
				field.value = field.value.replace(/\D/g, '');
			});
		});

		updateFormType('kredit');
	})();
</script>
@endsection