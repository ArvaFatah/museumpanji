@extends('layouts.adminlte3.base')

@section('title', 'Tambah Pemesanan Kendaraan')

@section('content-title', 'Tambah Pemesanan Kendaraan')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ Route('index.drivers') }}">Bookings Vehicle</a></li>
  <li class="breadcrumb-item active">New</li>
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
      <form action="{{ url('master/bookings/new') }}" method="post">
      @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="vehicle">Kendaraan <span class="text-danger">*</span></label>
            <select id="vehicle" name="vehicle" class="select2bs4" data-placeholder="Pilih kendaraan" style="width: 100%;">
              @foreach($vehicles as $vehicle)
              <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="driver">Pengendara <span class="text-danger">*</span></label>
            <select id="driver" name="driver" class="select2bs4" data-placeholder="Select a State" style="width: 100%;">
              @foreach($drivers as $driver)
              <option value="{{ $driver->id }}">{{ $driver->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="approver">Penyetuju</label>
            <select id="approver" name="approver[]" class="select2bs4" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
              @foreach($approvers as $approver)
              <option value="{{ $approver->id }}">{{ $approver->name }}</option>
              @endforeach
            </select>
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

@endsection

@section('head-link')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('/assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('script')
<!-- Select2 -->
<script src="{{ asset('/assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
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
  });
</script>
@endsection