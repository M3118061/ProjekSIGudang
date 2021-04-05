<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Satuan Barang')</title>
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
            <h1 class="m-0">Satuan Barang</h1>
          </div>
        </div><!-- /.row -->
        <form method="post">
          <table>
            <tr>
              <td>
                <a href="/satuan/create" class="btn btn-primary">
                  <i class="fas fa-plus-square"> Tambah Data</i>
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
              <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Satuan Barang</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($satuanBarang as $satuan)
              <tr>
                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                <td>{{ $satuan->nama_satuan }}</td>
                <td class="text-center">
                  <a href="/satuan/{{ $satuan->id_satuan }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>

                  <form action="/satuan/{{ $satuan->id_satuan }}" method="POST" class="d-inline">
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
          {{ $satuanBarang->links() }}
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

  