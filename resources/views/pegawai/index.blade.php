<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Data Pegawai')</title>
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
            <h1 class="m-0">Data Pegawai</h1>
          </div>
          </div><!-- /.row -->
          <div class="row g-3 align-items-center">
            <div class="col-auto">
              <form method="post">
                <a href="/pegawai/create" class="btn btn-primary">
                  <i class="fas fa-plus-square"> Tambah Data</i>
                </a>
              </form>
            </div>
            <div class="col-auto">
              <form action="{{ route('pegawai.search') }}" method="GET">
                <div class="input-group">
                  <input type="search" class="form-control" name="search">
                  <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
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
          <table class="table table-bordered">
            <thead class="table-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pegawai as $pgw)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $pgw->name }}</td>
                <td>{{ $pgw->email }}</td>
                <td>
                  <a href="/pegawai/{{ $pgw->id }}" class="btn btn-info"><i class="fas fa-info"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </section>
        <div class="pull-right">
          {{ $pegawai->links() }}
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

  