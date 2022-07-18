<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>MUSEUM PANJI</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<meta name="description" content="">
	<meta name="Keywords" content="MUSEUM PANJI">
	<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="7ee80d6c-96c1-468f-ba5b-2020cc6e1a49";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
	
	<link rel="shortcut icon" href="/media/logo.png">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/custom/style2.css') }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body>
	<style>
		 <style>
        body{
            background-image: url(./person-984282_1280.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            height: 100%;
        }
        .title{
            text-align: center;
            font-size: 2.5em;
            color: #000;
        }
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
						<a href="{{ url('/beranda') }}" class="icon">
							<img src="{{asset('assets/image/home.png')}}" alt="">
						</a>
						<div class="title">BERANDA</div>
					</div> 
				</li>
				<li>
					<div class="cpanel-item">
						<a href="{{ url('/gallery') }}" class="icon">
							<img src="{{asset('assets/image/galery.png')}}" alt="">
						</a>
						<div class="title">GALERY</div>
					</div> 
				</li>
				<li>
					<div class="cpanel-item">
						<a href="{{ url('/profil') }}" class="icon">
							<img src="{{asset('assets/image/sejarah.png')}}" alt="">
						</a>
						<div class="title">SEJARAH</div>
					</div> 
				</li>		
				<ul class="571 cpanel colorfull" >
				<li>
					<div class="cpanel-item">
						<a href="{{ url('/virtual-tour') }}" class="icon">
							<img src="{{asset('assets/image/virtualtour.png')}}" style="width: 100%;" alt="">
						</a>
						<div class="title">VIRTUAL TOUR</div>
					</div>
				</li>																
				<li>
					<div class="cpanel-item">
						<a href="{{ url('/info') }}" target="_blank" class="icon">
							<img src="{{asset('assets/image/info.png')}}" alt="">
						</a>
						<div class="title">TENTANG KAMI</div>
					</div>
				</li>
			</ul>
			<div class="clearfix"></div>
			<br/><br/>
				<a href="{{ url('/virtual-tour') }}" class="enter-btn">MASUK KE VIRTUAL TOUR <i class="fa fa-long-arrow-right"></i></a>
		</div>
			<video id="intro-video" background-size="cover" playsinline autoplay muted loop poster="/media/background.jpg">
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