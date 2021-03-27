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
      </div>
      <form method="post">
        <table>
          <tr>
            <td>
            <a href="/stokBarang/create" class="btn btn-primary">
              <i class="fas fa-plus-square"> Tambah Data</i>
            </a>
            </td>
            <td>
            <a href="/stokBarang/cetak" class="btn btn-success" target="blank">
              <i class="fas fa-print"> Cetak Data</i>
            </a>&nbsp;&nbsp;&nbsp;
            </td>
            
            <td>Dari Tanggal : </td>
            <td><input type="date" name="dari_tgl" required="required"></td>
            <td>Sampai Tanggal : </td>
            <td><input type="date" name="sampai_tgl" required="required"></td>
            <td><input type="submit" class="btn btn-primary" name="filter" value="Filter"></td>
          </tr>
        </table>
      </form>
      
      
      <!-- /.container-fluid -->
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
              <a href="{{ $stokBarang->id_stok }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>

            <form action="/stokBarang/{{ $stokBarang->id_stok }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
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

  