<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body class="sb-nav-fixed">
@include('components.navbar')
<div id="move"></div>
<div id="preloader"></div>
@include('components.toast')
<div class="spacing"></div>
<div id="layoutSidenav">
    @include('components.accordion')
    <div id="layoutSidenav_content">
		@yield('content')
    @include('components.footer')
	</div>
</div>
</body>
</html>