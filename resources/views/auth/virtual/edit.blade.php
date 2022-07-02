@extends('layouts.adminlte3.base')

@section('title', 'Edit Virtual Tour')

@section('content-title', 'Edit Virtual Tour')

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

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ Route('admin.virtual') }}">Virtual Tour</a></li>
  <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection

@section('content')
<div class="row justify-content-center">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Formulir</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ url('admin/virtual/edit/'.$virtual->id) }}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="vehicle">Judul <span class="text-danger">*</span></label>
            <input class="form-control" id="judul" name="judul" value="{{$virtual->judul}}"/>
          </div>
          <div class="form-group">
            <label for="vehicle">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan">{{$virtual->keterangan}}</textarea>
          </div>
          <div class="form-group">
            <label for="vehicle">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="jpeg,jpg,png"/>
          </div>
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="link">Link 360
              <small id="desclink360" class="form-text text-muted">
                Klik untuk menambahkan titik point, dan klik lagi untuk menghapus.
              </small>
              </label>
              <div class="pano-image">
              </div>
            </div>
            <div class="form-group col-md-4">
              <label for="link">Daftar Tujuan
              <small id="desclink360" class="form-text text-muted">
                Isikan tujuan titik point.
              </small>
              </label>
              <div class="list-link table-responsive">
                <table class="table table-bordered" id="list-link-tbl">
                  <thead>
                    <tr>
                      <th>Tujuan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($virtualdet as $virdet)
                    <tr data-xyz="{{ $virdet->x_axis . '_' . $virdet->y_axis . '_' . $virdet->z_axis }}">
                      <td>
                        <select class="form-control" name="tujuan[]">
                        @foreach($virtuals as $vir)
                        @if($virdet->virtual_tour_id_to == $vir->id)
                        <option value="{{$vir->id}}" selected>{{$vir->judul}}</option>
                        @else
                          <option value="{{$vir->id}}">{{$vir->judul}}</option>
                        @endif
                        @endforeach
                        </select>
                        <input type="hidden" name="x[]" value="{{$virdet->x_axis}}"/>
                        <input type="hidden" name="y[]" value="{{$virdet->y_axis}}"/>
                        <input type="hidden" name="z[]" value="{{$virdet->z_axis}}"/>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
</div>

<div id="progress"></div>

@endsection

@section('head-link')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('/assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('script')
<!-- Select2 -->
<script src="{{ asset('/assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/custom/js/three.min.js') }}"></script>
<script src="{{ asset('assets/custom/js/panolens.min.js') }}"></script>
<script src="{{ asset('https://pchen66.github.io/Panolens/js/typed.min.js') }}"></script>
<script>
  const pannoImage = document.querySelector('.pano-image');
  var progressElement = document.getElementById( 'progress' );
  let viewer, lastpanorama;
  const arr = @json($virtuals);
  const virtualObj = @json($virtual);
  const virtualdet = @json($virtualdet);

  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4',
      tags: false
    })

    $("select").on("select2:select", function (evt) {
      var element = evt.params.data.element;
      var $element = $(element);
      
      $element.detach();
      $(this).append($element);
      $(this).trigger("change");
    });

    viewer = new PANOLENS.Viewer({
      container: pannoImage,
      output: 'console',
      initialLookAt: new THREE.Vector3( 0, 0, 5000 ),
    });

    handlePanolens(virtualObj.foto);

    $('#foto').change(() => {
      let ifile = $('#foto')[0];

      if(ifile.files.length > 0){
        readURL(ifile, (e) => {
          handlePanolens(e.target.result);
        });
      }
    });
  });


  function handlePanolens(strimg){
    $('#pano-image').html('');
    const img =  strimg;
    const panorama = new PANOLENS.ImagePanorama(img);
    panorama.addEventListener( 'progress', onProgress );
    if(lastpanorama){
      viewer.remove(lastpanorama);
    }
    panorama.addEventListener( 'enter-fade-start', function(){
      viewer.tweenControlCenter( new THREE.Vector3(0, 0, 0), 12000 );
    } );

    if(virtualdet){
      virtualdet.forEach((item, index) => {
        let infospot_ = new PANOLENS.Infospot(600, PANOLENS.DataImage.Arrow);
        infospot_.position.set( item.x_axis, item.y_axis, item.z_axis );
        let { x, y, z} = infospot_.position;
        panorama.add(infospot_);

        infospot_.addEventListener( "click", function(){
          let { x, y, z } = infospot_.position;
          panorama.remove(infospot_);
          console.log(x +'_'+ y + '_' + z);
          $(`#list-link-tbl tbody tr[data-xyz="${x +'_'+ y + '_' + z}"]`).remove();
        } );
      })
    }

    panorama.addEventListener("click", function(e){
      if (e.intersects.length > 0) return;
      const a = viewer.raycaster.intersectObject(viewer.panorama, true)[0].point;
      // console.log('click panorama\n', e, 'point\n', a);
      let _infospot = new PANOLENS.Infospot(600, PANOLENS.DataImage.Arrow);
      _infospot.position.set( -a.x, a.y, a.z );
      let { x, y, z} = _infospot.position;
      viewer.panorama.add(_infospot);
      $('#list-link-tbl tbody').append(`
        <tr data-xyz="${x +'_'+ y + '_' + z}">
          <td>
            <select class="form-control" name="tujuan[]">
            ${arr.map((item, index) => (
              `<option value="${item.id}">${item.judul}</option>`
            ))}
            </select>
            <input type="hidden" name="x[]" value="${x}"/>
            <input type="hidden" name="y[]" value="${y}"/>
            <input type="hidden" name="z[]" value="${z}"/>
          </td>
        </tr>
      `);
      viewer.panorama.toggleInfospotVisibility(false, 100);
      _infospot.addEventListener( "click", function(){
        let { x, y, z } = _infospot.position;
        viewer.panorama.remove(_infospot);
        console.log(x +'_'+ y + '_' + z);
        $(`#list-link-tbl tbody tr[data-xyz="${x +'_'+ y + '_' + z}"]`).remove();
      } );
    });

    viewer.add(panorama);
    viewer.setPanorama(panorama);
    lastpanorama = panorama;
  }

  function readURL(input, cb) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          if(!!cb){
            cb(e);
          }
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  function onProgress ( event ) {
    progress = event.progress.loaded / event.progress.total * 100;
    progressElement.style.width = progress + '%';
    if ( progress === 100 ) {
      progressElement.classList.add( 'finish' );
    }
  }
</script>
@endsection