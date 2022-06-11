@extends('layouts.adminlte3.base')

@section('title', 'Edit Category')

@section('content-title', 'Edit Category')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="#">Category</a></li>
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
        <h3 class="card-title">Form edit</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ url('category/edit/'.$category->id) }}" method="post">
      @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name" value="{{ $category->name }}">
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