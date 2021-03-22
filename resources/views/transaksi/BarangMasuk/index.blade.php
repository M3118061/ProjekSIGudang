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
          <i class="fas fa-plus-square"></i>
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
            <th scope="col">Jenis</th>
            <th scope="col">Jumlah Barang</th>
            <th scope="col">Satuan</th>
            <th scope="col">Tanggal Masuk</th>
            <th scope="col">Nama Supplier</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($barangMasuk as $brg_masuk)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $brg_masuk->dataBarang->kode_barang }}</td>
            <td>{{ $brg_masuk->dataBarang->nama_barang }}</td>
            <td>{{ $brg_masuk->dataBarang->jenis->nama_jenis }}</td>
            <td>{{ $brg_masuk->jml_barang }}</td>
            <td>{{ $brg_masuk->dataBarang->satuan->nama_satuan }}</td>
            <td>{{ $brg_masuk->tgl_masuk }}</td>
            <td>{{ $brg_masuk->supplier->nama_supplier }}</td>
            <td>
              <a href="" class="badge badge-info">Detail</a>
              <a href="" class="badge badge-success">Update</a>
              <a href="" class="badge badge-danger">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </section>
    <!-- /.content -->
  </div>
  
  @include('layouts/footer')

  