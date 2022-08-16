<!doctype html>
<html lang="en">

@include('admin.layouts.head')
<body>
<!-- Preloader -->
@include('admin.layouts.loader')
<!-- Preloader -->


<!-- ======================================
******* Page Wrapper Area Start **********
======================================= -->
<div class="ecaps-page-wrapper">
    <!-- Sidemenu Area -->

    @include('admin.layouts.sideMenu')

    <!-- Page Content -->
    <div class="ecaps-page-content">
        <!-- Top Header Area -->
       @include('admin.layouts.header')

        <!-- Main Content Area -->
        @yield('content')
    </div>
</div>

<!-- ======================================
********* Page Wrapper Area End ***********
======================================= -->

@include('admin.layouts.footer')
@include('vendor.roksta.toastr')
</body>
</html>
