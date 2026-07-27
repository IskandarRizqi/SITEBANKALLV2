@extends('frontend.bpremas.layout.main')

@section('content')
@php
$isAuthenticatedNasabah = auth()->check() && auth()->user()->role == 1;
@endphp
<style>
	.complaint-page {
		background: #f5f7fb;
	}

	.complaint-page__hero {
		background: linear-gradient(135deg, #0d162f, #234574);
		color: #fff;
	}

	.complaint-intro {
		background: #fff;
		border-radius: 18px;
		box-shadow: 0 12px 35px rgba(13, 22, 47, .1);
		max-width: 760px;
		padding: clamp(1.5rem, 4vw, 3rem);
		text-align: center;
		width: 100%;
	}

	.complaint-intro__button,
	.complaint-modal__submit {
		background: #0d162f;
		border: 0;
		border-radius: 8px;
		color: #fff;
		font-weight: 700;
		min-height: 48px;
		padding: .75rem 1.5rem;
	}

	.complaint-intro__button:hover,
	.complaint-modal__submit:hover {
		background: #234574;
	}

	.complaint-intro__actions {
		display: flex;
		flex-wrap: wrap;
		gap: .75rem;
		justify-content: center;
		margin-top: 1.25rem;
	}

	.complaint-intro__link {
		border: 1px solid #0d162f;
		border-radius: 8px;
		color: #0d162f;
		font-weight: 700;
		min-height: 48px;
		padding: .75rem 1.5rem;
	}

	.complaint-intro__link:hover {
		background: #eef2f7;
		color: #0d162f;
		text-decoration: none;
	}

	.complaint-modal {
		align-items: center;
		background: rgba(13, 22, 47, .68);
		display: none;
		inset: 0;
		justify-content: center;
		padding: 1rem;
		position: fixed;
		z-index: 1100;
	}

	.complaint-modal.is-open {
		display: flex;
	}

	.complaint-modal__dialog {
		background: #fff;
		border-radius: 16px;
		max-height: 90vh;
		max-width: 760px;
		overflow-y: auto;
		width: 100%;
	}

	.complaint-modal__header {
		background: #0d162f;
		color: #fff;
		padding: 1rem 1.25rem;
	}

	.complaint-modal__body {
		padding: clamp(1rem, 3vw, 1.75rem);
	}

	.complaint-modal__footer {
		display: flex;
		gap: .75rem;
		justify-content: flex-end;
		padding: 1rem 1.25rem;
	}

	.complaint-modal__footer button {
		border-radius: 8px;
		min-height: 44px;
	}

	.complaint-modal__cancel {
		background: #dc2626;
		border: 0;
		color: #fff;
	}

	.complaint-modal__cancel:hover {
		background: #b91c1c;
		color: #fff;
	}

	.complaint-modal__close {
		background: transparent;
		border: 0;
		color: #fff;
		font-size: 1.5rem;
	}

	.complaint-modal__switch {
		color: #234574;
		cursor: pointer;
		font-weight: 700;
	}

	.complaint-modal__error {
		color: #b91c1c;
		font-size: .85rem;
		margin-top: .75rem;
	}

	.complaint-label {
		color: #374151;
		display: block;
		font-size: .875rem;
		font-weight: 600;
		margin-bottom: .4rem;
	}

	.complaint-input,
	.complaint-select,
	.complaint-textarea {
		background: #fff;
		border: 1px solid #d1d5db;
		border-radius: 8px;
		box-sizing: border-box;
		color: #1f2937;
		min-height: 44px;
		padding: .65rem .8rem;
		width: 100%;
	}

	.complaint-textarea {
		min-height: 110px;
		resize: vertical;
	}

	.complaint-input:focus,
	.complaint-select:focus,
	.complaint-textarea:focus {
		border-color: #0d162f;
		box-shadow: 0 0 0 3px rgba(13, 22, 47, .12);
		outline: 0;
	}

	.complaint-panel {
		border-top: 1px solid #e5e7eb;
		display: none;
		margin-top: 1.25rem;
		padding-top: 1.25rem;
	}

	.complaint-panel.is-active {
		display: block;
	}

	.complaint-panel__title {
		color: #0d162f;
		font-size: 1rem;
		font-weight: 700;
		margin-bottom: 1rem;
	}

	.complaint-files {
		color: #64748b;
		font-size: .75rem;
		margin: .35rem 0 0;
	}

	@media (max-width: 640px) {
		.complaint-modal__footer {
			flex-direction: column-reverse;
		}

		.complaint-modal__footer button {
			width: 100%;
		}
	}
</style>

<main class="complaint-page">
	@php
	$headerImage = asset('frontend/bpremas/pengaduan.png');
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
		<div class="uk-container uk-flex uk-flex-center">
			<div class="complaint-intro">
				<h2 class="uk-h3">Layanan Pengaduan</h2>
				<p class="uk-text-muted">Silakan login atau daftar terlebih dahulu untuk mengirim dan melacak pengaduan.</p>
				<button class="complaint-intro__button" data-complaint-open type="button">Pengaduan Nasabah</button>
			</div>
		</div>
	</section>
</main>

<div class="complaint-modal" id="auth-modal" aria-hidden="true">
	<div class="complaint-modal__dialog">
		<div class="complaint-modal__header uk-flex uk-flex-between uk-flex-middle">
			<h2 class="uk-h4 uk-light uk-margin-remove" id="auth-title">Login Nasabah</h2>
			<button class="complaint-modal__close" data-close-modal="auth-modal" type="button">&times;</button>
		</div>
		<div class="complaint-modal__body">
			<div id="auth-login-panel">
				<form id="login-form">
					@csrf
					<div class="uk-margin"><label class="complaint-label" for="login-email">Email *</label><input class="complaint-input" id="login-email" name="email" required type="email"></div>
					<div class="uk-margin"><label class="complaint-label" for="login-password">Password *</label><input class="complaint-input" id="login-password" name="password" required type="password"></div>
					<div class="complaint-modal__error" id="login-error"></div>
					<button class="complaint-modal__submit uk-width-1-1 uk-margin-top" type="submit">Login</button>
				</form>
				<p class="uk-text-center uk-margin-top">Belum punya akun? <button class="complaint-modal__switch uk-button uk-button-text" data-auth-panel="register" type="button">Daftar</button></p>
			</div>

			<div id="auth-register-panel" hidden>
				<form id="register-form">
					@csrf
					<div class="uk-margin"><label class="complaint-label" for="register-name">Nama Lengkap *</label><input class="complaint-input" name="name" required type="text"></div>
					<div class="uk-margin"><label class="complaint-label" for="register-email">Email *</label><input class="complaint-input" id="register-email" name="email" required type="email"></div>
					<div class="uk-margin"><label class="complaint-label" for="register-phone">Nomor HP *</label><input class="complaint-input" name="phone" required type="tel"></div>
					<div class="uk-margin"><label class="complaint-label" for="register-address">Alamat *</label><textarea class="complaint-textarea" id="register-address" name="alamat" required></textarea></div>
					<div class="uk-margin"><label class="complaint-label" for="register-password">Password *</label><input class="complaint-input" id="register-password" name="password" required type="password"></div>
					<div class="uk-margin"><label class="complaint-label" for="register-confirmation">Konfirmasi Password *</label><input class="complaint-input" id="register-confirmation" name="password_confirmation" required type="password"></div>
					<div class="complaint-modal__error" id="register-error"></div>
					<button class="complaint-modal__submit uk-width-1-1 uk-margin-top" type="submit">Daftar</button>
				</form>
				<p class="uk-text-center uk-margin-top">Sudah punya akun? <button class="complaint-modal__switch uk-button uk-button-text" data-auth-panel="login" type="button">Login</button></p>
			</div>

			<div id="auth-otp-panel" hidden>
				<p>Kode OTP telah dikirim ke <strong id="otp-email"></strong>.</p>
				<form id="otp-form">
					@csrf
					<div class="uk-margin"><label class="complaint-label" for="otp-code">Kode OTP *</label><input class="complaint-input" id="otp-code" maxlength="6" name="otp_code" required inputmode="numeric" type="text"></div>
					<div class="complaint-modal__error" id="otp-error"></div>
					<button class="complaint-modal__submit uk-width-1-1 uk-margin-top" type="submit">Verifikasi OTP</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="complaint-modal" id="complaint-modal" aria-hidden="true">
	<div class="complaint-modal__dialog">
		<div class="complaint-modal__header uk-flex uk-flex-between uk-flex-middle">
			<h2 class="uk-h4 uk-light uk-margin-remove">Form Pengaduan Nasabah</h2>
			<button class="complaint-modal__close" data-close-modal="complaint-modal" type="button">&times;</button>
		</div>
		<div class="complaint-modal__body">
			<form action="{{ route('pengaduan.store') }}" enctype="multipart/form-data" id="complaint-form" method="POST">
				@csrf
				<div class="uk-child-width-1-2@s" data-uk-grid>
					<div><label class="complaint-label" for="jenis_aduan">Jenis Pengaduan *</label><select class="complaint-select" id="jenis_aduan" name="jenis_aduan" required>
							<option value="">Pilih jenis pengaduan</option>@foreach ($jenis_aduan as $item)<option value="{{ $item->form }}">{{ $item->nama }}</option>@endforeach
						</select></div>
					<div><label class="complaint-label" for="sub_aduan">Sub Pengaduan *</label><select class="complaint-select" id="sub_aduan" name="sub_aduan" required>
							<option value="">Pilih jenis terlebih dahulu</option>
						</select></div>
				</div>
				<div class="complaint-panel" data-complaint-panel="1">
					<h3 class="complaint-panel__title">Detail Pelanggaran</h3>
					<div class="uk-child-width-1-2@s" data-uk-grid>
						<div><label class="complaint-label">Pihak yang Dilaporkan *</label><input class="complaint-input" name="nama" type="text"></div>
						<div><label class="complaint-label">Lokasi *</label><input class="complaint-input" name="lokasi" type="text"></div>
						<div><label class="complaint-label">Jabatan</label><select class="complaint-select" name="jbt_plg">
								<option value="">Pilih jabatan</option>@foreach ($jabatan as $item)<option value="{{ $item->id }}">{{ $item->nama }}</option>@endforeach
							</select></div>
						<div><label class="complaint-label">Tanggal dan Jam</label><input class="complaint-input" name="waktu_plg" type="datetime-local"></div>
						<div><label class="complaint-label">Kerugian</label><input class="complaint-input" name="rugi" type="text"></div>
						<div class="uk-width-1-1"><label class="complaint-label">Uraian Pengaduan *</label><textarea class="complaint-textarea" name="uraian"></textarea></div>
						<div><label class="complaint-label">Bukti Gambar</label><input accept="image/jpeg,image/png" class="complaint-input" multiple name="bukti1[]" type="file">
							<p class="complaint-files">JPG/PNG, maksimal 2 MB per file.</p>
						</div>
						<div><label class="complaint-label">Bukti Audio/Video</label><input accept="audio/*,video/*" class="complaint-input" multiple name="bukti2[]" type="file">
							<p class="complaint-files">Audio/video, maksimal 50 MB per file.</p>
						</div>
					</div>
				</div>
				<div class="complaint-panel" data-complaint-panel="2">
					<h3 class="complaint-panel__title">Detail Produk atau Layanan</h3>
					<div class="uk-child-width-1-2@s" data-uk-grid>
						<div><label class="complaint-label">Nama BPR *</label><input class="complaint-input" name="namaxx" type="text" value="{{ env('APP_NAME') }}" readonly></div>
						<div><label class="complaint-label">Alamat Kantor *</label><input class="complaint-input" name="lokasixx" type="text"></div>
						<div><label class="complaint-label">Produk atau Layanan *</label><select class="complaint-select" name="jenis_pl">
								<option value="">Pilih produk atau layanan</option>@foreach ($produk as $item)<option value="{{ $item->id }}">{{ $item->title }}</option>@endforeach
							</select></div>
						<div><label class="complaint-label">Kerugian</label><input class="complaint-input" name="rugixx" type="text"></div>
						<div><label class="complaint-label">Tuntutan Nasabah *</label><input class="complaint-input" name="tuntutan_pl" type="text"></div>
						<div class="uk-width-1-1"><label class="complaint-label">Uraian Pengaduan *</label><textarea class="complaint-textarea" name="uraianxx"></textarea></div>
						<div><label class="complaint-label">Bukti Gambar</label><input accept="image/jpeg,image/png" class="complaint-input" multiple name="bukti1xx[]" type="file">
							<p class="complaint-files">JPG/PNG, maksimal 2 MB per file.</p>
						</div>
						<div><label class="complaint-label">Bukti Audio/Video</label><input accept="audio/*,video/*" class="complaint-input" multiple name="bukti2xx[]" type="file">
							<p class="complaint-files">Audio/video, maksimal 50 MB per file.</p>
						</div>
					</div>
				</div>
				<div class="complaint-modal__footer"><button class="complaint-modal__cancel uk-button" data-close-modal="complaint-modal" type="button">Batal</button><button class="complaint-modal__submit" type="submit">Kirim Pengaduan</button></div>
			</form>
		</div>
	</div>
</div>

<script>
	(() => {
		const csrf = document.querySelector('input[name="_token"]').value;
		const authModal = document.getElementById('auth-modal');
		const complaintModal = document.getElementById('complaint-modal');
		const authenticated = {
			{
				$isAuthenticatedNasabah ? 'true' : 'false'
			}
		};
		let verifiedEmail = '';
		const showModal = (modal) => {
			modal.classList.add('is-open');
			modal.setAttribute('aria-hidden', 'false');
			document.body.style.overflow = 'hidden';
		};
		const closeModal = (modal) => {
			modal.classList.remove('is-open');
			modal.setAttribute('aria-hidden', 'true');
			document.body.style.overflow = '';
		};
		const showAuthPanel = (name) => {
			['login', 'register', 'otp'].forEach((item) => document.getElementById(`auth-${item}-panel`).hidden = item !== name);
		};
		const showError = (id, message) => {
			document.getElementById(id).textContent = message || '';
		};
		const sendOtp = async (email) => {
			const response = await fetch('{{ url(' / api / send - otp ') }}', {
				method: 'POST',
				headers: {
					'Accept': 'application/json'
				},
				body: new URLSearchParams({
					email,
					_token: csrf
				})
			});
			const data = await response.json();
			if (!data.success) throw new Error(data.message || 'OTP gagal dikirim.');
		};

		document.querySelector('[data-complaint-open]').addEventListener('click', () => {
			authenticated ? showModal(complaintModal) : (showAuthPanel('login'), showModal(authModal));
		});
		document.querySelectorAll('[data-close-modal]').forEach((button) => button.addEventListener('click', () => closeModal(document.getElementById(button.dataset.closeModal))));
		document.querySelectorAll('[data-auth-panel]').forEach((button) => button.addEventListener('click', () => showAuthPanel(button.dataset.authPanel)));
		[authModal, complaintModal].forEach((modal) => modal.addEventListener('click', (event) => {
			if (event.target === modal) closeModal(modal);
		}));
		document.addEventListener('keydown', (event) => {
			if (event.key === 'Escape') document.querySelectorAll('.complaint-modal.is-open').forEach(closeModal);
		});

		document.getElementById('login-form').addEventListener('submit', async (event) => {
			event.preventDefault();
			showError('login-error', '');
			try {
				const response = await fetch('{{ url(' / pengaduan / login ') }}', {
					method: 'POST',
					headers: {
						'Accept': 'application/json'
					},
					body: new FormData(event.target)
				});
				const data = await response.json();
				if (!data.success) throw new Error(data.message);
				verifiedEmail = data.email;
				await sendOtp(verifiedEmail);
				document.getElementById('otp-email').textContent = verifiedEmail;
				showAuthPanel('otp');
			} catch (error) {
				showError('login-error', error.message);
			}
		});

		document.getElementById('register-form').addEventListener('submit', async (event) => {
			event.preventDefault();
			showError('register-error', '');
			try {
				const response = await fetch('{{ url(' / register / process ') }}', {
					method: 'POST',
					headers: {
						'Accept': 'application/json'
					},
					body: new FormData(event.target)
				});
				const data = await response.json();
				if (!data.success) throw new Error(data.message || 'Registrasi gagal.');
				verifiedEmail = data.user.email;
				document.getElementById('otp-email').textContent = verifiedEmail;
				showAuthPanel('otp');
			} catch (error) {
				showError('register-error', error.message);
			}
		});

		document.getElementById('otp-form').addEventListener('submit', async (event) => {
			event.preventDefault();
			showError('otp-error', '');
			try {
				const response = await fetch('{{ url(' / api / verify - otp ') }}', {
					method: 'POST',
					headers: {
						'Accept': 'application/json'
					},
					body: new URLSearchParams({
						email: verifiedEmail,
						otp_code: document.getElementById('otp-code').value,
						_token: csrf
					})
				});
				const data = await response.json();
				if (!data.success) throw new Error(data.message || 'OTP tidak valid.');
				closeModal(authModal);
				showModal(complaintModal);
			} catch (error) {
				showError('otp-error', error.message);
			}
		});

		const panels = document.querySelectorAll('[data-complaint-panel]');
		const requiredFields = ['nama', 'lokasi', 'uraian', 'namaxx', 'lokasixx', 'jenis_pl', 'tuntutan_pl', 'uraianxx'];
		const updatePanels = (type) => panels.forEach((panel) => {
			const active = panel.dataset.complaintPanel === type;
			panel.classList.toggle('is-active', active);
			panel.querySelectorAll('input, select, textarea').forEach((field) => {
				field.disabled = !active;
				field.required = active && requiredFields.includes(field.name);
			});
		});
		document.getElementById('jenis_aduan').addEventListener('change', async (event) => {
			const type = event.target.value;
			updatePanels(type);
			const select = document.getElementById('sub_aduan');
			select.innerHTML = '<option value="">Memuat...</option>';
			if (!type) return;
			try {
				const response = await fetch(`{{ url('/pengaduan/get-sub') }}/${type}`);
				const items = await response.json();
				select.innerHTML = '<option value="">Pilih sub pengaduan</option>';
				items.forEach((item) => select.add(new Option(item.sub_tujuan || item.nama, item.id)));
			} catch {
				select.innerHTML = '<option value="">Gagal memuat sub pengaduan</option>';
			}
		});
		updatePanels('');

		document.getElementById('complaint-form').addEventListener('submit', async (event) => {
			event.preventDefault();
			const button = event.target.querySelector('button[type="submit"]');
			button.disabled = true;
			button.textContent = 'Mengirim...';
			try {
				const response = await fetch(event.target.action, {
					method: 'POST',
					headers: {
						'Accept': 'application/json'
					},
					body: new FormData(event.target)
				});
				const data = await response.json();
				if (!data.success) throw new Error(data.message || 'Pengaduan gagal dikirim.');
				closeModal(complaintModal);
				window.alert(`${data.message}\nNomor registrasi: ${data.no_registrasi}`);
				event.target.reset();
				updatePanels('');
			} catch (error) {
				window.alert(error.message);
			} finally {
				button.disabled = false;
				button.textContent = 'Kirim Pengaduan';
			}
		});
	})();
</script>
@endsection