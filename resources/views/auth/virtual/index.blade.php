
@php
$user = Auth::user();
@endphp

@extends('layouts.adminlte3.base')

@section('title', 'Virtual Tour')

@section('head-link')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection

@section('content-title', 'Virtual Tour')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ Route('admin.virtual') }}">Virtual Tour</a></li>
</ol>
@endsection

@section('content')
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List</h3>
        <a class="btn btn-primary btn-sm float-right" href="{{ url('admin/virtual/add') }}"><i class="fa fa-plus"></i> Add New</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover table-striped">
          <thead>
            <tr>
              <th width="1%">No</th>
              <th>Gambar</th>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($virtuals as $virtual)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td><img src="{{$virtual->foto}}" alt="{{$virtual->judul}}" class="img-thumbnail" width="100" height="100"></td>
              <td>{{$virtual->judul}}</td>
              <td>{{$virtual->keterangan}}</td>
              <td>
                <a href="{{ url('admin/virtual/edit/'.$virtual->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                <button class="btn btn-default btn-sm" onClick="showLinkModal(this)" data-gallery="{{ $virtual }}"><i class="fa fa-plus"></i></button>&nbsp;&nbsp;
                <button class="btn btn-default btn-sm" onClick="showDetailModal(this)" data-gallery="{{ $virtual }}"><i class="fa fa-eye"></i></button>&nbsp;&nbsp;
                <a href="{{ url('admin/virtual/delete/'.$virtual->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
              </td>
            </tr>  
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>

<div class="modal fade" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Virtual Tour</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-borderless">
          <tbody>
            <tr>
              <th width="30%">Judul</th>
              <td width="1%">:</td>
              <td id="gallery_judul"></td>
            </tr>
            <tr>
              <th width="30%">Keterangan</th>
              <td width="1%">:</td>
              <td id="gallery_keterangan"></td>
            </tr>
            <tr>
              <th width="30%">Foto</th>
              <td width="1%">:</td>
              <td>
                <img id="gallery_foto" src="" alt="" class="img-thumbnail" width="100" height="100">
              </td>
            </tr>
            <tr>
              <td colspan="3">
              <table class="table table-bordered" id="modal_detail">
                <thead>
                  <tr>
                    <th>Tujuan</th>
                    <th>X Axis</th>
                    <th>Y Axis</th>
                    <th>Z Axis</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
              </td>
            </tr>
            <tr>
              <td id="booking_action"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 

<div class="modal fade" id="modal-link">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Link Virtual Tour</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('admin/virtual/adddetailmodal') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
        <table class="table table-borderless">
          <tbody>
            <tr>
              <th width="30%">Judul</th>
              <td width="1%">:</td>
              <td id="gallery_judul"></td>
            </tr>
            <tr>
              <th width="30%">Keterangan</th>
              <td width="1%">:</td>
              <td id="gallery_keterangan"></td>
            </tr>
          </tbody>
        </table>
        <div class="form-group">
          <label for="modal_vt_id_to">Tujuan <span class="text-danger">*</span></label>
          <input type="hidden" id="modal_vt_id_from" name="modal_vt_id_from"/>
          <select class="form-control" id="modal_vt_id_to" name="modal_vt_id_to" placeholder="Pilih tujuan">
          @foreach ($virtuals as $virtual)
          <option value="{{ $virtual->id }}">{{ $virtual->judul }}</option>
          @endforeach
          </select>
        </div>
        <div class="row">
          <div class="form-group col-lg-4 col-sm-12">
            <label for="modal_x_axis">X Axis <span class="text-danger">*</span></label>
            <input class="form-control" id="modal_x_axis" name="modal_x_axis"/>
          </div>
          <div class="form-group col-lg-4 col-sm-12">
            <label for="modal_y_axis">Y Axis <span class="text-danger">*</span></label>
            <input class="form-control" id="modal_y_axis" name="modal_y_axis"/>
          </div>
          <div class="form-group col-lg-4 col-sm-12">
            <label for="modal_z_axis">Z Axis <span class="text-danger">*</span></label>
            <input class="form-control" id="modal_z_axis" name="modal_z_axis"/>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 
@endsection

@section('script')
<!-- DataTables  & Plugins -->
<script src="{{ asset('/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
    });
  });

  function showDetailModal(elem){
    var item = $(elem).data("gallery");
    console.log(item);
    
    $("#modal #gallery_judul").html(item.judul);
    $("#modal #gallery_keterangan").html(item.keterangan);
    $("#modal #gallery_foto").attr('src', item.foto);
    $("#modal #modal_detail tbody").html('');
    item.detail.forEach((item, index) => {
      console.log(item)
      $("#modal #modal_detail tbody").append(`<tr>
        <td>${item.judul}</td>
        <td>${item.x_axis}</td>
        <td>${item.y_axis}</td>
        <td>${item.z_axis}</td>
        <td><a href="{{ url('admin/virtual/deletedetailmodal/${item.id}') }}" role="button" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
      </tr>`)
    })

    $("#modal").modal('show');
  }

  function showLinkModal(elem){
    var item = $(elem).data("gallery");
    console.log(item);
    
    $("#modal-link #gallery_judul").html(item.judul);
    $("#modal-link #gallery_keterangan").html(item.keterangan);
    $("#modal-link #gallery_foto").attr('src', item.foto);
    $("#modal-link #modal_vt_id_from").val(item.id);

    $("#modal-link").modal('show');
  }

</script>
@endsection
     