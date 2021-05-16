<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Tambah Data Barang Keluar')</title>
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
            <h1 class="m-0">Tambah Data Barang Keluar</h1>
          </div>
        </div><!-- /.row -->
        <!-- Main content -->
        <section class="content">
        <form class="p-3" method="POST" action="/BarangKeluar">
          @csrf
          <div class="mb-3">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <select name="id_barang" id="kode_barang" class="form-control @error('id_barang') is-invalid @enderror">
              <option value="">--Pilih--</option>
              @foreach ($kodeBarang as $key => $value)
                  <option value="{{ $key }}">
                    {{ $key . ' - ' . $value }}
                  </option>
              @endforeach
            </select>
            @error('id_barang')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <select name="id_barang" id="nama_barang" class="form-control @error('id_barang') is-invalid @enderror">
              <option value="">--Pilih--</option>
              @foreach ($namaBarang as $key => $value)
                  <option value="{{ $key }}">
                    {{ $key . ' - ' . $value }}
                  </option>
              @endforeach
            </select>
            @error('id_barang')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <select name="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror">
              <option value="">--Pilih--</option>
              @foreach ($jenisBarang as $jenisBarang)
                <option value="{{ $jenisBarang->id_jenis }}">{{ $jenisBarang->nama_jenis }}</option>
              @endforeach
            </select>
            @error('jenis')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="jml_barang" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control @error('jml_barang') is-invalid @enderror" id="jml_barang" placeholder="Masukkan jumlah barang" name="jml_barang" value="{{ old('jml_barang') }}">
            @error('jml_barang')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <select name="satuan" id="satuan" class="form-control @error('satuan') is-invalid @enderror">
              <option value="">--Pilih--</option>
              @foreach ($satuanBarang as $satuanBarang)
                <option value="{{ $satuanBarang->id_satuan }}">{{ $satuanBarang->nama_satuan }}</option>
              @endforeach
            </select>
            @error('satuan')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="tgl_keluar" class="form-label">Tanggal Keluar</label>
            <input type="date" class="form-control @error('tgl_keluar') is-invalid @enderror" id="tgl_keluar" name="tgl_keluar" value="{{ old('tgl_keluar') }}">
            @error('tgl_keluar')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/BarangKeluar" class="btn btn-danger">Cancel</a>
        </form>
        </section>
        <!-- /.content -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  