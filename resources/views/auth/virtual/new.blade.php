@extends('layouts.adminlte3.base')

@section('title', 'Tambah Gallery')

@section('content-title', 'Tambah Virtual Tour')

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
  <li class="breadcrumb-item active">Tambah</li>
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
      <form action="{{ url('admin/virtual/add') }}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="judul">Judul <span class="text-danger">*</span></label>
            <input class="form-control" id="judul" name="judul"/>
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
          </div>
          <div class="form-group">
            <label for="foto">Foto 360 <span class="text-danger">*</span></label>
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
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="tujuan-tab" data-toggle="tab" data-target="#tujuan" type="button" role="tab" aria-controls="tujuan" aria-selected="true">Tujuan</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="infospot-tab" data-toggle="tab" data-target="#infospot" type="button" role="tab" aria-controls="infospot" aria-selected="false">Infospot</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tujuan" role="tabpanel" aria-labelledby="tujuan-tab">
                  <div class="list-link table-responsive">
                    <table class="table table-bordered" id="list-link-tbl">
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="infospot" role="tabpanel" aria-labelledby="infospot-tab">
                  <div class="list-link-infospot table-responsive">
                    <table class="table table-bordered" id="list-link-tbl-infospot">
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
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
  var target = '#tujuan';

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

    target = $('#myTab .nav-item .nav-link.active').data('target');
    $('#myTab .nav-item .nav-link').click((event) => {
      target = $(event.target).data('target');
    })

    viewer = new PANOLENS.Viewer({
      container: pannoImage,
      output: 'console',
      initialLookAt: new THREE.Vector3( 0, 0, 5000 ),
    });

    $('#foto').change(() => {
      let ifile = $('#foto')[0];

      if(ifile.files.length > 0){
        readURL(ifile, (e) => {
          $('#pano-image').html('');
          const img =  e.target.result;
          const panorama = new PANOLENS.ImagePanorama(img);
          panorama.addEventListener( 'progress', onProgress );
          if(lastpanorama){
            viewer.remove(lastpanorama);
          }
          panorama.addEventListener( 'enter-fade-start', function(){
            viewer.tweenControlCenter( new THREE.Vector3(0, 0, 0), 12000 );
          } );

          panorama.addEventListener("click", function(e){
            if (e.intersects.length > 0) return;
            const a = viewer.raycaster.intersectObject(viewer.panorama, true)[0].point;
            // console.log('click panorama\n', e, 'point\n', a);
            var icon = PANOLENS.DataImage.Arrow;
            if(target == '#infospot'){
              icon = PANOLENS.DataImage.Icon;
            }
            let _infospot = new PANOLENS.Infospot(600, icon);
            _infospot.position.set( -a.x, a.y, a.z );
            let { x, y, z} = _infospot.position;
            viewer.panorama.add(_infospot);
            if(target == '#infospot'){
              $('#list-link-tbl-infospot tbody').append(`
                <tr data-xyz="${x +'_'+ y + '_' + z}">
                  <td>
                    <div class="form-group">
                      <label for="judul">Judul</label>
                      <input type="text" class="form-control" id="judul" aria-describedby="title" name="ijudul[]">
                    </div>
                    <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <textarea class="form-control" id="keterangan" aria-describedby="description" name="iketerangan[]"></textarea>
                    </div>
                    <div class="from-group">
                      <label for="customFile">Foto</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="ifoto[]" accept="jpeg,jpg,png"/>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <input type="hidden" name="ix[]" value="${x}"/>
                    <input type="hidden" name="iy[]" value="${y}"/>
                    <input type="hidden" name="iz[]" value="${z}"/>
                  </td>
                </tr>
              `)
            }else{
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
            }
            viewer.panorama.toggleInfospotVisibility(false, 100);
            _infospot.addEventListener( "click", function(){
              let { x, y, z } = _infospot.position;
              viewer.panorama.remove(_infospot);
              // console.log(x +'_'+ y + '_' + z);
              $(`#list-link-tbl-infospot tbody tr[data-xyz="${x +'_'+ y + '_' + z}"]`).remove();
              $(`#list-link-tbl tbody tr[data-xyz="${x +'_'+ y + '_' + z}"]`).remove();
            } );
          });

          viewer.add(panorama);
          viewer.setPanorama(panorama);
          lastpanorama = panorama;
        });
      }
    });
  });

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