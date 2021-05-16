<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Tambah Data Supplier')</title>
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
            <h1 class="m-0">Tambah Data Supplier</h1>
          </div>
        </div><!-- /.row -->
        <!-- Main content -->
        <section class="conttent">
        <form class="p-3" method="POST" action="/supplier">
          @csrf
          <div class="mb-3">
            <label for="nama_supplier" class="form-label">Nama Supplier</label>
            <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" id="nama_supplier" placeholder="Masukkan nama supplier" name="nama_supplier" value="{{ old('nama_supplier') }}">
            @error('nama_supplier')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="jk" class="form-labe">Jenis Kelamin</label><br>
            <select class="form-selec @error('jk') is-invalid @enderror" id="jk" name="jk" value="{{ old('jk') }}">
              <option selected>Perempuan</option>
              <option>Laki-laki</option>
              @error('jk')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </select>
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan alamat" name="alamat" value="{{ old('alamat') }}">
            @error('alamat')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="no_telp" class="form-label">No Telp</label>
            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="Masukkan no telp" name="no_telp" value="{{ old('no_telp') }}">
            @error('no_telp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/supplier" class="btn btn-danger">Cancel</a>
        </form>
        </section>
        <!-- /.content -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  