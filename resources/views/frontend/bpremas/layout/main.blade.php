<!DOCTYPE html>
<html lang="en-us" style="--page-header-second-line-text-color: rgba(255,255,255,0); height: 100%;">

@include('frontend.bpremas.layout.head')

<body class="app is-collapsed bjb-theme" data-uk-ef_main_app="" data-uk-ef_blog="theme-option-name:bjb-theme ;"
	data-current-language="id" style="position: relative; min-height: 100%; top: 0px;">
	@include('frontend.bpremas.layout.header')
	@include('frontend.bpremas.layout.mobile-header')
	@include('frontend.bpremas.layout.mobile-navigation')

	<div data-uk-content_builder_render="" data-uk-ef_blog_after_header=""
		class="content_builder_render uk-ef_blog_after_header" data-ef-uid="ef-uid-1784557196114-7">
	</div>

	@yield('content')

	@include('frontend.bpremas.layout.footer')
	@include('frontend.bpremas.layout.side-navigation')
	@include('frontend.bpremas.layout.templates')
	@include('frontend.bpremas.layout.scripts')
</body>

</html>