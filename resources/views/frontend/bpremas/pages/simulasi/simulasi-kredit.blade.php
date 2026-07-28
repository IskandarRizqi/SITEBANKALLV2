@extends('frontend.bpremas.layout.main')

@section('content')
<style>
	.credit-simulation {
		--simulation-primary: #0d162f;
		--simulation-accent: #d6a84f;
		background: #f5f7fb;
	}

	.credit-simulation__hero {
		background: linear-gradient(135deg, var(--simulation-primary), #234574);
		color: #fff;
	}

	.credit-simulation__card {
		background: #fff;
		border-radius: 18px;
		box-shadow: 0 12px 35px rgba(13, 22, 47, 0.1);
	}

	.credit-simulation__thumbnail {
		align-items: stretch;
		display: flex;
		height: 100%;
		min-height: 100%;
		width: 100%;
	}

	.credit-simulation__thumbnail img {
		border-radius: 14px;
		height: 100%;
		min-height: 420px;
		object-fit: cover;
		width: 100%;
	}

	.credit-simulation__form {
		background: var(--simulation-primary);
		border-radius: 14px;
		color: #fff;
	}

	.credit-simulation__label {
		display: block;
		font-size: 0.875rem;
		font-weight: 600;
		margin-bottom: 0.5rem;
	}

	.credit-simulation__input,
	.credit-simulation__select {
		background: #fff;
		border: 0;
		border-radius: 8px;
		box-sizing: border-box;
		color: #1f2937;
		min-height: 46px;
		padding: 0 1rem;
		width: 100%;
	}

	.credit-simulation__input:focus,
	.credit-simulation__select:focus {
		box-shadow: 0 0 0 3px rgba(214, 168, 79, 0.45);
		outline: 0;
	}

	.credit-simulation__input-wrap {
		position: relative;
	}

	.credit-simulation__input-wrap .credit-simulation__input {
		padding-left: 2.5rem;
	}

	.credit-simulation__prefix {
		color: var(--simulation-primary);
		font-weight: 700;
		left: 1rem;
		position: absolute;
		top: 50%;
		transform: translateY(-50%);
	}

	.credit-simulation__suffix {
		color: #4b5563;
		font-size: 0.875rem;
		pointer-events: none;
		position: absolute;
		right: 1rem;
		top: 50%;
		transform: translateY(-50%);
	}

	.credit-simulation__input-wrap.has-suffix .credit-simulation__input {
		padding-right: 5rem;
	}

	.credit-simulation__actions {
		display: flex;
		gap: 0.75rem;
	}

	.credit-simulation__actions button {
		border-radius: 8px;
		flex: 1;
		font-weight: 700;
		min-height: 46px;
	}

	.credit-simulation__results {
		display: none;
	}

	.credit-simulation__table-wrap {
		overflow-x: auto;
	}

	.credit-simulation__table {
		border-collapse: collapse;
		min-width: 720px;
		width: 100%;
	}

	.credit-simulation__table th,
	.credit-simulation__table td {
		border-bottom: 1px solid #e5e7eb;
		padding: 0.75rem;
		text-align: right;
		white-space: nowrap;
	}

	.credit-simulation__table th:first-child,
	.credit-simulation__table td:first-child {
		text-align: center;
	}

	.credit-simulation__table thead,
	.credit-simulation__table tfoot {
		background: var(--simulation-primary);
		color: #fff;
	}

	@media (max-width: 959px) {
		.credit-simulation__thumbnail img {
			min-height: 280px;
		}
	}

	@media (max-width: 640px) {
		.credit-simulation__thumbnail img {
			aspect-ratio: 16 / 10;
			min-height: 0;
		}

		.credit-simulation__actions {
			flex-direction: column-reverse;
		}
	}
</style>

<main class="credit-simulation">
	@php
	$headerImage = asset('frontend/bpremas/1ramah.png');
	@endphp

	<section class="uk-hidden@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
		style="background-image: url('{{ $headerImage }}'); height: 400px;">
		<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
		<div class="uk-container">
			<div class="uk-position uk-position-left-center uk-width-4-5">
				<h1 class="uk-h1">Simulasi</h1>
			</div>
		</div>
	</section>

	<section class="uk-hidden@l uk-visible@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
		style="background-image: url('{{ $headerImage }}'); height: 400px;">
		<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
		<div class="uk-position uk-position-bottom-left uk-width-4-5">
			<div class="uk-container">
				<h1 class="uk-h1">Simulasi</h1>
			</div>
		</div>
	</section>

	<section class="uk-visible@l uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext"
		style="background-image: url('{{ $headerImage }}'); height: 400px;">
		<div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
		<div class="uk-position uk-position-bottom-left uk-width-1-1">
			<div class="uk-container">
				<h1 class="uk-h1">Simulasi</h1>
			</div>
		</div>
	</section>
	<section class="uk-section uk-section-muted">
		<div class="uk-container">
			<div class="credit-simulation__card uk-padding">
				<div class="uk-grid-large uk-flex-middle" data-uk-grid>
					<div class="uk-width-1-2@m">
						<div class="credit-simulation__form uk-padding">
							<h2 class="uk-h3 uk-light uk-margin-medium-bottom">Data Kredit</h2>

							<div class="uk-margin">
								<label class="credit-simulation__label" for="credit-plafon">Plafon Pembiayaan</label>
								<div class="credit-simulation__input-wrap">
									<span class="credit-simulation__prefix">Rp</span>
									<input class="credit-simulation__input" id="credit-plafon" inputmode="numeric"
										placeholder="Contoh: 100.000.000" type="text">
								</div>
							</div>

							<div class="uk-margin">
								<label class="credit-simulation__label" for="credit-tenor">Lama Angsuran</label>
								<div class="credit-simulation__input-wrap has-suffix">
									<input class="credit-simulation__input" id="credit-tenor" inputmode="numeric"
										min="1" placeholder="Contoh: 24" type="number">
									<span class="credit-simulation__suffix">Bulan</span>
								</div>
							</div>

							<div class="uk-margin">
								<label class="credit-simulation__label" for="credit-rate">Bunga</label>
								<div class="credit-simulation__input-wrap has-suffix">
									<input class="credit-simulation__input" id="credit-rate" inputmode="decimal"
										min="0" placeholder="Contoh: 12" step="0.01" type="number">
									<span class="credit-simulation__suffix">% / Tahun</span>
								</div>
							</div>

							<div class="uk-margin">
								<label class="credit-simulation__label" for="credit-method">Sistem Angsuran</label>
								<select class="credit-simulation__select" id="credit-method">
									<option value="">Pilih sistem angsuran</option>
									<option value="flat">Flat</option>
									<option value="annuity">Anuitas</option>
								</select>
							</div>

							<div class="credit-simulation__actions uk-margin-medium-top">
								<button class="uk-button uk-button-default" id="credit-reset" type="button">Reset</button>
								<button class="uk-button uk-button-primary" id="credit-calculate" type="button">Hitung</button>
							</div>
						</div>
					</div>

					<div class="uk-width-1-2@m">
						<div class="credit-simulation__thumbnail">
							<img alt="Ilustrasi simulasi kredit"
								src="{{ asset('frontend/bpremas/konten.png') }}">
						</div>
					</div>
				</div>

				<div class="credit-simulation__results uk-margin-large-top" id="credit-results">
					<h2 class="uk-h3">Hasil Simulasi</h2>
					<div class="credit-simulation__table-wrap">
						<table class="credit-simulation__table">
							<thead>
								<tr>
									<th>Tenor</th>
									<th>Angsuran Pokok</th>
									<th>Angsuran Bunga</th>
									<th>Total Angsuran</th>
									<th>Baki Debet</th>
								</tr>
							</thead>
							<tbody id="credit-results-body"></tbody>
							<tfoot id="credit-results-total"></tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<script>
	(() => {
		const form = {
			plafon: document.getElementById('credit-plafon'),
			tenor: document.getElementById('credit-tenor'),
			rate: document.getElementById('credit-rate'),
			method: document.getElementById('credit-method')
		};
		const results = document.getElementById('credit-results');
		const resultsBody = document.getElementById('credit-results-body');
		const resultsTotal = document.getElementById('credit-results-total');
		const currency = new Intl.NumberFormat('id-ID', {
			minimumFractionDigits: 0,
			maximumFractionDigits: 0
		});

		const roundInstallment = (value) => Math.ceil(value / 50) * 50;
		const formatCurrency = (value) => `Rp ${currency.format(Math.max(0, value))}`;
		const formatAmountInput = (value) => currency.format(Number(value.replace(/\D/g, '')) || 0);

		const calculateFlat = (principal, months, monthlyRate) => {
			const monthlyPrincipal = principal / months;
			const monthlyInterest = roundInstallment(principal * monthlyRate);
			let balance = principal;
			const schedule = [];

			for (let month = 1; month <= months; month += 1) {
				const principalPayment = month === months ?
					balance :
					roundInstallment(monthlyPrincipal);
				const interestPayment = monthlyInterest;
				const installment = principalPayment + interestPayment;
				balance = Math.max(0, balance - principalPayment);
				schedule.push({
					month,
					principalPayment,
					interestPayment,
					installment,
					balance
				});
			}

			return schedule;
		};

		const calculateAnnuity = (principal, months, monthlyRate) => {
			const payment = monthlyRate === 0 ?
				principal / months :
				(principal * monthlyRate) / (1 - (1 + monthlyRate) ** -months);
			let balance = principal;
			const schedule = [];

			for (let month = 1; month <= months; month += 1) {
				const interestPayment = roundInstallment(balance * monthlyRate);
				const principalPayment = month === months ?
					balance :
					Math.min(balance, roundInstallment(payment - interestPayment));
				const installment = principalPayment + interestPayment;
				balance = Math.max(0, balance - principalPayment);
				schedule.push({
					month,
					principalPayment,
					interestPayment,
					installment,
					balance
				});
			}

			return schedule;
		};

		const renderResults = (schedule) => {
			const totals = schedule.reduce((result, row) => ({
				principalPayment: result.principalPayment + row.principalPayment,
				interestPayment: result.interestPayment + row.interestPayment,
				installment: result.installment + row.installment
			}), {
				principalPayment: 0,
				interestPayment: 0,
				installment: 0
			});

			resultsBody.innerHTML = schedule.map((row) => `
                <tr>
                    <td>${row.month}</td>
                    <td>${formatCurrency(row.principalPayment)}</td>
                    <td>${formatCurrency(row.interestPayment)}</td>
                    <td>${formatCurrency(row.installment)}</td>
                    <td>${formatCurrency(row.balance)}</td>
                </tr>
            `).join('');

			resultsTotal.innerHTML = `
                <tr>
                    <th>Total</th>
                    <th>${formatCurrency(totals.principalPayment)}</th>
                    <th>${formatCurrency(totals.interestPayment)}</th>
                    <th>${formatCurrency(totals.installment)}</th>
                    <th>-</th>
                </tr>
            `;
			results.style.display = 'block';
		};

		form.plafon.addEventListener('input', (event) => {
			event.target.value = formatAmountInput(event.target.value);
		});

		document.getElementById('credit-calculate').addEventListener('click', () => {
			const principal = Number(form.plafon.value.replace(/\D/g, ''));
			const months = Number(form.tenor.value);
			const annualRate = Number(form.rate.value);
			const monthlyRate = annualRate / 12 / 100;

			if (!principal || !months || annualRate < 0 || !form.method.value) {
				window.alert('Harap lengkapi data simulasi dengan benar.');
				return;
			}

			const schedule = form.method.value === 'flat' ?
				calculateFlat(principal, months, monthlyRate) :
				calculateAnnuity(principal, months, monthlyRate);
			renderResults(schedule);
		});

		document.getElementById('credit-reset').addEventListener('click', () => {
			form.plafon.value = '';
			form.tenor.value = '';
			form.rate.value = '';
			form.method.value = '';
			resultsBody.innerHTML = '';
			resultsTotal.innerHTML = '';
			results.style.display = 'none';
		});
	})();
</script>
@endsection