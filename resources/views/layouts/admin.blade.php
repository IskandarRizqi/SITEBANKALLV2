<!DOCTYPE html>
<!--
Template Name: Tinker - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
@include('inc.headadmin')

<body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">
	@include('inc.mobilemenuadmin')

	<div class="flex mt-[4.7rem] md:mt-0 overflow-hidden">
		@include('inc.sidebaradmin')
		<!-- BEGIN: Content -->
		<div class="content">
			@include('inc.topbaradmin')
			<input id="showToastsuccess" value="{{ session('success') ?? '' }}" type="hidden">
			<input id="showToasterror" value="{{ session('error') ?? '' }}" type="hidden">
			<input id="showToastinfo" value="{{ session('info') ?? '' }}" type="hidden">
			<!-- BEGIN: Delete Confirmation Modal -->
			<div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body p-0">
							<div class="p-5 text-center">
								<i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
								<div class="text-3xl mt-5">Apakah Kamu Yakin?</div>
								<div class="text-slate-500 mt-2">
									Data Yang Dihapus tidak bisa kembali

								</div>
							</div>
							<div class="px-5 pb-8 text-center">
								<form action="" method="POST" id="formdelete">
									@csrf
									@method('delete')
									<span data-tw-dismiss="modal"
										class="btn btn-outline-secondary w-24 mr-1">Cancel</span>
									<button type="submit" class="btn btn-danger w-24">Delete</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END: Delete Confirmation Modal -->
			@yield('content')
		</div>
		<!-- END: Content -->
	</div>
	@include('inc.scriptadmin')

</body>

</html>