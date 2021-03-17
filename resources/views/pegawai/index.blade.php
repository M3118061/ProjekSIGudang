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
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pegawai</h1>
          </div>
        </div><!-- /.row -->
        <a href="/pegawai/create" class="btn btn-primary"><i class="fas fa-plus-square"></i></a>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pegawai as $pegawai)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $pegawai->name }}</td>
            <td>{{ $pegawai->email }}</td>
            <td>
              <a href="/pegawai/{{ $pegawai->id }}" class="btn btn-info"><i class="fas fa-info"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </section>
    <!-- /.content -->
  </div>
  
  @include('layouts/footer')

  