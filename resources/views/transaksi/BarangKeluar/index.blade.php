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
      <div class="card card-into card card-outline card-header">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Barang Keluar</h1>
          </div>
        </div><!-- /.row -->
        <form method="post">
          <table>
            <tr>
              <td>
                <a href="/BarangKeluar/create" class="btn btn-primary">
                  <i class="fas fa-plus-square"> Tambah Data</i>
                </a>
              </td>
              <td>
                <a href="/BarangKeluar/cetak" class="btn btn-success" target="blank">
                  <i class="fas fa-print"> Cetak Semua Data</i>
                </a>&nbsp;&nbsp;&nbsp;
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
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Jenis</th>
            <th scope="col">Jumlah Barang</th>
            <th scope="col">Satuan</th>
            <th scope="col">Tanggal Keluar</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($barangKeluar as $barangKeluar)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $barangKeluar->dataBarang->kode_barang }}</td>
            <td>{{ $barangKeluar->dataBarang->nama_barang }}</td>
            <td>{{ $barangKeluar->dataBarang->jenis->nama_jenis }}</td>
            <td>{{ $barangKeluar->jml_barang }}</td>
            <td>{{ $barangKeluar->dataBarang->satuan->nama_satuan }}</td>
            <td>{{ $barangKeluar->tgl_keluar }}</td>
            <td>
              <a href="/BarangKeluar/{{ $barangKeluar->id_keluar }}" class="btn btn-primary"><i class="fas fa-info"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </section>
    <!-- /.content -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  