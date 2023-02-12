<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>eHealth</title>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{ asset('backend') }}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet"
        href="{{ asset('backend') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    {{-- <link rel="stylesheet" href="{{asset('backend') }}/vendors/ti-icons/css/themify-icons.css">
    --}}
    <link rel="stylesheet" href="{{ asset('backend') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend') }}/js/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend') }}/js/dropify.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend') }}/css/vertical-layout-light/style.css">
    <link rel="stylesheet"
        href="{{ asset('backend') }}/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('lifeline.png') }}" />
    <script>
        function profileImgError(image) {
            image.onerror = "";
            image.src = "{{ asset('img/demo.png') }}";
            return true;
        }
    </script>


    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/vendors/animate-css/animate.css">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/responsive.css">
    @yield('css')
</head>

<body>

    <!--================Header Menu Area =================-->
    <header class="header_area">
        @include('frontend.layouts.partials._navbar')
    </header>
    <!--================Header Menu Area =================-->
    @yield('content')
    <!--================ Start Brands Area =================-->
    <section class="brands-area background_one">
        @include('frontend.layouts.partials._brand')
    </section>
    <!--================ End Brands Area =================-->

    <!-- start footer Area -->
    <footer class="footer-area area-padding-top">
        @include('frontend.layouts.partials._footer')
    </footer>
    <!-- End footer Area -->






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('frontend') }}/js/jquery-2.2.4.min.js"></script>
    <script src="{{ asset('frontend') }}/js/popper.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/js/stellar.js"></script>
    <script src="{{ asset('frontend') }}/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.ajaxchimp.min.js"></script>
    <script src="{{ asset('frontend') }}/js/waypoints.min.js"></script>
    <script src="{{ asset('frontend') }}/js/mail-script.js"></script>
    <script src="{{ asset('frontend') }}/js/contact.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.form.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.validate.min.js"></script>
    <script src="{{ asset('frontend') }}/js/mail-script.js"></script>
    <script src="{{ asset('frontend') }}/js/theme.js"></script>

    <!-- plugins:js -->
    <script src="{{ asset('backend') }}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('backend') }}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('backend') }}/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{ asset('backend') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('backend') }}/js/dataTables.select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('backend') }}/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/vendors/select2/select2.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('backend') }}/js/off-canvas.js"></script>
    <script src="{{ asset('backend') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('backend') }}/js/template.js"></script>
    <script src="{{ asset('backend') }}/js/settings.js"></script>
    <script src="{{ asset('backend') }}/js/todolist.js"></script>
    <script src="{{ asset('backend') }}/js/dropify.min.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('backend') }}/js/dashboard.js"></script>
    <script src="{{ asset('backend') }}/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
    <!-- Custom js for this page-->
    <script src="{{ asset('backend') }}/js/file-upload.js"></script>
    <script src="{{ asset('backend') }}/js/typeahead.js"></script>
    <script src="{{ asset('backend') }}/js/select2.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    @yield('script')
</body>

</html>