<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>LIGHT WAVE</title>
    <style>
        body {
            padding-top: 70px;
        }
    </style>
    <!-- BOOTSTRAP CORE CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- ION ICONS STYLES -->
    <link href="/assets/css/ionicons.css" rel="stylesheet"/>
    <!-- FONT AWESOME ICONS STYLES -->
    <link href="/assets/css/font-awesome.css" rel="stylesheet"/>
    <!-- FANCYBOX POPUP STYLES -->
    <link href="/assets/js/source/jquery.fancybox.css" rel="stylesheet"/>
    <!-- STYLES FOR VIEWPORT ANIMATION -->
    <link href="/assets/css/animations.min.css" rel="stylesheet"/>
    <!-- CUSTOM CSS -->
    <link href="/assets/css/style-solid-black.css" rel="stylesheet"/>
    <link href="/assets/css/main.css" rel="stylesheet"/>
    <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body data-spy="scroll" data-target="#menu-section">
<!--MENU SECTION START-->
@include('partials.navigation')
<!--MENU SECTION END-->

@include('layouts.partials.flash')

@yield('content')

<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME -->
<!-- CORE JQUERY -->
<script src="/assets/js/jquery-1.11.1.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="/assets/js/bootstrap.js"></script>
<!-- EASING SCROLL SCRIPTS PLUGIN -->
<script src="/assets/js/vegas/jquery.vegas.min.js"></script>
<!-- VEGAS SLIDESHOW SCRIPTS -->
<script src="/assets/js/jquery.easing.min.js"></script>
<!-- FANCYBOX PLUGIN -->
<script src="/assets/js/source/jquery.fancybox.js"></script>
<!-- ISOTOPE SCRIPTS -->
<script src="/assets/js/isotope.min.js"></script>
<!-- VIEWPORT ANIMATION SCRIPTS   -->
<script src="/assets/js/appear.min.js"></script>
<script src="/assets/js/animations.min.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="/assets/js/custom-solid.js"></script>
</body>

</html>
