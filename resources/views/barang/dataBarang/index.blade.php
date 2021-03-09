<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Data Barang')</title>
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
            <h1 class="m-0">Data Barang</h1>
          </div>
        </div><!-- /.row -->
        <a href="/dataBarang/create" class="btn btn-primary">Tambah Data</a>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">ID</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Jenis Barang</th>
            <th scope="col">Satuan</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dataBarang as $dataBarang)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $dataBarang->id_barang }}</td>
            <td>{{ $dataBarang->nama_barang }}</td>
            <td>{{ $dataBarang->jenis->nama_jenis }}</td>
            <td>{{ $dataBarang->satuan->nama_satuan }}</td>
            <td>
              <a href="/dataBarang/{{ $dataBarang->id_barang }}/edit" class="btn btn-warning">Update</a>
              <form action="/dataBarang/{{ $dataBarang->id_barang }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
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

  