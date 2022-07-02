@extends('layouts.artmuseum.base')

@section('title', 'Home')

@section('head-link')
<style>
  .pano-image{
    height: 500px;
  }
  #progress {
    width: 0;
    height: 5px;
    position: fixed;
    top: 0;
    background: #fff;
    -webkit-transition: opacity 0.5s ease;
    transition: opacity 0.5s ease;
  }

  #progress.finish {
    opacity: 0;
  }
</style>
@endsection

@section('content')
  <!-- start banner Area -->
  <!-- <section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
      <div class="row d-flex align-items-center justify-content-center">
        <div class="about-content col-lg-12">
          <h1 class="text-white">
            Virtual Tour				
          </h1>	
          <p class="text-white link-nav"><a href="{{url('landing')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{url('virtual-tour')}}"> Virtual Tour</a></p>
        </div>											
      </div>
    </div>
  </section> -->
  <!-- End banner Area -->

  <div id="progress"></div>

  <!-- Start Virtual Tour -->
  <section id="virtual">
    <div class="pano-image">
      <div id="typed"></class>
    </div>
  </section>
  <!-- End Virtual Tour -->

@endsection

@section('script')
<script src="{{ asset('assets/custom/js/three.min.js') }}"></script>
<script src="{{ asset('assets/custom/js/panolens.min.js') }}"></script>
<script src="{{ asset('https://pchen66.github.io/Panolens/js/typed.min.js') }}"></script>
<script>
  const pannoImage = document.querySelector('.pano-image');
// /*
  var progressElement = document.getElementById( 'progress' );
  $(() => {
    const arr = @json($virtuals);
    // console.log(arr);
    let pano = [];
    arr.forEach((item, index) => {
      const img = "{{ asset('') }}" + '/' + item.foto ;
      const panorama = new PANOLENS.ImagePanorama(img);
      panorama.addEventListener( 'progress', onProgress );
      panorama.addEventListener( 'enter', onEnter );
      // console.log('item_' + index, 'vt_'+item.id, typeof pano['vt_'+item.id]);
      if(typeof pano['vt_'+item.id] == 'undefined'){
        pano['vt_'+item.id] = panorama;
      }
      item.detail.forEach((ditem, dindex) => {
        // console.log('ditem_' + dindex, 'vt_'+ditem.vid, typeof pano['vt_'+ditem.vid]);
        const img2 = "{{ asset('') }}" + '/' + ditem.foto;
        const panorama2 = new PANOLENS.ImagePanorama(img2);
        if(typeof pano['vt_'+ditem.vid] == 'undefined'){
          pano['vt_'+ditem.vid] = panorama2;
        }
        pano['vt_'+item.id].link( pano['vt_'+ditem.vid], new THREE.Vector3( ditem.x_axis, ditem.y_axis, ditem.z_axis ) );
      })
    });
    
    const viewer = new PANOLENS.Viewer({
      container: pannoImage,
      output: 'console',
      initialLookAt: new THREE.Vector3( 0, 0, 5000 )
    });
    for(var key in pano){
      viewer.add(pano[key]);
    }

    // const img = "{{ asset('assets/textures/Depan.jpg') }}";
    // const img2 = "{{ asset('assets/textures/img2.jpg') }}";

    // const panorama = new PANOLENS.ImagePanorama(img);
    // const panorama2 = new PANOLENS.ImagePanorama(img2);
    // panorama.link( panorama2, new THREE.Vector3( 4886.92, -716.46, -720.34 ) );
    // panorama2.link( panorama, new THREE.Vector3( -2302.98, 358.27, -4414.74 ) );
    
    // // First panorama
    // panorama.addEventListener( 'progress', onProgress );
    // // panorama.addEventListener( 'load', onWelcomeComplete );
    // panorama.addEventListener( 'enter', onEnter );

    // const viewer = new PANOLENS.Viewer({
    //   container: pannoImage,
    //   output: 'console',
    //   initialLookAt: new THREE.Vector3( 0, 0, 5000 )
    // });

    // viewer.add(panorama, panorama2);

  })

  function onProgress ( event ) {
    progress = event.progress.loaded / event.progress.total * 100;
    progressElement.style.width = progress + '%';
    if ( progress === 100 ) {
      progressElement.classList.add( 'finish' );
    }
  }

  function onEnter ( event ) {
    progressElement.style.width = 0;
    progressElement.classList.remove( 'finish' );
  }
  // */

  /*
  var panorama, viewer, typed, typed;

  var meterInfospot, valveInfospot, seatInfospot, topboxInfospot, endingInfospot;

  var progressElement = document.querySelector( '#progress' );

  var tweeningDelay = 300, typeStartDelay = 1000, typeSpeed = 50;

  var paragraphs = {

    welcome: [ 'Panolens Presents', 'A Journey to a <strong>Train</strong>', 'Here we go' ],
    meter: [ 'One of the common meter that you can see on a train', 'it is not specially eye-catching but it just can get your attention', 'it indicates how fast the train is currently going', 'Let us continue' ],
    valve: [ 'A Valve', 'solid looking and quite decent color', 'here shows the evidence that time would leaves marks on everything', 'same thing applies to our face...' ],
    seat: [ 'Alright. Here we have a seat. The green pad looks quite comfortable', 'when you are on a train', 'OK. Move on to next one' ],
    box: [ 'There is a box over there', 'probably some fuse or electronic devices', 'Hmmmm............', 'Anyway', 'Let\'s keep moving' ],
    ending: [ 'This is our last stop', 'Please continue your journey with this wonder train...' ]

  };

  // Patch for typed.js of cutting back-to-back words
  for ( var section in paragraphs ) {

    if ( paragraphs.hasOwnProperty( section ) ) {

      paragraphs[ section ].unshift( '' );
      paragraphs[ section ].push( '' );

    }

  }

  function delayExecute ( func, delay ) {

    setTimeout( func, delay );

  }

  function onLoad () {

    type( paragraphs.welcome, onWelcomeComplete, 2000 );

  }

  function onEnter ( event ) {

    progressElement.style.width = 0;
    progressElement.classList.remove( 'finish' );

  }

  function onProgress ( event ) {

    var progress = event.progress.loaded / event.progress.total * 100;
    progressElement.style.width = progress + '%';
    if ( progress === 100 ) {
      progressElement.classList.add( 'finish' );
    }

  }

  function onWelcomeComplete () {

    delayExecute( meterInfospot.focus.bind( meterInfospot ), tweeningDelay );
    type( paragraphs.meter, onMeterTourComplete );
    
  }

  function onMeterTourComplete () {

    delayExecute( valveInfospot.focus.bind( valveInfospot ), tweeningDelay );
    type( paragraphs.valve, onValveTourComplete );

  }

  function onValveTourComplete () {

    delayExecute( seatInfospot.focus.bind( seatInfospot ), tweeningDelay );
    type( paragraphs.seat, onSeatTourComplete );

  }

  function onSeatTourComplete () {

    delayExecute( topboxInfospot.focus.bind( topboxInfospot ), tweeningDelay );
    type( paragraphs.box, onTopboxTourComplete );

  }

  function onTopboxTourComplete () {

    delayExecute( endingInfospot.focus.bind( endingInfospot ), tweeningDelay );
    type( paragraphs.ending, function(){ viewer.OrbitControls.enabled = true; } );

  }

  function type ( stringArray, onComplete, startDelay ) {

    onComplete = onComplete || function(){};
    startDelay = startDelay >= 0 ? startDelay : typeStartDelay;

    typed = new Typed( "#typed", {

      strings: stringArray,
      typeSpeed: typeSpeed,
      showCursor: false,
      startDelay: startDelay,
      onComplete: onComplete
      
    });

  }

  // Infospots
  meterInfospot = new PANOLENS.Infospot();
  valveInfospot = new PANOLENS.Infospot();
  seatInfospot = new PANOLENS.Infospot();
  topboxInfospot = new PANOLENS.Infospot();
  endingInfospot = new PANOLENS.Infospot( 10e-7 );  // Make it not visible

  meterInfospot.position.set( 4610.04, 1280.07, 1431.29 );
  valveInfospot.position.set( 4637.61, -798.12, -1671.24 );
  seatInfospot.position.set( 1934.61, -2611.69, -3792.91 );
  topboxInfospot.position.set( -3348.82, 3705.92, 45.54 );
  endingInfospot.position.set( -3461.4, -3592.37, -241.38 );

  meterInfospot.addHoverText( 'Speedometer', 50 );
  valveInfospot.addHoverText( 'Valve', 50 );
  seatInfospot.addHoverText( 'Seat', 50 );
  topboxInfospot.addHoverText( 'Box', 50 );

  // Panorama
  panorama = new PANOLENS.ImagePanorama( "{{asset('assets/textures/Depan.jpg')}}" );
  panorama.addEventListener( 'progress', onProgress );
  panorama.addEventListener( 'load', onLoad );
  panorama.addEventListener( 'enter', onEnter );
  panorama.add( meterInfospot, valveInfospot, seatInfospot, topboxInfospot, endingInfospot );

  Viewer
  viewer = new PANOLENS.Viewer( { container: pannoImage, controlBar: false, initialLookAt: new THREE.Vector3( 0, 0, 5000 ) } );
  viewer.OrbitControls.enabled = false;
  viewer.add( panorama );
  */
</script>
@endsection