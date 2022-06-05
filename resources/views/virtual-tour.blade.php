<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    html, body{
      margin: 0;
      padding: 0;
      overflow: hidden;
    }
    .pano-image {
      width: 100%;
      height: 100vh;
    }
  </style>
</head>
<body>


  <div class="pano-image"></div>

  <script src="{{ asset('assets/custom/js/three.min.js') }}"></script>
  <script src="{{ asset('assets/custom/js/panolens.min.js') }}"></script>
  <script>
  // const panorama = new PANOLENS.ImagePanorama("{{ asset('assets/textures/view-example.jpg') }}");
  // const viewer = new PANOLENS.Viewer();
  // viewer.add( panorama );

  /*
  var panorama, panorama2, viewer, container, infospot;

  container = document.querySelector( '#container' );

  panorama = new PANOLENS.ImagePanorama( "{{ asset('assets/textures/view-example.jpg') }}" );
  panorama2 = new PANOLENS.ImagePanorama( 'https://pchen66.github.io/Panolens/examples/asset/textures/equirectangular/sunset.jpg' );

  infospot = new PANOLENS.Infospot( 500, PANOLENS.DataImage.Info );
  infospot.position.set( -100, -500, -5000 );
  infospot.addHoverText( "The Story" );
  infospot.addEventListener( 'click', function(){
    viewer.setPanorama( panorama2 );
  } );

  panorama.add( infospot );

  viewer = new PANOLENS.Viewer( { container: container } );
  viewer.add( panorama, panorama2 );

  viewer.addUpdateCallback(function(){
    
  });
  */

  const pannoImage = document.querySelector('.pano-image');
  const img = "{{ asset('assets/textures/view-example.jpg') }}";
  const img2 = 'https://pchen66.github.io/Panolens/examples/asset/textures/equirectangular/sunset.jpg';

  const panorama = new PANOLENS.ImagePanorama(img);
  const panorama2 = new PANOLENS.ImagePanorama(img2);

  const infospot = new PANOLENS.Infospot( 500, PANOLENS.DataImage.Info );
  infospot.position.set( -100, -500, -5000 );
  infospot.addHoverText( "The Story" );
  infospot.addEventListener( 'click', function(){
    viewer.setPanorama( panorama2 );
  } );

  panorama.add( infospot );

  const viewer = new PANOLENS.Viewer({
    container: pannoImage,
  });

  viewer.add(panorama, panorama2);
  </script>
</body>
</html>