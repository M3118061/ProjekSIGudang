<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Detail Stok Barang')</title>
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
            <h1 class="m-0">Detail Stok Barang</h1>
          </div>
        </div><!-- /.row -->
        <!-- Main content -->
        <div class="card" style="width: 20rem;">
          <div class="card-header">
            <h4>{{ $stokBarang->dataBarang->nama_barang }}</h4>
          </div>
          <div class="card-body">
            <p class="card-text">Kode Barang : {{ $stokBarang->dataBarang->kode_barang }}</p>
            <p class="card-text">Jenis : {{$stokBarang->dataBarang->jenis->nama_jenis }}</p>
            <p class="card-text">Jumlah Barang : {{ $stokBarang->jml_barang }}</p>
            <p class="card-text">Satuan : {{ $stokBarang->dataBarang->satuan->nama_satuan }}</p>
            <p class="card-text">Tanggal EXP : {{ $stokBarang->tgl_exp }}</p>

            <a href="{{ $stokBarang->id_stok }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>

            <form action="/stokBarang/{{ $stokBarang->id_stok }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </form>
            <a href="/stokBarang" class="btn btn-primary"><i class="fas fa-backspace"></i></a>
          </div>
        </div>
        <!-- /.content -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  