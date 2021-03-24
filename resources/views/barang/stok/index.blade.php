<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Stok Barang')</title>
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
            <h1 class="m-0">Stok Barang</h1>
          </div>
        </div><!-- /.row -->
        <a href="/stokBarang/create" class="btn btn-primary">
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
            <th scope="col">Tanggal EXP</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($stokBarang as $stokBarang)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $stokBarang->dataBarang->kode_barang }}</td>
            <td>{{ $stokBarang->dataBarang->nama_barang }}</td>
            <td>{{ $stokBarang->dataBarang->jenis->nama_jenis }}</td>
            <td>{{ $stokBarang->jml_barang }}</td>
            <td>{{ $stokBarang->dataBarang->satuan->nama_satuan }}</td>
            <td>{{ $stokBarang->tgl_exp }}</td>
            <td>
              <a href="/stokBarang/{{ $stokBarang->id_stok }}" class="btn btn-primary"><i class="fas fa-info"></i></a>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </section>
    <!-- /.content -->
  </div>
  
  @include('layouts/footer')

  