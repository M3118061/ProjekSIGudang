<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Tambah Data Barang')</title>
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
            <h1 class="m-0">Tambah Data Barang</h1>
          </div>
        </div><!-- /.row -->
        <!-- Main content -->
        <form method="POST" action="/dataBarang">
          @csrf
          <div class="form-group">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" placeholder="Masukkan kode barang" name="kode_barang" value="{{ old('kode_barang') }}">
            @error('kode_barang')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" placeholder="Masukkan nama barang" name="nama_barang" value="{{ old('nama_barang') }}">
            @error('nama_barang')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="id_jenis" class="form-label">Jenis Barang</label>
            <select name="id_jenis" id="id_jenis" class="form-control @error('id_jenis') is-invalid @enderror">
              <option value="">--Pilih--</option>
              @foreach ($jenisBarang as $jenisBarang)
                <option value="{{ $jenisBarang->id_jenis }}">{{ $jenisBarang->nama_jenis }}</option>
              @endforeach
            </select>
            @error('id_jenis')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="id_satuan" class="form-label">Satuan Barang</label>
            <select name="id_satuan" id="id_satuan" class="form-control @error('id_satuan') is-invalid @enderror">
              <option value="">--Pilih--</option>
              @foreach ($satuanBarang as $satuanBarang)
                <option value="{{ $satuanBarang->id_satuan }}">{{ $satuanBarang->nama_satuan }}</option>
              @endforeach
            </select>
            @error('id_satuan')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/dataBarang" class="btn btn-danger">Cancel</a>
        </form>
        <!-- /.content -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  