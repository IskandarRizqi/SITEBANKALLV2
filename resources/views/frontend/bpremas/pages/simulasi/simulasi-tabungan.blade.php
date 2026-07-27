@extends('frontend.bpremas.layout.main')

@section('content')
<style>
	.saving-simulation {
		--simulation-primary: #0d162f;
		--simulation-accent: #d6a84f;
		background: #f5f7fb;
	}

	.saving-simulation__hero {
		background: linear-gradient(135deg, var(--simulation-primary), #234574);
		color: #fff;
	}

	.saving-simulation__card {
		background: #fff;
		border-radius: 18px;
		box-shadow: 0 12px 35px rgba(13, 22, 47, 0.1);
	}

	.saving-simulation__thumbnail {
		align-items: stretch;
		display: flex;
		height: 100%;
		min-height: 100%;
		width: 100%;
	}

	.saving-simulation__thumbnail img {
		border-radius: 14px;
		height: 100%;
		min-height: 420px;
		object-fit: cover;
		width: 100%;
	}

	.saving-simulation__form {
		background: var(--simulation-primary);
		border-radius: 14px;
		color: #fff;
	}

	.saving-simulation__label {
		display: block;
		font-size: 0.875rem;
		font-weight: 600;
		margin-bottom: 0.5rem;
	}

	.saving-simulation__input,
	.saving-simulation__select {
		background: #fff;
		border: 0;
		border-radius: 8px;
		box-sizing: border-box;
		color: #1f2937;
		min-height: 46px;
		padding: 0 1rem;
		width: 100%;
	}

	.saving-simulation__input:focus,
	.saving-simulation__select:focus {
		box-shadow: 0 0 0 3px rgba(214, 168, 79, 0.45);
		outline: 0;
	}

	.saving-simulation__input-wrap {
		position: relative;
	}

	.saving-simulation__input-wrap .saving-simulation__input {
		padding-left: 2.5rem;
	}

	.saving-simulation__prefix {
		color: var(--simulation-primary);
		font-weight: 700;
		left: 1rem;
		position: absolute;
		top: 50%;
		transform: translateY(-50%);
	}

	.saving-simulation__actions {
		display: flex;
		gap: 0.75rem;
	}

	.saving-simulation__actions button {
		border-radius: 8px;
		flex: 1;
		font-weight: 700;
		min-height: 46px;
	}

	.saving-simulation__results {
		display: none;
	}

	.saving-simulation__summary {
		background: #f8fafc;
		border: 1px solid #e5e7eb;
		border-radius: 12px;
		height: 100%;
		padding: 1rem;
	}

	.saving-simulation__summary-label {
		color: #6b7280;
		font-size: 0.875rem;
		margin: 0 0 0.35rem;
	}

	.saving-simulation__summary-value {
		color: var(--simulation-primary);
		font-size: 1.1rem;
		font-weight: 700;
		margin: 0;
	}

	.saving-simulation__terms {
		border-top: 1px solid #e5e7eb;
		color: #6b7280;
		font-size: 0.8rem;
		margin-top: 1.5rem;
		padding-top: 1rem;
	}

	@media (max-width: 959px) {
		.saving-simulation__thumbnail img {
			min-height: 280px;
		}
	}

	@media (max-width: 640px) {
		.saving-simulation__thumbnail img {
			aspect-ratio: 16 / 10;
			min-height: 0;
		}

		.saving-simulation__actions {
			flex-direction: column-reverse;
		}
	}
</style>

<main class="saving-simulation">
	@php
	$headerImage = asset('frontend/bpremas/img2.png');
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
			<div class="saving-simulation__card uk-padding">
				<div class="uk-grid-large uk-flex-middle" data-uk-grid>
					<div class="uk-width-1-2@m">
						<div class="saving-simulation__form uk-padding">
							<h2 class="uk-h3 uk-light uk-margin-medium-bottom">Data Tabungan</h2>

							<div class="uk-margin">
								<label class="saving-simulation__label" for="saving-deposit">Setoran Rata-rata</label>
								<div class="saving-simulation__input-wrap">
									<span class="saving-simulation__prefix">Rp</span>
									<input class="saving-simulation__input" id="saving-deposit" inputmode="numeric"
										placeholder="Contoh: 1.000.000" type="text">
								</div>
							</div>

							<div class="uk-margin">
								<label class="saving-simulation__label" for="saving-product">Pilih Produk</label>
								<select class="saving-simulation__select" id="saving-product">
									<option value="">Pilih produk tabungan</option>
									@if (isset($tabungan))
									@foreach ($tabungan as $item)
									<option value="{{ $item->bunga }}|{{ $item->min }}"
										data-image="{{ $item->image ? url('/recfil?display=true&rf=' . $item->image) : '' }}">
										{{ $item->nama }}
									</option>
									@endforeach
									@endif
								</select>
							</div>

							<div class="saving-simulation__actions uk-margin-medium-top">
								<button class="uk-button uk-button-default" id="saving-reset" type="button">Reset</button>
								<button class="uk-button uk-button-primary" id="saving-calculate" type="button">Hitung</button>
							</div>
						</div>
					</div>

					<div class="uk-width-1-2@m">
						<div class="saving-simulation__thumbnail">
							<img alt="Ilustrasi simulasi tabungan" id="saving-product-image"
								src="{{ asset('frontend/bpremas/konten.png') }}">
						</div>
					</div>
				</div>

				<div class="saving-simulation__results uk-margin-large-top" id="saving-results">
					<h2 class="uk-h3">Hasil Simulasi</h2>
					<div class="uk-child-width-1-2@s uk-child-width-1-4@m" data-uk-grid>
						<div>
							<div class="saving-simulation__summary">
								<p class="saving-simulation__summary-label">Saldo + Bunga</p>
								<p class="saving-simulation__summary-value" id="saving-balance-with-interest">Rp 0</p>
							</div>
						</div>
						<div>
							<div class="saving-simulation__summary">
								<p class="saving-simulation__summary-label">Saldo Tanpa Bunga</p>
								<p class="saving-simulation__summary-value" id="saving-balance">Rp 0</p>
							</div>
						</div>
						<div>
							<div class="saving-simulation__summary">
								<p class="saving-simulation__summary-label">Bunga</p>
								<p class="saving-simulation__summary-value" id="saving-interest">Rp 0</p>
							</div>
						</div>
						<div>
							<div class="saving-simulation__summary">
								<p class="saving-simulation__summary-label">Total Setoran</p>
								<p class="saving-simulation__summary-value" id="saving-total-deposit">Rp 0</p>
							</div>
						</div>
					</div>

					<div class="saving-simulation__terms">
						<strong>Syarat dan ketentuan</strong>
						<ul class="uk-list uk-list-disc uk-margin-small-top">
							<li>Belum termasuk pajak bunga dan biaya administrasi.</li>
							<li>Suku bunga dapat berubah sesuai ketentuan yang berlaku.</li>
							<li>Simulasi merupakan ilustrasi untuk periode satu bulan.</li>
							<li>Hasil aktual mengikuti ketentuan produk yang berlaku.</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<script>
	(() => {
		const depositInput = document.getElementById('saving-deposit');
		const productSelect = document.getElementById('saving-product');
		const results = document.getElementById('saving-results');
		const productImage = document.getElementById('saving-product-image');
		const currency = new Intl.NumberFormat('id-ID', {
			minimumFractionDigits: 0,
			maximumFractionDigits: 0
		});

		const formatCurrency = (value) => `Rp ${currency.format(Math.max(0, value))}`;
		const formatInput = (value) => currency.format(Number(value.replace(/\D/g, '')) || 0);
		const valueOf = (id) => document.getElementById(id);

		depositInput.addEventListener('input', (event) => {
			event.target.value = formatInput(event.target.value);
		});

		productSelect.addEventListener('change', () => {
			const image = productSelect.selectedOptions[0].dataset.image;

			if (image) {
				productImage.src = image;
			}
		});

		document.getElementById('saving-calculate').addEventListener('click', () => {
			const deposit = Number(depositInput.value.replace(/\D/g, ''));
			const [rate, minimumDeposit] = (productSelect.value || '').split('|').map(Number);

			if (!deposit || deposit <= 0) {
				window.alert('Harap masukkan setoran rata-rata.');
				return;
			}

			if (!productSelect.value || Number.isNaN(rate) || Number.isNaN(minimumDeposit)) {
				window.alert('Harap pilih produk tabungan.');
				return;
			}

			const balance = deposit + minimumDeposit;
			const interest = balance * (rate / 100);
			const balanceWithInterest = balance + interest;

			valueOf('saving-balance-with-interest').textContent = formatCurrency(balanceWithInterest);
			valueOf('saving-balance').textContent = formatCurrency(balance);
			valueOf('saving-interest').textContent = formatCurrency(interest);
			valueOf('saving-total-deposit').textContent = formatCurrency(balance);
			results.style.display = 'block';
		});

		document.getElementById('saving-reset').addEventListener('click', () => {
			depositInput.value = '';
			productSelect.value = '';
			productImage.src = '{{ asset('
			frontend / bpremas / images / img_grand - resize - logo - bangunan - keb_140.jpg ') }}';
			results.style.display = 'none';
		});
	})();
</script>
@endsection