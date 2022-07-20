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
          Contact Us
        </h1>	
        <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> Contact Us</a></p>
      </div>											
    </div>
  </div>
</section>
<!-- End banner Area -->	

<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
  <div class="container">
    <div class="row">
      <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d74994.64617297018!2d112.70453592685142!3d-8.007408289707849!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd625f0dff4cf7d%3A0xed13708f1ee76253!2sMuseum%20Panji!5e0!3m2!1sen!2sid!4v1650876889237!5m2!1sen!2sid" width="400%" height="450" style="border:0;" allowfullscreen frameborder="0"></iframe></p>
      <div style="width:100%; height: 300px;" ></div>
      <div class="col-lg-4 d-flex flex-column address-wrap">
        <div class="single-contact-address d-flex flex-row">
          <div class="icon">
            <span class="lnr lnr-home"></span>
          </div>
          <div class="contact-details">
            <h5>Museum Panji</h5>
            <p>Jl. Ringin Anom Desa Slamet Kecamatan Tumpang</p>
          </div>
        </div>
        <div class="single-contact-address d-flex flex-row">
          <div class="icon">
            <span class="lnr lnr-phone-handset"></span>
          </div>
          <div class="contact-details">
            <h5>(0341) 789678, 087759746733</h5>
            <p> Contact Person : Dwi Cahyono</p>
          </div>
        </div>
        <div class="single-contact-address d-flex flex-row">
          <div class="icon">
            <span class="lnr lnr-envelope"></span>
          </div>
          <div class="contact-details">
            <h5>museumpanji@gmail.com</h5>
            <p>www.museumpanji.com</p>
          </div>
        </div>														
      </div>
      <div class="col-lg-8">
        <form class="form-area " id="myForm" action="mail.php" method="post" class="contact-form text-right">
          <div class="row">	
            <div class="col-lg-6 form-group">
              <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
            
              <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

              <input name="subject" placeholder="Enter your subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required="" type="text">
              <div class="mt-20 alert-msg" style="text-align: left;"></div>
            </div>
            <div class="col-lg-6 form-group">
              <textarea class="common-textarea form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
              <button class="primary-btn mt-20 text-white" style="float: right;">Send Message</button>
                                  
            </div>
          </div>
        </form>	
      </div>
    </div>
  </div>	
</section>
<!-- End contact-page Area -->
@endsection