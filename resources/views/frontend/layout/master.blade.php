<!DOCTYPE html>
<html>
<head>
	@yield('head')

    @include('frontend.layout.header')

</head>
<body>
<div class="page-wrapper">
@include('frontend.layout.topbar')

@yield('main-content')

@include('frontend.layout.footer')
</div>
@include('frontend.layout.script')
@yield('script')
</body>
</html>