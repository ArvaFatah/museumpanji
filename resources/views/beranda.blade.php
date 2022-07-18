@extends('layouts.artmuseum.base')
@section('title','Profil')
@section('content')
  <!--carousel-->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="{{asset('assets/image/Wayang.jpg')}}" class="d-block w-100" alt="Bunga Matahari "width="1600" height="800">
              <div class="carousel-caption">
              <h3>WAYANG KULIT</h3>
              <p>Salah satu koleksi wayang yang ada pada museum.</p>
            </div>
          </div>
          <div class="carousel-item">
              <img src="{{asset('assets/image/candi.jpg')}}" class="d-block w-100" alt="Kapal Berlayar">
              <div class="carousel-caption">
              <h3>REPLIKA CANDI PELATARAN</h3>
              <p>Bangunan replika Candi Pelataran.</p>
            </div>  
          </div>
          <div class="carousel-item">
              <img src="{{asset('assets/image/museum.jpg')}}" class="d-block w-100" alt="Danau "width="1600" height="800">
              <div class="carousel-caption">
              <h3>MUSEUM PANJI</h3>
              <p>Museum tentang beberapa budaya kolonial dan Panji.</p>
            </div>  
          </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
      </a>
  </div>

  <!--container-->
  <br>
  <div class="container">
      <!--grid-->
      <div class="row">
          <div class="col">
              <center>
                  <!--image border-radius-->
                  <img width="80%" src="gambar/webdesign.jpg" alt="Web Design" class="rounded-circle">
                  <h3>Sejarah Museum Panji</h3>
                  <p>
                  Cerita panji merupakan ilham asli, lebih dari pengelolahan kembali tema-tema yang dipinjam dari tempat lain seperti Ramayana dan mahabarata dari india. Cerita asli dari jawa. Namun menjadi terkenal dibeberapa negara.
                </p>
                  <!--button-->
                  <a class="btn btn-primary" href="#">Selengkapnya</a>
              </center>
          </div>

          <div class="col">
              <center>
                  <!--image border-radius-->
                  <img width="80%" src="gambar/webprogramming.jpg" alt="Web Programming" class="rounded-circle">
                  <h3>VISI & MISI</h3>
                  <p>Visi dan Misi Museum
                  Mewujudkan Museum Panji sebagai salah satu objek wisata Sejarah Panji dan Budaya Panji, Edukatif, Rekreatif serta Atraktif bagi semua lapisan masyarakat.</p>
                  <!--button-->
                  <a class="btn btn-primary" href="#">Selengkapnya</a>
              </center>
          </div>

          <div class="col">
              <center>
                  <!--image border-radius-->
                  <img width="80%" src="gambar/android.jpg" alt="Android Development" class="rounded-circle">
                  <h3>Struktur Organisasi</h3>
                  <p>Terdapat beberapa pengurus yang telah terstruktur di dalam Museum Panji, yaitu Bapak Dwi Cahyono selaku owner Museum Panji dan juga sebagai Kepala Museum Panji </p>
                  <!--button-->
                  <a class="btn btn-primary" href="#">Selengkapnya</a>
              </center>
          </div>

      </div>

      <!--row untuk membuat media objek-->
      <br><br><br>

      <div class="row">
      <div class="col-md-5">
          <img class="img-thumbnail" src="{{asset('assets/image/patung.jpg')}}" width="60%" alt="Web Design">
      </div>
          <div class="col-md-7" style="padding: 80px;">
              <h2>SEJARAH MUSEUM PANJI</h2>
              <p>
              Cerita panji merupakan ilham asli, lebih dari pengelolahan kembali tema-tema yang dipinjam dari tempat lain seperti Ramayana dan mahabarata dari india. Cerita asli dari jawa. Namun menjadi terkenal dibeberapa negara.
              </p>
          </div>
      </div>

      <hr>

      <div class="row">
          <div class="col-md-5">
              <img class="img-thumbnail" src="{{asset('assets/image/logo.png')}}" alt="Web Programming">
          </div>
          <div class="col-md-7" style="padding: 80px;">
              <h2>VISI & MISI</h2>
              <p>Visi dan Misi Museum
              Mewujudkan Museum Panji sebagai salah satu objek wisata Sejarah Panji dan Budaya Panji, Edukatif, Rekreatif serta Atraktif bagi semua lapisan masyarakat.</p>
          </div>
      </div>

      <hr>

      <div class="row">
      <div class="col-md-5">
          <img class="img-thumbnail" src="{{asset('assets/image/struktur-org.jpg')}}" alt="struktur-org">
      </div>
          <div class="col-md-7" style="padding: 80px;">
              <h2>STRUKTUR ORGANISASI</h2>
              <table border="1" width="100%" cellpadding="5"cellspacing="0">
              <tr>
                <td width="40">No.</td><td>Nama </td><td>Jabatan </td>
              </tr>
              <tr>
                <td>1.</td><td>Dwi Cahyono</td><td>Kepala Museum</td>
              </tr>
              <tr>
                <td>2.</td><td>Maratun Nafi'ah</td><td>Keuangan</td>
              </tr>
              
              </table>
              </div>
              <div class="col-3 col-s-4">
          </div>
      </div>

      <hr>
  </div>
@endsection
