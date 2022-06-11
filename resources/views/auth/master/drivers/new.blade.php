@extends('layouts.adminlte3.base')

@section('title', 'Tambah Pengemudi Baru')

@section('content-title', 'Tambah Pengemudi Baru')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ Route('index.drivers') }}">Drivers</a></li>
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
      <form action="{{ url('master/drivers/new') }}" method="post">
      @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="nik">NIK <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukan NIK" require>
          </div>
          <div class="form-group">
            <label for="name">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama" require>
          </div>
          <div class="form-group">
            <label for="phone">No Telepon</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukan No Telepon">
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