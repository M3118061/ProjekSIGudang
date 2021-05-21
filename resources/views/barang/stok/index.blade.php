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
      <div class="card card-into card card-outline card-header">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Stok Barang</h1>
          </div>
        </div><!-- /.row -->

        <div class="row g-3 align-items-center">
          <div class="col-auto">
            <form method="post">
              <a href="/stokBarang/create" class="btn btn-primary">
                <i class="fas fa-plus-square"> Tambah Data</i>
              </a>
            </form>
          </div>
          <div class="col-auto">
            <a href="/stokBarang/cetak" class="btn btn-success" target="blank">
              <i class="fas fa-print"> Cetak Semua Data</i>
            </a>
          </div>
        </div>
        <br>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
        @endif  
    <!-- Main content -->
    <section class="content">
      <table class="table table-bordered">
        <thead class="table-dark">
          <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Jenis</th>
            <th scope="col">Jumlah Barang</th>
            <th scope="col">Satuan</th>
            <th scope="col">Tanggal EXP</th>
            {{--  <th scope="col">Status</th>  --}}
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($stokBarang as $stok)
          <tr>
            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
            <td>{{ $stok->dataBarang->kode_barang }}</td>
            <td>{{ $stok->dataBarang->nama_barang }}</td>
            <td>{{ $stok->dataBarang->jenis->nama_jenis }}</td>
            <td class="text-center">{{ $stok->jml_barang }}</td>
            <td>{{ $stok->dataBarang->satuan->nama_satuan }}</td>
            <td>{{ $stok->tgl_exp }}</td>
            <td class="text-center">
              <a href="/stokBarang/{{ $stok->id_stok }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>

            <form action="/stokBarang/{{ $stok->id_stok }}" method="POST" class="d-inline">
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
    <div class="pull-right">
      {{ $stokBarang->links() }}
    </div>
    <style>
      .w-5{
        display: none;
      }
    </style>
    <!-- /.content -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  