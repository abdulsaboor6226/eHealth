<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Medcare Medical</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/vendors/animate-css/animate.css">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/responsive.css">
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
<script src="{{asset('frontend')}}/js/jquery-2.2.4.min.js"></script>
<script src="{{asset('frontend')}}/js/popper.js"></script>
<script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
<script src="{{asset('frontend')}}/js/stellar.js"></script>
<script src="{{asset('frontend')}}/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.ajaxchimp.min.js"></script>
<script src="{{asset('frontend')}}/js/waypoints.min.js"></script>
<script src="{{asset('frontend')}}/js/mail-script.js"></script>
<script src="{{asset('frontend')}}/js/contact.js"></script>
<script src="{{asset('frontend')}}/js/jquery.form.js"></script>
<script src="{{asset('frontend')}}/js/jquery.validate.min.js"></script>
<script src="{{asset('frontend')}}/js/mail-script.js"></script>
<script src="{{asset('frontend')}}/js/theme.js"></script>
</body>
</html>