<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Barang Masuk')</title>
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
            <h1 class="m-0">Barang Masuk</h1>
          </div>
        </div><!-- /.row -->
        <a href="/BarangMasuk/create" class="btn btn-primary">
          <i class="fas fa-plus-square"> Tambah Data</i>
        </a>
        <a href="" class="btn btn-success">
          <i class="fas fa-download"> Export Data</i>
        </a>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Jumlah Barang</th>
            <th scope="col">Satuan</th>
            <th scope="col">Tanggal Masuk</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($barangMasuk as $barangMasuk)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $barangMasuk->dataBarang->kode_barang }}</td>
            <td>{{ $barangMasuk->dataBarang->nama_barang }}</td>
            <td>{{ $barangMasuk->jml_barang }}</td>
            <td>{{ $barangMasuk->dataBarang->satuan->nama_satuan }}</td>
            <td>{{ $barangMasuk->tgl_masuk }}</td>
            <td>
              <a href="/BarangMasuk/{{ $barangMasuk->id_masuk }}" class="btn btn-primary"><i class="fas fa-info"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </section>
    <!-- /.content -->
  </div>
  
  @include('layouts/footer')

  