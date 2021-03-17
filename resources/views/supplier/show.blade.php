<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Detail Supplier')</title>
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
            <h1 class="m-0">Detail Supplier</h1>
          </div>
        </div><!-- /.row -->
        <!-- Main content -->
        <div class="card" style="width: 20rem;">
          <div class="card-header">
            <h4>{{ $supplier->nama_supplier }}</h4>
          </div>
          <div class="card-body">
            <p class="card-text">Jenis Kelamin : {{ $supplier->jk }}</p>
            <p class="card-text">Alamat : {{ $supplier->alamat }}</p>
            <p class="card-text">No Telp : {{ $supplier->no_telp }}</p>

            <a href="{{ $supplier->id_supplier }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>

            <form action="/supplier/{{ $supplier->id_supplier }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </form>
            <a href="/supplier" class="btn btn-primary"><i class="fas fa-backspace"></i></a>
          </div>
        </div>
        <!-- /.content -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  