<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('frontend.layouts.head')

<body id="body">

<div class="layout-boxed">

    @include('frontend.layouts.pre-loader')

    @include('frontend.menus.header-menu')

    @yield('content')

    @include('frontend.layouts.footer')
</div>

@include('frontend.layouts.script')
</body>

</html>
