<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Tambah Data Jenis')</title>
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
            <h1 class="m-0">Tambah Data Jenis</h1>
          </div>
        </div><!-- /.row -->
        <!-- Main content -->
        <section class="content">
        <form class="p-3" method="POST" action="/jenis">
          @csrf
          <div class="mb-3">
            <label for="nama_jenis" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama_jenis') is-invalid @enderror" id="nama_jenis" placeholder="Masukkan jenis barang" name="nama_jenis" value="{{ old('nama_jenis') }}">
            @error('nama_jenis')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/jenis" class="btn btn-danger">Cancel</a>
        </form>
        </section>
        <!-- /.content -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  