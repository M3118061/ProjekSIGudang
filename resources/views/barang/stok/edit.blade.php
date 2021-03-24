<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Ubah Data Stok Barang')</title>
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
            <h1 class="m-0">Ubah Data Stok Barang</h1>
          </div>
        </div><!-- /.row -->
        <!-- Main content -->
        <form method="POST" action="/stokBarang/{{ $stokBarang->id_stok }}">
          @method('patch')
          @csrf
          <div class="form-group">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <select name="id_barang" id="kode_barang" class="form-control">
              <option value="">--Pilih--</option>
              @foreach ($kodeBarang as $key => $value)
                  <option value="{{ $key }}"
                      {{ $stokBarang->id_barang == $key ? 'selected' : '' }}>
                      {{ $value }}
                  </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <select name="id_barang" id="nama_barang" class="form-control">
              <option value="">--Pilih--</option>
              @foreach ($namaBarang as $key => $value)
                  <option value="{{ $key }}"
                      {{ $stokBarang->id_barang == $key ? 'selected' : '' }}>
                      {{ $value }}
                  </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="jenis" class="form-label">Jenis Barang</label>
            <select name="jenis" id="jenis" class="form-control">
              <option value="">--Pilih--</option>
              @foreach ($jenisBarang as $jenisBarang)
                <option value="{{ $jenisBarang->id_jenis }}">{{ $jenisBarang->nama_jenis }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="jml_barang" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control @error('jml_barang') is-invalid @enderror" id="jml_barang" name="jml_barang" value="{{ $stokBarang->jml_barang }}">
            @error('jml_barang')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="satuan" class="form-label">Satuan Barang</label>
            <select name="satuan" id="satuan" class="form-control">
              <option value="">--Pilih--</option>
              @foreach ($satuanBarang as $satuanBarang)
                <option value="{{ $satuanBarang->id_satuan }}">{{ $satuanBarang->nama_satuan }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="tgl_exp" class="form-label">Tanggal EXP</label>
            <input type="date" class="form-control @error('tgl_exp') is-invalid @enderror" id="tgl_exp" name="tgl_exp" value="{{ $stokBarang->tgl_exp }}">
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

  