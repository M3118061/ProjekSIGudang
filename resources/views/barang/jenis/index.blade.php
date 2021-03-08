<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Jenis Barang')</title>
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
            <h1 class="m-0">Jenis Barang</h1>
          </div>
        </div><!-- /.row -->
        <a href="/jenis/create" class="btn btn-primary">Tambah Data</a>
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
            <th scope="col">Jenis Barang</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($jenisBarang as $jenis)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $jenis->id_jenis }}</td>
            <td>{{ $jenis->nama_jenis }}</td>
            <td>
              <a href="/jenis/{{ $jenis->id_jenis }}/edit" class="btn btn-warning">Update</a>
              <a href="" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </section>
    <!-- /.content -->
  </div>
  
  @include('layouts/footer')

  