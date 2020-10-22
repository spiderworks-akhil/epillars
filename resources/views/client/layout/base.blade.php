<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->
<head>
    <title>@yield('meta_title','ePillars Systems | IT solution provider in Middle East')</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="keywords" content="@yield('meta_keywords','IT services company')" />
    <meta name="description" content="@yield('meta_description','We are IT services company in Dubai providing ERP system, accounting and billing software, learning management, HR solutions, Organisation charting software, Video conferencing, CCTV cameras, Security and surviellance solutions, Bulk SMS Solution, SMS Gateway Integration, Wifi networking, Avaya Call Recording, Home automation, smart home solutions, office software, in Dubai, Abu Dhabi, UAE')" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.html">

    <!-- this styles only adds some repairs on idevices  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    @include('client.common.style')
    <script>
        $.ajaxSetup({
        headers: {
        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
        });
    </script>

</head>

<body>

<div class="site_wrapper">

@include('client.common.header')
    <div class="clearfix"></div>
@section('content') @show

</div>


@include('client.common.footer')

@include('client.common.script')

<script>
    @yield('extra_js')
</script>

</body>

</html>
