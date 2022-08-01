@extends('layouts.artmuseum.base')

@section('title', 'Gallery')

@section('content')
  <!-- start banner Area -->
  <section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
      <div class="row d-flex align-items-center justify-content-center">
        <div class="about-content col-lg-12">
          <h1 class="text-white">
            Gallery				
          </h1>	
          <p class="text-white link-nav"><a href="{{url('landing')}}">Gallery </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#"> Detail</a></p>
        </div>											
      </div>
    </div>
  </section>
  <!-- End banner Area -->	

  <!-- Start gallery Area -->
  <section class="gallery-area section-gap gallery-page-area" id="gallery">
    <div class="container">
      <div class="row d-flex">
        <div class="pb-70 col-lg-6 text-right">
          <h1 class="mb-1">{{ $gallery->judul }}</h1>
          <span class="text-mute small d-block mb-20">{{ $gallery->created_at }}</span>
          <a href="{{ url('virtual-tour') }}" class="card bg-dark text-white w-50 ml-auto">
            <img src="{{ asset('/assets/image/candi.jpg') }}" class="card-img" alt="candi" style="filter: blur(4px);-webkit-filter: blur(4px);">
            <div class="card-img-overlay d-flex justify-content-center align-items-center">
              <div class="text-center">
                <i class="fa fa-eye"></i>
                <p style="font-weight:700;" class="card-text">Virtual Tour</p>
              </div>
            </div>
          </a>
        </div>
        <div class="pb-70 col-lg-6">
          <img src="{{ $gallery->foto }}" class="mb-20 rounded img-fluid" alt="{{ $gallery->judul }}">
          <h2 style="font-size: 16px;" class="mb-10">{{ $gallery->judul }}</h2>
          <p>{{ $gallery->keterangan }}</p>
        </div>
      </div>
    </div>	
  </section>
  <!-- End gallery Area -->	
@endsection



