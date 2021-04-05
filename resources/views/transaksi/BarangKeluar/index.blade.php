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
      <table class="table table-bordered">
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
          @foreach ($barangKeluar as $brgKeluar)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $brgKeluar->dataBarang->kode_barang }}</td>
            <td>{{ $brgKeluar->dataBarang->nama_barang }}</td>
            <td>{{ $brgKeluar->dataBarang->jenis->nama_jenis }}</td>
            <td>{{ $brgKeluar->jml_barang }}</td>
            <td>{{ $brgKeluar->dataBarang->satuan->nama_satuan }}</td>
            <td>{{ $brgKeluar->tgl_keluar }}</td>
            <td>
              <a href="/BarangKeluar/{{ $brgKeluar->id_keluar }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>

              <form action="/BarangKeluar/{{ $brgKeluar->id_keluar }}" method="POST" class="d-inline">
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
      {{ $barangKeluar->links() }}
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

  