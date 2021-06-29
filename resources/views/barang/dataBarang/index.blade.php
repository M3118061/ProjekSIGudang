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
      <div class="card card-into card card-outline card-header">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang</h1>
          </div>
        </div><!-- /.row -->
        <div class="row g-3 align-items-center">
          <div class="col-auto">
            <form method="post">
              <a href="/dataBarang/create" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"> Tambah Data</i>
              </a>
            </form>
          </div>
          <div class="col-auto">
            <form action="{{ route('dataBarang.search') }}" method="GET">
              <div class="input-group">
                <input type="search" class="form-control" name="search">
                <span class="input-group-prepend">
                  <button type="submit" class="btn btn-secondary btn-sm">Search</button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <br>
        @if (session('success'))
                <div class="alert alert-success" role="alert">
                  {{ session('success') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
        @endif
        <!-- Main content -->
        <section class="content">
          <table class="table data-table dt-head-center table-sm table-bordered table-hover table-striped">
            <thead class="text-center">
              <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Satuan</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dataBarang as $dtBarang)
              <tr>
                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                <td>{{ $dtBarang->kode_barang }}</td>
                <td>{{ $dtBarang->nama_barang }}</td>
                <td>{{ $dtBarang->jenis->nama_jenis }}</td>
                <td>{{ $dtBarang->satuan->nama_satuan }}</td>
                <td class="text-center">
                  <a href="/dataBarang/{{ $dtBarang->id_barang }}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                  <form action="/dataBarang/{{ $dtBarang->id_barang }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </section>
        <div class="pull-right">
          {{ $dataBarang->links() }}
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

  