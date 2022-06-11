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
      <form action="{{ url('master/users/new') }}" method="post">
      @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama" require>
          </div>
          <div class="form-group">
            <label for="username">Username <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" require>
          </div>
          <div class="form-group">
            <label for="password">Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
          </div>
          <div class="form-group">
            <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Masukan Confirm Password">
          </div>
          <div class="form-group">
            <label for="role">Role <span class="text-danger">*</span></label>
            <select class="form-control" id="role" name="role">
              <option value="0">Admin</option>
              <option value="1">Pihak Menyetujui</option>
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