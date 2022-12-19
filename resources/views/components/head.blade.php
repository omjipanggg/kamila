<head>
	{{-- META --}}
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="Kamila—Kami lagi, kami lagi" />
	<meta name="author" content="Maula" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	{{-- TITLE --}}
	<title>{{ config('app.name', 'Kamila') }}&mdash;{{ $title }}</title>

	{{-- STYLESHEETS --}}
	{{-- DATATABLES 1.13.1//2.4.0 --}}
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" crossorigin="anonymous" />
	<link rel="stylesheet" href="//cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css" crossorigin="anonymous" />

	{{-- FONTAWESOME 6.2.1 --}}
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

	{{-- BOOTSTRAP 5.1.3 --}}
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />

	{{-- FROALA 4.0.16 --}}
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/froala-editor@4.0.16/css/froala_editor.pkgd.min.css" />

	{{-- PREDETERMINED --}}
	<link rel="stylesheet" href="{{ asset('css/custom.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/signature.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/media.min.css') }}" />

	{{-- JQUI 1.12.1//SIG --}}
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" /> 

	{{-- FAVICON --}}
	<link rel="icon" href="{{ asset('img/favicon.png') }}" />

	{{-- MAPBOX 2.6.0 --}}
	<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.css" />

	{{-- SCRIPTS --}}
	{{-- LEGACY --}}
	<script defer="" crossorigin="anonymous" src="//cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/excanvas.js"></script>

	{{-- JQUERY 3.6.1 --}}
	<script defer="" crossorigin="anonymous" src="//cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js" integrity="sha384-i61gTtaoovXtAbKjo903+O55Jkn2+RtzHtvNez+yI49HAASvznhe9sZyjaSHTau9"></script>

	{{-- DATATABLES 1.13.1 --}}
	<script defer="" crossorigin="anonymous" src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<script defer="" crossorigin="anonymous" src="//cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
	<script defer="" crossorigin="anonymous" src="//cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
	<script defer="" crossorigin="anonymous" src="//cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.js"></script>

	{{-- FONTAWESOME 6.2.1 --}}
	<script defer="" crossorigin="anonymous" src="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha384-sCgwm7cN2+PN5J6MEF+tnqkCY4Wc5WRcGU+I9b04LSQaPRMO09dnbrVilAWAbH1z"></script>

	{{-- POPPER 2.10.2//BOOTSTRAP 5.1.3 --}}
	<script defer="" crossorigin="anonymous" src="//cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"></script>
	<script defer="" crossorigin="anonymous" src="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"></script>

	{{-- FROALA 4.0.16 --}}
	<script defer="" crossorigin="anonymous" src="//cdn.jsdelivr.net/npm/froala-editor@4.0.16/js/froala_editor.pkgd.min.js"></script>

	{{-- CKEDITOR 35.3.2 --}}
	<script defer="" crossorigin="anonymous" src="//cdn.ckeditor.com/4.20.1/basic/ckeditor.js"></script>

	{{-- MAPBOX 2.6.0//TURF --}}
	<script src="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.js"></script>
	<script src='https://npmcdn.com/mapbox-gl-circle/dist/mapbox-gl-circle.min.js'></script>
	<script src='https://unpkg.com/@turf/turf@6/turf.min.js'></script>

	{{-- WEBCAM 1.0.26 --}}
	<script defer="" crossorigin="anonymous" src="//cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" integrity="sha384-b46hotfhb40Li5r1NPs9XinOjGyeO75FcshkKIikdrHeatxb0kB3tOrQCzMeksuQ"></script>

	{{-- JQUI 1.12.1//SIG --}}
	<script defer="" crossorigin="anonymous" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script defer="" crossorigin="anonymous" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

	{{-- PREDETERMINED --}}
	<script defer="" src="{{ asset('js/signature.js') }}"></script>
	<script defer="" src="{{ asset('js/chart.min.js') }}"></script>
	<script defer="" src="{{ asset('js/chart-area-demo.js') }}"></script>
	<script defer="" src="{{ asset('js/chart-bar-demo.js') }}"></script>
	<script defer="" src="{{ asset('js/chart-pie-demo.js') }}"></script>
	<script defer="" src="{{ asset('js/scripts.js') }}"></script>
</head>