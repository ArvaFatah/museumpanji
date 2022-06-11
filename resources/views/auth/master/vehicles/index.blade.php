@extends('layouts.adminlte3.base')

@section('title', 'Kendaraan')

@section('head-link')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection

@section('content-title', 'Kendaraan')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ Route('index.vehicles') }}">Vehicles</a></li>
</ol>
@endsection

@section('content')
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List</h3>
        <a class="btn btn-primary btn-sm float-right" href="{{ url('master/vehicles/new') }}"><i class="fa fa-plus"></i> Add New</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="1%">
                <div class="icheck-primary d-inline">
                  <input type="checkbox" name="checkall" id="checkall">
                  <label for="checkall">
                  </label>
                </div>
              </th>
              <th width="1%">No</th>
              <th>Name</th>
              <th>Tipe</th>
              <th>Kepemilikan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($vehicles as $vehicle)
            <tr>
              <td>
                <div class="icheck-primary d-inline">
                  <input type="checkbox" name="{{ 'checkitem'.$vehicle->id }}" id="{{ 'checkitem'.$vehicle->id }}" value="{{ $vehicle->id }}">
                  <label for="{{ 'checkitem'.$vehicle->id }}">
                  </label>
                </div>
              </td>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $vehicle->name }}</td>
              <td>
                @if($vehicle->type == 0)
                  Angkutan Orang
                @elseif($vehicle->type == 1)
                  Angkutan Barang
                @endif
              </td>
              <td>
                @if($vehicle->ownership == 0)
                  Perusahaan
                @elseif($vehicle->ownership == 1)
                  Sewa
                @endif
              </td>
              <td>
                <a href="{{ url('master/vehicles/edit/'.$vehicle->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                <button class="btn btn-default btn-sm" onClick="showDetailModal(this)" data-vehicle="{{ $vehicle }}"><i class="fa fa-eye"></i></button>&nbsp;&nbsp;
                <a href="{{ url('master/vehicles/delete/'.$vehicle->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
      "buttons": [
        {
          text: '<i class="fa fa-trash"></i>',
          className: 'btn-default',
          action: function ( e, dt, node, config ) {
            var ids = $("tbody input:checkbox:checked").map((index, el) => {
              return $(el).val();
            }).get().join(",");
            window.location.href = "{{ url('master/vehicles/delete') }}/"+ ids;
          }
        }
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#checkall").click(function(){
      $("tbody input:checkbox").prop('checked', this.checked);
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
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