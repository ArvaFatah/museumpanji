<!DOCTYPE html>
<html lang="id">
<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
  <title>Museum Panji</title>

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
  <body>
    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
      <video id="intro-video" playsinline autoplay muted loop poster="/media/background.jpg">
				<source src="{{ asset('assets/videos/video.mp4') }}" type="video/mp4">
			</video>
      <div class="overlay overlay-bg"></div>	
      <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
          <div class="banner-content col-lg-8">
            <img src="{{asset('assets/image/logo.png')}}" width="450" alt="" title="" />
            <div class="row mt-5 justify-content-center">
              <div class="col-lg-4 justify-content-center">
                <a href="{{url('profil')}}" class="btn btn-outline-primary rounded-0 text-uppercase w-100 py-5">
                  <span class="lnr lnr-rocket" style="font-size: 36px;"></span>
                  <h4 class="mt-4">Profil</h4>
                </a>						
              </div>
              <div class="col-lg-4 justify-content-center">
                <a href="{{url('gallery')}}" class="btn btn-outline-primary rounded-0 text-uppercase w-100 py-5">
                  <span class="lnr lnr-rocket" style="font-size: 36px;"></span>
                  <h4 class="mt-4">Gallery</h4>
                </a>						
              </div>
              <div class="col-lg-4 justify-content-center">
                <a href="{{url('virtual-tour')}}" class="btn btn-outline-primary rounded-0 text-uppercase w-100 py-5">
                  <span class="lnr lnr-rocket" style="font-size: 36px;"></span>
                  <h4 class="mt-4">Virtual Tour</h4>
                </a>						
              </div>
            </div>
            <div class="row mt-4 justify-content-center">
              <div class="col-lg-4 justify-content-center">
                <a href="#" class="btn btn-outline-primary rounded-0 text-uppercase w-100 py-5">
                  <!-- <span class="lnr lnr-rocket" style="font-size: 36px;"></span> -->

                <img src="{{asset('assets/image/logo.png')}}" width="150" alt="" title="" />
                  <h4 class="mt-4">Contoh Gambar</h4>
                </a>						
              </div>
            </div>
            <a href="{{url('landing')}}" class="primary-btn text-uppercase mt-5">Masuk Ke Website</a>
          </div>											
        </div>
      </div>					
    </section>
    <!-- End banner Area -->

    <script src="{{ asset('assets/landing/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/landing/js/vendor/bootstrap.min.js') }}"></script>		
    <script src="{{ asset('assets/landing/js/main.js') }}"></script>	
  </body>
</html>



