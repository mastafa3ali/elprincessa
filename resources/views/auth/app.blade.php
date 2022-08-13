<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('front')}}/css/maicons.css">

    <link rel="stylesheet" href="{{ asset('front')}}/css/bootstrap.css">

    <link rel="stylesheet" href="{{ asset('front')}}/vendorAsset/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="{{ asset('front')}}/vendorAsset/animate/animate.css">

    <link rel="stylesheet" href="{{ asset('front')}}/css/theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="background show-spinner no-footer">

    @yield('content')

<script src="{{ asset('front') }}/js/jquery-3.5.1.min.js"></script>
<script src="{{ asset('front') }}/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('front') }}/vendorAsset/owl-carousel/js/owl.carousel.min.js"></script>
<script src="{{ asset('front') }}/vendorAsset/wow/wow.min.js"></script>
<script src="{{ asset('front') }}/js/theme.js"></script>
</body>
</html>

