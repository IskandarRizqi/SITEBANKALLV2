@extends('frontend.bpremas.layout.main')

@section('content')
<style>
	.deposit-simulation {
		--simulation-primary: #0d162f;
		--simulation-accent: #d6a84f;
		background: #f5f7fb;
	}

	.deposit-simulation__hero {
		background: linear-gradient(135deg, var(--simulation-primary), #234574);
		color: #fff;
	}

	.deposit-simulation__card {
		background: #fff;
		border-radius: 18px;
		box-shadow: 0 12px 35px rgba(13, 22, 47, 0.1);
	}

	.deposit-simulation__thumbnail {
		align-items: stretch;
		display: flex;
		height: 100%;
		min-height: 100%;
		width: 100%;
	}

	.deposit-simulation__thumbnail img {
		border-radius: 14px;
		height: 100%;
		min-height: 420px;
		object-fit: cover;
		width: 100%;
	}

	.deposit-simulation__form {
		background: var(--simulation-primary);
		border-radius: 14px;
		color: #fff;
	}

	.deposit-simulation__label {
		display: block;
		font-size: 0.875rem;
		font-weight: 600;
		margin-bottom: 0.5rem;
	}

	.deposit-simulation__input,
	.deposit-simulation__select {
		background: #fff;
		border: 0;
		border-radius: 8px;
		box-sizing: border-box;
		color: #1f2937;
		min-height: 46px;
		padding: 0 1rem;
		width: 100%;
	}

	.deposit-simulation__input:focus,
	.deposit-simulation__select:focus {
		box-shadow: 0 0 0 3px rgba(214, 168, 79, 0.45);
		outline: 0;
	}

	.deposit-simulation__input-wrap {
		position: relative;
	}

	.deposit-simulation__input-wrap .deposit-simulation__input {
		padding-left: 2.5rem;
	}

	.deposit-simulation__prefix {
		color: var(--simulation-primary);
		font-weight: 700;
		left: 1rem;
		position: absolute;
		top: 50%;
		transform: translateY(-50%);
	}

	.deposit-simulation__actions {
		display: flex;
		gap: 0.75rem;
	}

	.deposit-simulation__actions button {
		border-radius: 8px;
		flex: 1;
		font-weight: 700;
		min-height: 46px;
	}

	.deposit-simulation__results {
		display: none;
	}

	.deposit-simulation__summary {
		background: #f8fafc;
		border: 1px solid #e5e7eb;
		border-radius: 12px;
		height: 100%;
		padding: 1rem;
	}

	.deposit-simulation__summary-label {
		color: #6b7280;
		font-size: 0.875rem;
		margin: 0 0 0.35rem;
	}

	.deposit-simulation__summary-value {
		color: var(--simulation-primary);
		font-size: 1.1rem;
		font-weight: 700;
		margin: 0;
	}

	.deposit-simulation__terms {
		border-top: 1px solid #e5e7eb;
		color: #6b7280;
		font-size: 0.8rem;
		margin-top: 1.5rem;
		padding-top: 1rem;
	}

	@media (max-width: 959px) {
		.deposit-simulation__thumbnail img {
			min-height: 280px;
		}
	}

	@media (max-width: 640px) {
		.deposit-simulation__thumbnail img {
			aspect-ratio: 16 / 10;
			min-height: 0;
		}

		.deposit-simulation__actions {
			flex-direction: column-reverse;
		}
	}
</style>

<main class="deposit-simulation">
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
			<div class="deposit-simulation__card uk-padding">
				<div class="uk-grid-large uk-flex-middle" data-uk-grid>
					<div class="uk-width-1-2@m">
						<div class="deposit-simulation__form uk-padding">
							<h2 class="uk-h3 uk-light uk-margin-medium-bottom">Data Deposito</h2>

							<div class="uk-margin">
								<label class="deposit-simulation__label" for="deposit-principal">Plafon Deposito</label>
								<div class="deposit-simulation__input-wrap">
									<span class="deposit-simulation__prefix">Rp</span>
									<input class="deposit-simulation__input" id="deposit-principal" inputmode="numeric"
										placeholder="Contoh: 10.000.000" type="text">
								</div>
							</div>

							<div class="uk-margin">
								<label class="deposit-simulation__label" for="deposit-product">Jangka Waktu</label>
								<select class="deposit-simulation__select" id="deposit-product">
									<option value="">Pilih produk deposito</option>
									@if (isset($deposito))
									@foreach ($deposito as $item)
									<option value="{{ $item->tenor }}|{{ $item->bunga }}"
										data-image="{{ $item->image ? url('/recfil?display=true&rf=' . $item->image) : '' }}">
										{{ $item->nama }} | Suku bunga {{ $item->bunga }}%
									</option>
									@endforeach
									@endif
								</select>
							</div>

							<div class="deposit-simulation__actions uk-margin-medium-top">
								<button class="uk-button uk-button-default" id="deposit-reset" type="button">Reset</button>
								<button class="uk-button uk-button-primary" id="deposit-calculate" type="button">Hitung</button>
							</div>
						</div>
					</div>

					<div class="uk-width-1-2@m">
						<div class="deposit-simulation__thumbnail">
							<img alt="Ilustrasi simulasi deposito" id="deposit-product-image"
								src="{{ asset('frontend/bpremas/konten.png') }}">
						</div>
					</div>
				</div>

				<div class="deposit-simulation__results uk-margin-large-top" id="deposit-results">
					<h2 class="uk-h3">Hasil Simulasi</h2>
					<div class="uk-child-width-1-2@s uk-child-width-1-4@m" data-uk-grid>
						<div>
							<div class="deposit-simulation__summary">
								<p class="deposit-simulation__summary-label">Saldo + Bunga</p>
								<p class="deposit-simulation__summary-value" id="deposit-balance-with-interest">Rp 0</p>
							</div>
						</div>
						<div>
							<div class="deposit-simulation__summary">
								<p class="deposit-simulation__summary-label">Saldo Tanpa Bunga</p>
								<p class="deposit-simulation__summary-value" id="deposit-balance">Rp 0</p>
							</div>
						</div>
						<div>
							<div class="deposit-simulation__summary">
								<p class="deposit-simulation__summary-label">Bunga Per Bulan</p>
								<p class="deposit-simulation__summary-value" id="deposit-interest">Rp 0</p>
							</div>
						</div>
						<div>
							<div class="deposit-simulation__summary">
								<p class="deposit-simulation__summary-label">Jangka Waktu</p>
								<p class="deposit-simulation__summary-value" id="deposit-tenor">-</p>
							</div>
						</div>
					</div>

					<div class="deposit-simulation__terms">
						<strong>Syarat dan ketentuan</strong>
						<ul class="uk-list uk-list-disc uk-margin-small-top">
							<li>Belum termasuk pajak bunga dan biaya administrasi.</li>
							<li>Suku bunga dapat berubah sesuai ketentuan yang berlaku.</li>
							<li>Hasil simulasi merupakan estimasi bunga untuk satu bulan.</li>
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
		const principalInput = document.getElementById('deposit-principal');
		const productSelect = document.getElementById('deposit-product');
		const results = document.getElementById('deposit-results');
		const productImage = document.getElementById('deposit-product-image');
		const currency = new Intl.NumberFormat('id-ID', {
			minimumFractionDigits: 0,
			maximumFractionDigits: 0
		});

		const formatCurrency = (value) => `Rp ${currency.format(Math.max(0, value))}`;
		const formatInput = (value) => currency.format(Number(value.replace(/\D/g, '')) || 0);
		const valueOf = (id) => document.getElementById(id);

		principalInput.addEventListener('input', (event) => {
			event.target.value = formatInput(event.target.value);
		});

		productSelect.addEventListener('change', () => {
			const image = productSelect.selectedOptions[0].dataset.image;

			if (image) {
				productImage.src = image;
			}
		});

		document.getElementById('deposit-calculate').addEventListener('click', () => {
			const principal = Number(principalInput.value.replace(/\D/g, ''));
			const [tenor, annualRate] = (productSelect.value || '').split('|').map(Number);

			if (!principal || principal <= 0) {
				window.alert('Harap masukkan plafon deposito.');
				return;
			}

			if (!productSelect.value || Number.isNaN(tenor) || Number.isNaN(annualRate)) {
				window.alert('Harap pilih jangka waktu deposito.');
				return;
			}

			// Mengikuti rumus referensi: bunga nominal per bulan dari suku bunga tahunan.
			const monthlyInterest = principal * (annualRate / 100) / 12;
			const balanceWithInterest = principal + monthlyInterest;

			valueOf('deposit-balance-with-interest').textContent = formatCurrency(balanceWithInterest);
			valueOf('deposit-balance').textContent = formatCurrency(principal);
			valueOf('deposit-interest').textContent = formatCurrency(monthlyInterest);
			valueOf('deposit-tenor').textContent = `${tenor} bulan`;
			results.style.display = 'block';
		});

		document.getElementById('deposit-reset').addEventListener('click', () => {
			principalInput.value = '';
			productSelect.value = '';
			productImage.src = '{{ asset('
			frontend / bpremas / images / img_grand - resize - logo - bangunan - keb_140.jpg ') }}';
			results.style.display = 'none';
		});
	})();
</script>
@endsection