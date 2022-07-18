<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @yield('head-meta')
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/fav.png">
  <!-- Author Meta -->
  <meta name="author" content="codepixer">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
  <title>@yield('title', 'Portal') - Museum Panji</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
  <!--
  CSS
  ============================================= -->
  <link rel="stylesheet" href="{{ asset('assets/landing/css/linearicons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/landing/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/landing/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/landing/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/landing/css/nice-select.css') }}">					
  <link rel="stylesheet" href="{{ asset('assets/landing/css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/landing/css/owl.carousel.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/landing/css/main.css') }}">
  @yield('head-link')
  <style>
    .video_contain {
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
    }
    #intro-video{
      position: absolute;
      top: 0;
      left: 0;
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .btn-outline-primary{
      color: #88d200;
      border-color: #88d200;
    }
    .btn-outline-primary:hover,
    .btn-outline-primary:focus,
    .btn-outline-primary:active{
      background-color: #88d200;
      color: #fff;
      border-color: #88d200;
    }
    .btn-outline-primary h4{
      color: #88d200;
    }
    .btn-outline-primary:hover h4,
    .btn-outline-primary:focus h4,
    .btn-outline-primary:active h4{
      color: #fff;
    }
  </style>
</head>