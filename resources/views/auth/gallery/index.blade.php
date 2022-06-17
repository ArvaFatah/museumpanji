@php
$user = Auth::user();
@endphp

@extends('layouts.adminlte3.base')

@section('title', 'Gallery')

@section('head-link')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection

@section('content-title', 'Gallery')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ Route('dashboard') }}">Gallery</a></li>
</ol>
@endsection

@section('content')
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List</h3>
        <a class="btn btn-primary btn-sm float-right" href="{{ url('admin/gallery/add') }}"><i class="fa fa-plus"></i> Add New</a>
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
        <h4 class="modal-title">Detail Pemesanan Kendaraan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-borderless">
          <tbody>
            <tr>
              <th width="30%">Kendaraan</th>
              <td width="1%">:</td>
              <td id="booking_name_vehicle"></td>
            </tr>
            <tr>
              <th width="30%">Pengemudi</th>
              <td width="1%">:</td>
              <td id="booking_name_driver"></td>
            </tr>
            <tr>
              <th width="30%">Riwayat Persetujuan</th>
              <td width="1%">:</td>
              <td>
                <table class="table table-borderless m-0">
                    <tbody id="booking_history">
                    </tbody>
                  </table>
              </td>
            </tr>
            <tr>
              <th>Status</th>
              <td width="1%">:</td>
              <td id="status"></td>
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
    var booking = $(elem).data("booking");
    console.log(booking);
    
    $("#modal #booking_name_vehicle").html(booking.name_vehicle);
    $("#modal #booking_name_driver").html(booking.name_driver);
    var approval = booking.approval;
    var history = approval.map((item, index) => {
      var status = "";
      if(item.status == 0){
        status = 'Menunggu';
      }
      if(item.status == 1){
        status = 'Terkirim';
      }
      if(item.status == 2){
        status = 'Disetujui';
      }
      if(item.status == 3){
        status = 'Ditolak';
      }
      
      return `<tr>'
        <td width="30%" class="pl-0 py-0">${item.name_approver}</td>
        <td width="1%" class="py-0 pl-0">:</td>
        <td class="py-0 pl-1">
          ${status}
        </td>
      </tr>`;
    });

    $("#modal #booking_history").html(history);
    var status = ""
    if(booking.status == 0){
      status = "Menunggu"
    }else if(booking.status == 1){
      status = "Disetujui"
    }else if(booking.status == 2){
      status = "Ditolak"
    }
    $("#modal #status").html(status);

    $("#modal").modal('show');
  }

</script>
@endsection
     