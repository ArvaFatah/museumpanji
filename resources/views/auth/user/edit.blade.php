@extends('layouts.adminlte3.base')

@section('title', 'Edit User')

@section('content-title', 'Edit User')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ Route('admin.user') }}">User</a></li>
  <li class="breadcrumb-item active">Edit</li>
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
      <form action="{{ url('admin/user/edit/'.$user->id) }}" method="post">
      @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama" require value="{{ $user->name }}">
          </div>
          <div class="form-group">
            <label for="username">Username <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" require value="{{ $user->username }}">
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