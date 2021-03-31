<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Data Supplier')</title>
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
            <h1 class="m-0">Data Supplier</h1>
          </div>
        </div><!-- /.row -->
        <form method="post">
          <table>
            <tr>
              <td>
                <a href="/supplier/create" class="btn btn-primary">
                  <i class="fas fa-plus-square"> Tambah Data</i>
                </a>
              </td>
            </tr>
          </table>
        </form>
        <br>
        <!-- Main content -->
        <section class="content">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($supplier as $supplier)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $supplier->nama_supplier }}</td>
                <td>{{ $supplier->alamat }}</td>
                <td>
                  <a href="/supplier/{{ $supplier->id_supplier }}" class="btn btn-primary"><i class="fas fa-info"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </section>
        <!-- /.content -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  