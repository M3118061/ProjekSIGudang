<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Change-Password')</title>
  @include('layouts/header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('layouts/navbar')

  @include('layouts/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="card card-into card card-outline card-header">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Change-Password</h1>
          </div>
        </div><!-- /.row -->

        <!-- Main content -->
        <section class="content">

          <!-- Session -->
          @if (Session::get('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          @endif
          
          @if (Session::get('failed'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('failed') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          @endif

          <form class="p-3" action="{{ route('update-password') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="old_password" class="form-label">Password Lama</label>
              <input type="password" class="form-control" id="old_password" placeholder="Masukkan password lama" name="old_password">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password Baru</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan password baru" name="password">
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Konfirmasi Password</label>
              <input type="password" class="form-control" id="password" placeholder="Masukkan ulang password baru" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </section>
        
        <!-- /.content -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  