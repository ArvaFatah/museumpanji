@extends('layouts.artmuseum.base')
@section('title','Beranda')
@section('content')
<!-- start banner Area -->
<section class="banner-area relative" id="home">
  <div class="overlay overlay-bg"></div>	
  <div class="container">
    <div class="row fullscreen d-flex align-items-center justify-content-center">
      <div class="banner-content col-lg-8">
        <h6 class="text-white">Buka Senin-Minggu Pukul 08.00-17.00 </h6>
        <h1 class="text-white">
          VIRTUAL TOUR MUSEUM PANJI				
        </h1>
        <p class="pt-20 pb-20 text-white">
			Melihat Lokasi Museum Nasional dengan view 360º dapat memberikan kesan tersendiri, khususnya bagi anda yang ingin mengetahui lokasi kami secara utuh. Eksplorasi lokasi kami menggunakan Virtual Tour.
        </p>
        <a href="{{ url('/virtual-tour') }}" class="primary-btn text-uppercase">Get Started</a>
      </div>											
    </div>
  </div>					
</section>
<!-- End banner Area -->	


			<!-- Start quote Area -->
			<section class="quote-area pt-100">
				<div class="container">				
					<div class="row">
						<div class="col-lg-6 quote-left">
							<h1>
								<span>History</span> gives the mind and knowledge to be more broad and open.<br>
								Let the <span>mind</span>, fly <br>
								to the <span>imagination</span>.
							</h1>
						</div>
						<div class="col-lg-6 quote-right">
							<p>
								Sejarah yaitu ilmu yang menyelidiki perkembangan-perkembangan mengenai peristiwa dan kejadian di masa lampau.
								Sejarah merupakan kejadian dan peristiwa yang berhubungan dengan manusia, yang menyangkut perubahan nyata dalam kehidupan manusia.
							</p>
						</div>
					</div>
				</div>	
			</section>
			<!-- End quote Area -->			


			<!-- Start service Area -->
			<section class="service-area section-gap" id="about">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="single-service">
							  <span class="lnr lnr-clock"></span>
							  <h4>Jam Operasional</h4>
							  <p>
							
							  	 Buka Setiap Hari <br>SENIN - MINGGU : 09.00 - 17.00 WIB</br> 
							
							  </p>						 	
							  <div class="overlay">
							    <div class="text">
							    	<p>
							    		Museum Panji buka setiap hari, dari pukul 8 pagi hingga pukul 5 sore. Untuk hari besar dan tanggal merah libur / menyesuaikan. 
							    	</p>
									<a href="https://linktr.ee/museumpanji?utm_source=linktree_profile_share&ltsid=c1314932-439e-4f09-a82a-56320847f53a" target="_blank" class="text-uppercase primary-btn">Buy ticket</a>
							    </div>
							  </div>
							</div>							
						</div>
						<div class="col-lg-4">
							<div class="single-service">
							  <span class="lnr lnr-rocket"></span>
							  <h4>Infromasi Tiket</h4>
							  <p>
							  	Dewasa 		: Rp. 15.000,- 
								<br>Anak - Anak : Rp. 10.00,- </br>
							  </p>						 	
							  <div class="overlay">
							    <div class="text">
							    	<p>
							    		Tiket sudah termasuk tiket untuk masuk ke Museum Panji dan Kolam Renang. Usia di bawah 2 tahun tidak dikenakan biaya tiket.
							    	</p>
							    	<a href="https://linktr.ee/museumpanji?utm_source=linktree_profile_share&ltsid=c1314932-439e-4f09-a82a-56320847f53a" target="_blank" class="text-uppercase primary-btn">Buy ticket</a>
							    </div>
							  </div>
							</div>							
						</div>
						<div class="col-lg-4">
							<div class="single-service">
							  <span class="lnr lnr-briefcase"></span>
							  <h4>Reservasi Acara Terbuka</h4>
							  <p>
							  	Museum Panji menyediakan tempat bagi yang ingin mengadakan event.
							  </p>						 	
							  <div class="overlay">
							    <div class="text">
							    	<p>
							    		Sahabat Panji juga bisa melakukan kegiatan seperti, acara rapat, pernikahan, wisuda, halal bi halal, dan lain-lain. Bagi yang ingin memesan bisa reservasi dahulu di halaman ini. 
							    	</p>
							    	<a href="https://linktr.ee/museumpanji?utm_source=linktree_profile_share&ltsid=c1314932-439e-4f09-a82a-56320847f53a" target="_blank" class="text-uppercase primary-btn">Buy ticket</a>
							    </div>
							  </div>
							</div>							
						</div>												
					</div>
				</div>	
			</section>
			<!-- End service Area -->

			<!-- Start upcoming-event Area -->
			<section class="upcoming-event-area section-gap" id="events">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Checkout our Upcoming Events</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-6 event-left">
							<div class="single-events">
								<img class="img-fluid" src="{{asset('assets/image/inggil1.jpg')}}" alt="">
								<a href="#"><h4>Struktur Organisasi</h4></a>
								<h6><span>Bagan</span> Organisasi Museum Panji</h6>
								<p>
									Museum Panji memiliki bagan organisasi yaitu, Pak Dwi Cahyono selaku Owner juga Kepala Museum Panji. 
								</p>
								<a href="{{ url('/organisasi') }}" class="primary-btn text-uppercase">View Details</a>
							</div>
							<div class="single-events">
								<img class="img-fluid" src="{{asset('assets/image/inggil1.jpg')}}" alt="">
							</div>							
						</div>
						<div class="col-lg-6 event-right">
							<div class="single-events">
								<a href="#"><h4>Sejarah Tentang Museum Panji</h4></a>
								<h6><span>History</span> of Museum Panji</h6>
								<p>
									Cerita panji merupakan ilham asli, lebih dari pengelolahan kembali tema-tema yang dipinjam dari tempat lain seperti Ramayana dan mahabarata dari india. Cerita asli dari jawa. Namun menjadi terkenal dibeberapa negara.
								</p>
								<a href="{{ url('/sejarah') }}" class="primary-btn text-uppercase">View Details</a>
								<img class="img-fluid" src="{{asset('assets/image/inggil1.jpg')}}" alt="">
							</div>
							<div class="single-events">
								
								<a href="#"><h4>Visi & Misi</h4></a>
								<h6><span>Visi & Misi</span> Museum Panji</h6>
								<p>
									Mewujudkan Museum Panji sebagai salah satu objek wisata Sejarah Panji dan Budaya Panji, Edukatif, Rekreatif serta Atraktif bagi semua lapisan masyarakat.
								</p>
								<a href="{{ url('/visi') }}" class="primary-btn text-uppercase">View Details</a>
								<img class="img-fluid" src="img/u4.jpg" alt="">
							</div>							
						</div>
					</div>
				</div>	
			</section>
			<!-- End upcoming-event Area -->
			
@endsection