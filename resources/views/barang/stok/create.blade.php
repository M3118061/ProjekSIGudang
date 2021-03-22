<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Tambah Stok Barang')</title>
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
            <h1 class="m-0">Tambah Stok Barang</h1>
          </div>
        </div><!-- /.row -->
        <!-- Main content -->
        <form method="POST" action="/stokBarang">
          @csrf

          <div class="form-group">
            <label for="id_barang" class="form-label">Nama Barang</label>
            <select name="id_barang" id="id_barang" class="form-control">
              <option value="">--Pilih--</option>
              @foreach ($dataBarang as $dataBarang)
                <option value="{{ $dataBarang->id_barang }}">{{ $dataBarang->nama_barang }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="jml_barang" class="form-label">Jumlah</label>
            <input type="number" class="form-control @error('jml_barang') is-invalid @enderror" id="jml_barang" placeholder="Masukkan jumlah" name="jml_barang" value="{{ old('jml_barang') }}">
            @error('jml_barang')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="id_satuan" class="form-label">Satuan</label>
            <select name="id_satuan" id="id_satuan" class="form-control">
              <option value="">--Pilih--</option>
              @foreach ($satuanBarang as $satuanBarang)
                <option value="{{ $satuanBarang->id_satuan }}">{{ $satuanBarang->nama_satuan }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="tgl_exp" class="form-label">Tanggal EXP</label>
            <input type="date" class="form-control @error('tgl_exp') is-invalid @enderror" id="tgl_exp" name="tgl_exp" value="{{ old('tgl_exp') }}">
            @error('tgl_exp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/stokBarang" class="btn btn-danger">Cancel</a>
        </form>
        <!-- /.content -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  