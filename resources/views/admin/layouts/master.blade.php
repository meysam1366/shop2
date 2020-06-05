<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Opatix - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    @yield('header')

    <!-- App css -->
    <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
{{--    <link href="/admin/assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />--}}
    <link href="/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/css/theme.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

    @include('admin.layouts.sidebar')

    @include('admin.layouts.header')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    @yield('content')
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Overlay-->
<div class="menu-overlay"></div>


<!-- jQuery  -->
<script src="/admin/assets/js/jquery.min.js"></script>
<script src="/admin/assets/js/bootstrap.bundle.min.js"></script>
<script src="/admin/assets/js/metismenu.min.js"></script>
<script src="/admin/assets/js/waves.js"></script>
<script src="/admin/assets/js/simplebar.min.js"></script>

<!-- Sweet Alerts Js-->
<script src="/admin/assets/js/sweetalert.js"></script>

@yield('footer')

<!-- App js -->
<script src="/admin/assets/js/theme.js"></script>

@if(session()->has('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: "{{ session()->get('success') }}"
        })
    </script>
@endif


</body>

</html>
