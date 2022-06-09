<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>MUSEUM PANJI</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="description" content="">
	<meta name="Keywords" content="MUSEUM PANJI">
	
	<link rel="shortcut icon" href="/media/kota-malang.png">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/custom/style2.css') }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body>
	<style>
		.caption .aksara-jawa {
    		height: auto;
    		width: 55%;
    	}
    	#intro-video-container .caption h2{
    		margin-top: -35px;
    	}

	</style>
    <div class="preloader">
        <div class="loader"><img src="/media/preloader.png" alt=""></div>
    </div>
    <div id="intro-video-container">
        <div class="caption">
            <a href="" class="logo"><img src="{{asset('assets/image/logo.png')}}" style="width: 60%;" alt=""></a>
            <br/><br/><br/><br/>
			<ul class="6131 cpanel colorfull" >																	
				<li>
					<div class="cpanel-item">
						<a href="{{ url('/profil') }}" class='icon'>
							<i class="bi bi-person-fill" style="font-size: 100px; color:#fff"></i>
						</a>
						<i class="	"></i>
						<div class="title">PROFIL</div>
					</div>
				</li>
				<li>
					<div class="cpanel-item">
						<a href="{{ url('/virtual-tour') }}" class='icon'>
							<i class="bi bi-person-fill" style="font-size: 80px;"></i>
						</a>
						<div class="title">VIRTUAL TOUR</div>
					</div>
				</li>
				<li>
					<div class="cpanel-item">
						<a href="" target="_blank" class='icon'>
							<i class="bi bi-person-fill" style="font-size: 80px;"></i>
						</a>
						<div class="title">GALERI</div>
					</div>
				</li>
			</ul>
			<div class="clearfix"></div>
			<br/><br/>
			<a href="/web" class="enter-btn">MASUK KE WEBSITE <i class="fa fa-long-arrow-right"></i></a>
			</div>
			<video id="intro-video" playsinline autoplay muted loop poster="/media/background.jpg">
				<source src="{{ asset('assets/videos/video.mp4') }}" type="video/mp4">
			</video>
		</div>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
      $(function(){
        $(window).on('load', function(){
          $('.preloader').addClass('out');
        });
      });
    </script>
</body>
</html>