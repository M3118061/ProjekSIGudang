<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Laporan Barang Masuk')</title>
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
            <h1 class="m-0">Laporan Barang Masuk</h1>
          </div>
        </div><!-- /.row -->
      </div>
      <form method="post" action="/laporan/cetak">
        <table>
          <tr>            
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
    
    <!-- /.content -->
  </div>
  
  @include('layouts/footer')