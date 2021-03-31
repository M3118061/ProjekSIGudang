<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Laporan Stok Pertanggal')</title>
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
            <h1 class="m-2">Laporan Stok Pertanggal</h1>
          </div>
        </div>
        <div class="card-body">
          <div class=" my-3">
            <label for="label">Tanggal Awal : </label>
            <input type="date" name="tglawal" id="tglawal" class="form-control">
          </div>
          <div class=" my-3">
            <label for="label">Taggal Akhir : </label>
            <input type="date" name="tglakhir" id="tglakhir" class="form-control">
          </div>
          <div class=" my-3">
            <a href="" onclick="this.href='/laporanStokPertanggal/'+document.getElementById('tglawal').value + '/' 
            + document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary">Stok Pertanggal</a>
          </div>
        </div><!-- /.row -->
      </div>
      
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  
  @include('layouts/footer')