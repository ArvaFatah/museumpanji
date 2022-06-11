@extends('layouts.adminlte3.base')

@section('title', 'Laporan Pemesanan Kendaraan')

@section('head-link')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('/assets/plugins/daterangepicker/daterangepicker.css') }}">
@endsection

@section('content-title', 'Laporan Pemesanan Kendaraan '. explode(' ', $startdate)[0]. ' - '.explode(' ', $enddate)[0])

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ Route('bookingvehicle.reports') }}">Reports</a></li>
</ol>
@endsection

@section('content')
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List</h3>
        <a class="btn btn-primary btn-sm float-right ml-1" href="{{ url('master/reports/bookingvehicle/excel?d='.$startdate.' - '.$enddate) }}"><i class="fa fa-file-excel"></i> Export Excel</a>
        <form action="{{ url('master/reports/bookingvehicle') }}">
        <div class="input-group input-group-sm w-25 float-right">
          <select class="form-control float-right w-25" name="status">
            <option value="">Semua</option>
            <option value="0">Menunggu</option>
            <option value="1">Disetujui</option>
            <option value="2">Ditolak</option>
          </select>
          <input type="text" class="form-control" name="d" id="daterange-btn" value="{{ request()->get('d') }}">
          <span class="input-group-append">
            <button type="submit" class="btn btn-primary btn-flat">Go!</button>
          </span>
        </div>
      </form>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered">
          <thead>
            <tr>
              <th width="1%">No</th>
              <th>Kendaraan</th>
              <th>Pengemudi</th>
              <th>Penangan</th>
              <th>Tanggal Peminjaman</th>
              <th>Penyetuju</th>
              <th>Status Penyetuju</th>
              <th>Tanggal Persetujuan</th>
              <th>Status Pemesanan</th>
            </tr>
          </thead>
          <tbody>
            @forelse($bookings as $booking)
            @php
              $approvals = $booking->approval
            @endphp
            <tr>
              <td rowspan="{{ $booking->approval_count }}" width="1%">{{ $loop->iteration }}</td>
              <td rowspan="{{ $booking->approval_count }}">{{ $booking->name_vehicle }}</td>
              <td rowspan="{{ $booking->approval_count }}">{{ $booking->name_driver }}</td>
              <td rowspan="{{ $booking->approval_count }}">{{ $booking->name_admin }}</td>
              <td rowspan="{{ $booking->approval_count }}">{{ $booking->created_at }}</td>
              <td>{{ $approvals[0]->name_approver }}</td>
              <td>
                @if($approvals[0]->status == 0)
                <span class="badge badge-secondary">Menunggu</span>
                @elseif($approvals[0]->status == 1)
                <span class="badge badge-info">Terkirim</span>
                @elseif($approvals[0]->status == 2)
                <span class="badge badge-success">Disetujui</span>
                @elseif($approvals[0]->status == 3)
                <span class="badge badge-danger">Ditolak</span>
                @endif
              </td>
              <td rowspan="{{ $booking->approval_count }}">{{ $booking->updated_at }}</td>
              <td rowspan="{{ $booking->approval_count }}">
                @if($booking->status == 0)
                <span class="badge badge-secondary">Menunggu</span>
                @elseif($booking->status == 1)
                <span class="badge badge-success">Disetujui</span>
                @elseif($booking->status == 2)
                <span class="badge badge-danger">Ditolak</span>
                @endif
              </td>
            </tr>
            @foreach($approvals as $key => $approval)
              @if($key != 0)
                <tr>
                  <td>{{ $approval->name_approver }}</td>
                  <td>
                    @if($approval->status == 0)
                    <span class="badge badge-secondary">Menunggu</span>
                    @elseif($approval->status == 1)
                    <span class="badge badge-info">Terkirim</span>
                    @elseif($approval->status == 2)
                    <span class="badge badge-success">Disetujui</span>
                    @elseif($approval->status == 3)
                    <span class="badge badge-danger">Ditolak</span>
                    @endif
                  </td>
                </tr>
              @endif
            @endforeach
            @empty
            <tr>
              <td colspan="9" class="text-center">No matching records found</td>
            </tr>
            @endforelse
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
        <h4 class="modal-title">Detail Kendaraan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-borderless">
          <tbody>
            <tr>
              <th width="30%">Name</th>
              <td width="1%">:</td>
              <td id="vehicle_name"></td>
            </tr>
            <tr>
              <th width="30%">Tipe</th>
              <td width="1%">:</td>
              <td id="vehicle_type"></td>
            </tr>
            <tr>
              <th width="30%">Kepemilikan</th>
              <td width="1%">:</td>
              <td id="vehicle_ownership"></td>
            </tr>
            <tr>
              <th width="30%">Konsumsi BBM</th>
              <td width="1%">:</td>
              <td id="vehicle_fuel_consumption"></td>
            </tr>
            <tr>
              <th width="30%">Jadwal service</th>
              <td width="1%">:</td>
              <td id="vehicle_service"></td>
            </tr>
            <tr>
              <th>Status</th>
              <td width="1%">:</td>
              <td id="status"></td>
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
<!-- <script src="{{ asset('/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script> -->
<!-- InputMask -->
<script src="{{ asset('/assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script>
  $(function () {
    // $("#example1").DataTable({
    //   "responsive": true, 
    //   "lengthChange": false, 
    //   "autoWidth": false,
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment('{{ $startdate }}'),
        endDate  : moment('{{ $enddate }}')
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
  });

  function showDetailModal(elem){
    var vehicle = $(elem).data("vehicle");

    console.log(vehicle)
    
    $("#modal #vehicle_name").html(vehicle.name);
    var type = "";
    if(vehicle.type == 0){
      type = "Angkutan Orang";
    }else if(vehicle.type == 1){
      type = "Angkutan Barang";
    }
    $("#modal #vehicle_type").html(type);
    var ownership = "";
    if(vehicle.ownership == 0){
      ownership = "Perusahaan";
    }else if(vehicle.ownership == 1){
      ownership = "Sewa";
    }
    $("#modal #vehicle_ownership").html(ownership);
    $("#modal #vehicle_fuel_consumption").html(vehicle.fuel_consumption + " km/liter");
    var service_calendar = "";
    if(vehicle.service_calendar == 0){
      service_calendar = "Hari";
    }else if(vehicle.service_calendar == 1){
      service_calendar = "Bulan";
    }else if(vehicle.service_calendar == 2){
      service_calendar = "Tahun";
    }
    $("#modal #vehicle_service").html("setiap " + vehicle.service_every + " " + service_calendar);
    $("#modal #status").html(
      vehicle.status == 1 
        ? '<span class="badge badge-success">Active</span>'
        : '<span class="badge badge-warning">Inactive</span>'
    );

    $("#modal").modal('show');
  }

</script>
@endsection