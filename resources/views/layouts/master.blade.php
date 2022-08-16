<!DOCTYPE html>
<html lang="en">

    @include('layouts.head')

<body id="page-top">
        <!-- Navigation-->
         @include('layouts.nav')

        <!-- Masthead-->

        @include('layouts.header')

        @yield('content')

        <!-- Footer-->
    @include('layouts.footer')
    @include('vendor.roksta.toastr')
</body>
</html>
