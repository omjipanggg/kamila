<!DOCTYPE html>
<html lang="en">
<head>
	{{-- META --}}
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="Kamila—Kami lagi, kami lagi" />
	<meta name="author" content="Maula" />

	{{-- TITLE --}}
	<title>{{ config('app.name', 'Kamila') }}</title>

	{{-- STYLESHEETS --}}
	{{-- DATATABLES 1.13.1 --}}
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css" crossorigin="anonymous" />

	{{-- FONTAWESOME 6.2.1 --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha384-twcuYPV86B3vvpwNhWJuaLdUSLF9+ttgM2A6M870UYXrOsxKfER2MKox5cirApyA" crossorigin="anonymous" />

	{{-- BOOTSTRAP 5.1.3 --}}
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

	{{-- PREDETERMINED --}}
	<link href="{{ asset('css/custom.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/media.min.css') }}" rel="stylesheet" />

	{{-- FAVICON --}}
	<link href="{{ asset('img/favicon.png') }}" rel="icon" />

	{{-- SCRIPTS --}}
	{{-- JQUERY 3.6.1 --}}
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js" integrity="sha384-i61gTtaoovXtAbKjo903+O55Jkn2+RtzHtvNez+yI49HAASvznhe9sZyjaSHTau9" crossorigin="anonymous" defer="" type="text/javascript"></script>

	{{-- DATATABLES 1.13.1 --}}
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" defer="" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js" defer="" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js" defer="" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.js" defer="" crossorigin="anonymous"></script>

	{{-- FONTAWESOME 6.2.1 --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha384-sCgwm7cN2+PN5J6MEF+tnqkCY4Wc5WRcGU+I9b04LSQaPRMO09dnbrVilAWAbH1z" crossorigin="anonymous"></script>

	{{-- POPPER 2.10.2//BOOTSTRAP 5.1.3 --}}
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

	{{-- CKEDITOR 35.3.2 --}}
	{{-- <script src="//cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js" crossorigin="anonymous" defer="" type="text/javascript"></script> --}}

	{{-- PREDETERMINED --}}
	<script src="{{ asset('js/chart.min.js') }}" crossorigin="anonymous" defer="" type="text/javascript"></script>
	<script src="{{ asset('js/chart-area-demo.js') }}" crossorigin="anonymous" defer="" type="text/javascript"></script>
	<script src="{{ asset('js/chart-bar-demo.js') }}" crossorigin="anonymous" defer="" type="text/javascript"></script>
	<script src="{{ asset('js/chart-pie-demo.js') }}" crossorigin="anonymous" defer="" type="text/javascript"></script>
	<script src="{{ asset('js/scripts.js') }}" crossorigin="anonymous" defer="" type="text/javascript"></script>
</head>

<body>
@include('components.manual')
@include('components.toast')
@yield('content')
</body>
</html>