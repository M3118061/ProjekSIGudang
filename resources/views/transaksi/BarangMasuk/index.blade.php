<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Barang Masuk')</title>
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
            <h1 class="m-0">Barang Masuk</h1>
          </div>
        </div><!-- /.row -->
        
        <form method="post">
          @csrf
          <table>
            <tr>
              <td>
                <a href="/BarangMasuk/create" class="btn btn-primary">
                  <i class="fas fa-plus-square"> Tambah Data</i>
                </a>
              </td>
              <td>
                <a href="/BarangMasuk/cetak" class="btn btn-success" target="blank">
                  <i class="fas fa-print"> Cetak Semua Data</i>
                </a> 
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
            <th scope="col">Tanggal Masuk</th>
            <th scope="col">Nama Supplier</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($barangMasuk as $brgMasuk)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $brgMasuk->dataBarang->kode_barang }}</td>
            <td>{{ $brgMasuk->dataBarang->nama_barang }}</td>
            <td>{{ $brgMasuk->dataBarang->jenis->nama_jenis }}</td>
            <td>{{ $brgMasuk->jml_barang }}</td>
            <td>{{ $brgMasuk->dataBarang->satuan->nama_satuan }}</td>
            <td>{{ $brgMasuk->tgl_masuk }}</td>
            <td>{{ $brgMasuk->supplier->nama_supplier }}</td>
            <td>
              <a href="/BarangMasuk/{{ $brgMasuk->id_masuk }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>

            <form action="/BarangMasuk/{{ $brgMasuk->id_masuk }}" method="POST" class="d-inline">
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
      {{ $barangMasuk->links() }}
    </div>
    <style>
      .w-5{
        display: none;
      }
    </style>
    <!-- /.content -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  