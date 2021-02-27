<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Detail Pegawai')</title>
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
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Pegawai</h1>
          </div>
        </div><!-- /.row -->
        <!-- Main content -->
        <div class="card" style="width: 20rem;">
          <div class="card-header">
            <h4>{{ $pegawai->nama_lengkap }}</h4>
          </div>
          <div class="card-body">
            <p class="card-text">Jenis Kelamin : {{ $pegawai->jk }}</p>
            <p class="card-text">Alamat : {{ $pegawai->alamat }}</p>
            <p class="card-text">No Telp : {{ $pegawai->no_telp }}</p>
            <p class="card-text">Email : {{ $pegawai->email }}</p>
            <p class="card-text">Password : {{ $pegawai->password }}</p>
            <a href="/pegawai" class="btn btn-primary">Back</a>
          </div>
        </div>
        <!-- /.content -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  