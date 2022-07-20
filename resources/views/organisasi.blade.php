@extends('layouts.artmuseum.base')
@section('title','Beranda')
@section('content')
<!-- start banner Area -->
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
      <div class="row d-flex align-items-center justify-content-center">
        <div class="about-content col-lg-12">
          <h1 class="text-white">
            Struktur Organisasi
          </h1>	
          <p class="text-white link-nav"><a href="index.html">Beranda </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> Struktur Organisasi </a></p>
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
								<h1 class="mb-10">Struktur Organisasi</h1>
								<p>Bagan Organisasi Museum Panji</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-15 event-left">
							<div class="single-events">
								<img class="img-fluid" src="{{asset('assets/image/organisasi.jpg')}}" alt="">
								<p>
										<table border="1" width="100%" cellpadding="5"cellspacing="0">
										<tr bgcolor="goldenrod">
											<td width="40">No</td><td>Nama</td><td>Jabatan</td><td>Keterangan</td>
										</tr>
										<tr>
											<td>1.</td><td>Dwi Cahyono</td><td>Kepala Museum</td><td></td>
										</tr>
										<tr>
											<td>2.</td><td>Maratun Nafi'ah</td><td>Keuangan</td><td></td>
										</tr>
										<tr>
											<td>3.</td><td>Abdurokhim</td><td>Humas Pemasaran</td><td></td>
										</tr>
										<tr>
											<td>4.</td><td>Ratnawati</td><td>Register</td><td></td>
										</tr>
										<tr>
											<td>5.</td><td>Syarifudin</td><td>Kurator</td><td></td>
										</tr>
										<tr>
											<td>6.</td><td>Syaiful Akbar</td><td>Edukator</td><td></td>
										</tr>
										<tr>
											<td>7.</td><td>Candra</td><td>Konservator</td><td></td>
										</tr>
										<tr>
											<td>8.</td><td>Adi</td><td>Penata Pameran</td><td></td>
										</tr>
										<tr>
											<td>9.</td><td>Firda</td><td>Kepegawaian</td><td></td>
										</tr>
										<tr>
											<td>10.</td><td>Ida</td><td>Ketatausahaan</td><td></td>
										</tr>
										<tr>
											<td>11.</td><td>Hari</td><td>Kerumahtanggan</td><td></td>
										</tr>
										<tr>
											<td>12.</td><td>Yuke</td><td>Keamanan</td><td></td>
										</tr>
										</table>
										</div>
										<div class="col-3 col-s-4">
								</p>
							</div>
							</div>							
						</div>
					</div>
				</div>	
			</section>
			<!-- End upcoming-event Area -->
			
@endsection