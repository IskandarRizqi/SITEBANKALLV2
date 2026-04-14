<!-- BEGIN: Head -->

<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<link href="{{asset('admin/dist/images/logo.svg')}}" rel="shortcut icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
	<meta name="keywords"
		content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
	<meta name="author" content="LEFT4CODE">
	<title>Dashboard - Web</title>
	<!-- BEGIN: CSS Assets-->
	<link rel="stylesheet" href="{{asset('admin/dist/css/app.css')}}" />
	<!-- END: CSS Assets-->

	<!-- BEGIN: PLUGIN Assets-->
	{{-- jquery start --}}
	<script src="{{asset('plugin/jquery/jquery-3.7.1.min.js')}}"></script>
	{{-- jquery end --}}
	{{-- quilljs start --}}
	<link rel="stylesheet" href="{{asset('plugin/quilljs/quill.snow.css')}}" />
	<link rel="stylesheet" href="{{asset('plugin/quilljs/quill.bubble.css')}}" />
	<script src="{{asset('plugin/quilljs/quill.js')}}"></script>
	<script src="{{asset('plugin/quilljs/quill-resize-module.js')}}"></script>
	{{-- quilljs end --}}
	{{-- datatables start --}}
	<link rel="stylesheet" href="{{asset('plugin/datatables/dataTables.dataTables.min.css')}}" />
	<script src="{{asset('plugin/datatables/dataTables.min.js')}}"></script>
	{{-- datatables end --}}
	{{-- select2 start --}}
	<link rel="stylesheet" href="{{asset('plugin/select2/select2.min.css')}}" />
	<script src="{{asset('plugin/select2/select2.min.js')}}"></script>
	{{-- select2 end --}}

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
	<!-- END: PLUGIN Assets-->

	{{-- BEGIN: Custom SCRIPT --}}
	<script>
		var csrf_token = $('meta[name="csrf-token"]').attr('content');
	</script>
	{{-- END: Custom SCRIPT --}}
</head>
<!-- END: Head -->