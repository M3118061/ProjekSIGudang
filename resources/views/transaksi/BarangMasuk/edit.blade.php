<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Ubah Data Barang Masuk')</title>
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
            <h1 class="m-0">Ubah Data Barang Masuk</h1>
          </div>
        </div><!-- /.row -->
        <!-- Main content -->
        <section class="content">
        <form class="p-3" method="POST" action="/BarangMasuk/{{ $barangMasuk->id_masuk }}">
          @method('patch')
          @csrf
          <div class="mb-3">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <select name="id_barang" id="kode_barang" class="form-control">
              <option value="">--Pilih--</option>
              @foreach ($kodeBarang as $key => $value)
                  <option value="{{ $key }}"
                      {{ $barangMasuk->id_barang == $key ? 'selected' : '' }}>
                      {{ $value }}
                  </option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <select name="id_barang" id="nama_barang" class="form-control">
              <option value="">--Pilih--</option>
              @foreach ($namaBarang as $key => $value)
                  <option value="{{ $key }}"
                      {{ $barangMasuk->id_barang == $key ? 'selected' : '' }}>
                      {{ $value }}
                  </option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Barang</label>
            <select name="jenis" id="jenis" class="form-control">
              <option value="">--Pilih--</option>
              @foreach ($jenisBarang as $jenisBarang)
                <option value="{{ $jenisBarang->id_jenis }}">{{ $jenisBarang->nama_jenis }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="jml_barang" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control @error('jml_barang') is-invalid @enderror" id="jml_barang" name="jml_barang" value="{{ $barangMasuk->jml_barang }}">
            @error('jml_barang')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="satuan" class="form-label">Satuan Barang</label>
            <select name="satuan" id="satuan" class="form-control">
              <option value="">--Pilih--</option>
              @foreach ($satuanBarang as $satuanBarang)
                <option value="{{ $satuanBarang->id_satuan }}">{{ $satuanBarang->nama_satuan }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
            <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" id="tgl_masuk" name="tgl_masuk" value="{{ $barangMasuk->tgl_masuk }}">
            @error('tgl_masuk')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="id_supplier" class="form-label">Nama Supplier</label>
            <select name="id_supplier" id="id_supplier" class="form-control">
              <option value="">--Pilih--</option>
              @foreach ($supplier as $supplier)
                <option value="{{ $supplier->id_supplier }}">{{ $supplier->nama_supplier }}</option>
              @endforeach
            </select>
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/BarangMasuk" class="btn btn-danger">Cancel</a>
        </form>
        </section>
        <!-- /.content -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  