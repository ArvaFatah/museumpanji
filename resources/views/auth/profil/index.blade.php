@extends('layouts.adminlte3.base')

@section('title', 'Profil')

@section('content-title', 'Profil')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ Route('admin.profil') }}">Profil</a></li>
  <!-- <li class="breadcrumb-item active">Edit</li> -->
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
      <form action="{{ url('admin/profil/store') }}" method="post">
      @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="judul">Judul <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Nama" require value="{{ $profil->judul }}">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi">{{ $profil->deskripsi }}</textarea>
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