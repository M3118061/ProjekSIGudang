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

        <div class="row g-3 align-items-center">
          <div class="col-auto">
            <form method="post">
              <a href="/supplier/create" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"> Tambah Data</i>
              </a>
            </form>
          </div>
          <div class="col-auto">
            <form action="{{ route('supplier.search') }}" method="GET">
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
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Telp</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($supplier as $sup)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $sup->nama_supplier }}</td>
                <td>{{ $sup->jk }}</td>
                <td>{{ $sup->alamat }}</td>
                <td>{{ $sup->no_telp }}</td>
                <td class="text-center">
                  <a href="/supplier/{{ $sup->id_supplier }}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                  <form action="/supplier/{{ $sup->id_supplier }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
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
          {{ $supplier->links() }}
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

  