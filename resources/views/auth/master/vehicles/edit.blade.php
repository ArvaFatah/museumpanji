@extends('layouts.adminlte3.base')

@section('title', 'Tambah Kendaraan Baru')

@section('content-title', 'Tambah Kendaraan Baru')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ Route('index.vehicles') }}">Vehicles</a></li>
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
      <form action="{{ url('master/vehicles/edit/'.$vehicle->id) }}" method="post">
      @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama" require value="{{ $vehicle->name }}">
          </div>
          <div class="form-group">
            <label for="type">Tipe <span class="text-danger">*</span></label>
            <select class="form-control" id="type" name="type">
              <option value="0" {{ $vehicle->type == 0 ? 'selected' : '' }}>Angkutan Orang</option>
              <option value="1" {{ $vehicle->type == 1 ? 'selected' : '' }}>Angkutan Barang</option>
            </select>
          </div>
          <div class="form-group">
            <label for="ownership">Kepemilikan <span class="text-danger">*</span></label>
            <select class="form-control" id="ownership" name="ownership">
              <option value="0" {{ $vehicle->ownership == 0 ? 'selected' : '' }}>Perusahaan</option>
              <option value="1" {{ $vehicle->ownership == 1 ? 'selected' : '' }}>Sewa</option>
            </select>
          </div>
          <div class="form-group">
            <label for="service_every">Konsumsi BBM <span class="text-danger">*</span></label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="fuel_consumption" name="fuel_consumption" placeholder="Masukan Konsumsi BBM" require value="{{ $vehicle->fuel_consumption }}">
              <div class="input-group-append">
                <span class="input-group-text">km/liter</span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="service_every">Jadwal Service <span class="text-danger">*</span></label>
            <div class="row">
              <div class="col-lg-6">
                <input type="number" class="form-control" id="service_every" name="service_every" placeholder="Setiap" require value="{{ $vehicle->service_every }}">
              </div>
              <div class="col-lg-6">
                <select class="form-control" id="service_calendar" name="service_calendar">
                  <option value="0" {{ $vehicle->service_calendar == 0 ? 'selected' : '' }}>hari</option>
                  <option value="1" {{ $vehicle->service_calendar == 1 ? 'selected' : '' }}>Bulan</option>
                  <option value="2" {{ $vehicle->service_calendar == 2 ? 'selected' : '' }}>Tahun</option>
                </select>
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

@endsection