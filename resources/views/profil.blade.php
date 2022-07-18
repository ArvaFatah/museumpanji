@extends('layouts.artmuseum.base')
@section('title','Profil')
@section('content')
<!-- start banner Area -->
<section class="banner-area relative" id="home">	
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Profil
        </h1>	
        <p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> Profil</a></p>
      </div>											
    </div>
  </div>
</section>
<!-- End banner Area -->	

<!-- Start about info Area -->
<section class="section-gap info-area" id="about">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-40 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-10">Beberapa kata tentang Museum kami</h1>
          <p>Yang sangat mencintai sistem ramah lingkungan.</p>
        </div>
      </div>
    </div>					
    <div class="single-info row mt-40">
      <div class="col-lg-6 col-md-12 mt-120 text-center no-padding info-left">
        <div class="info-thumb">
          <img src="{{ asset('assets/image/patung.jpg') }}" class="img-fluid" alt="">
        </div>
      </div>
      <div class="col-lg-6 col-md-12 no-padding info-rigth">
        <div class="info-content">
          <h2 class="pb-30">{{ $profil->judul }}</h2>
          <p>
          {{ $profil->deskripsi }}
          </p>
          </div>
      </div>
    </div>
  </div>
</section>
<!-- End about info Area -->
@endsection

