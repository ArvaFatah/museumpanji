@extends('layouts.adminlte3.baseempty')

@section('title', 'Login')

@section('content')
<div class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ Route('home') }}" class="h1" title="Museumpanju">Museum<b>Panji</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        @if(session('errors'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Sepertinya ada yang salah:
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
          </div>
        @endif
        @if (Session::has('success'))
          <div class="alert alert-success">
            {{ Session::get('success') }}
          </div>
        @endif
        @if (Session::has('error'))
          <div class="alert alert-danger">
            {{ Session::get('error') }}
          </div>
        @endif

        <form action="{{ route('login') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="username" name="username" class="form-control" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <!-- <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div> -->
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p> -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
</div>
@endsection