<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Barang Keluar')</title>
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
            <h1 class="m-0">Barang Keluar</h1>
          </div>
        </div><!-- /.row -->
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
          </tr>
        </thead>
        <tbody>
          @foreach ($barangKeluar as $brg_keluar)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $brg_keluar->id_keluar }}</td>
            <td>{{ $brg_keluar->nama_barang }}</td>
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

  