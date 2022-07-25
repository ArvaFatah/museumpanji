@extends('layouts.artmuseum.base')
@section('title','info')
@section('content')
<!-- start banner Area -->
<section class="banner-area relative" id="home">	
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          About us
        </h1>	
        <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> About us</a></p>
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

			<!-- Start about info Area -->
			<section class="section-gap info-area" id="about">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-40 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">About Museum Panji</h1>
								<p>Museum Panji | The Cultural Hero</p>
							</div>
						</div>
					</div>					
					<div class="single-info row mt-40">
						<div class="col-lg-6 col-md-12 mt-120 text-center no-padding info-left">
							<div class="info-thumb">
								<img src="{{asset('assets/image/patung.jpg')}}" class="img-fluid" alt="">
							</div>
						</div>
						<div class="col-lg-6 col-md-12 no-padding info-rigth">
							<div class="info-content">
								<h2 class="pb-30">{{ $profil->judul }}</h2>
								<p style="white-space: pre-line;">
								{{ $profil->deskripsi }}
								</p>
								</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End about info Area -->

			<!-- Start upcoming-event Area -->
			<section class="upcoming-event-area section-gap" id="events">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-left">
								
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-13 event-left">
							<div class="single-events">
								<img class="img-fluid" src="{{asset('assets/image/inggil.jpg')}}" alt="">
								<p>
									<br>
										<h5>Data Profil Museum Panji</h5> a) Nama Museum : Museum Panji
									</br>
									<br>
										b) Alamat Museum : Jl. Ringin Anom Desa Slamet Kecamatan Tumpang Kabupaten Malang

										Jawa Timur 65616
									</br>
									<br>
										Letak Administrasi :

										Akses ke museum panji dapat dari beberapa rute yaitu dari Bandar Udara Abdurrahman Saleh (12,4 kilometer), Stasiun Malang (12,6 kilometer), Terminal Arjosari (15,9 kilometer), Terminal Gadang (16 kilometer), atau alun-alun Kota Malang (13,5 kilometer).
									</br>
									<br>
										Letak Geografis :

										Letak titik koordinatnya :  8°00’10.1” Lintang Selatan dan 112°43’48.3” Bujur Timur.
									</br>
									<br>
										c)    Nomor Telepon/Faks: (0341) 789678, 087759746733
									</br>
									<br>
										d)    Contact Person : Dwi Cahyono
									</br>
									<br>
										e)    Alamat 

												Email : museumpanji@gmail.com

									</br>
								</p>
																<p>
									<br>
										<h5>Visi</h5> <br>Mewujudkan Museum Panji sebagai salah satu objek wisata Sejarah Panji dan Budaya Panji, Edukatif, Rekreatif serta Atraktif bagi semua lapisan masyarakat.</br>
									</br>
								</p>
								<p>
									<h5>Misi</h5><br>a.    Mengaplikasikan peran museum sebagai pelestarian benda-benda peninggalan sejarah dan budaya Malang</br>

                                                <br>b.    Mewujudkan museum sebagai pusat penelitian.</br>

                                                <br>c.    Mengkomunikasikan koleksi sebagai bukti sejarah budaya Panji.</br>

                                                <br>d.    Menyelenggarakan kegaiatan edukatif dan rekreatif yang atraktif.</br>

                                                <br>e.    Memberikan pengalaman menyenagkan bagi pengunjung.</br>

                                                <br>f.     Memberikan pengalaman prima bagi pengunjung</br>
								</p>
							</div>
							</div>							
						</div>
					</div>
				</div>	
			</section>
			<!-- End upcoming-event Area -->
@endsection