<!DOCTYPE html>


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
@include('frontend.inc_fe.headadmin')

<body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">

	<div class="flex overflow-hidden">
	
		<!-- BEGIN: Content -->
		<div class="content">
			@include('frontend.inc_fe.topbaradmin')
			<input id="showToastsuccess" value="{{ session('success') ?? '' }}" type="hidden">
			<input id="showToasterror" value="{{ session('error') ?? '' }}" type="hidden">
			<input id="showToastinfo" value="{{ session('info') ?? '' }}" type="hidden">
			
			<!-- END: Delete Confirmation Modal -->
			@yield('content')
		</div>
		<!-- END: Content -->
	</div>
	@include('frontend.inc_fe.scriptadmin')

</body>

</html>

