<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Data Pengguna')</title>
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
            <h1 class="m-0">Data Pengguna</h1>
          </div>
          </div><!-- /.row -->
          <div class="row g-3 align-items-center">
            <div class="col-auto">
              <form method="post">
                <a href="/user/create" class="btn btn-primary btn-sm">
                  <i class="fas fa-plus"> Tambah Data</i>
                </a>
              </form>
            </div>
            <div class="col-auto">
              <form action="{{ route('user.search') }}" method="GET">
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
                <th scope="col">Alamat</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">No Telp</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">EXP Reminder</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($user as $usr)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $usr->name }}</td>
                <td>{{ $usr->alamat }}</td>
                <td>{{ $usr->jk }}</td>
                <td>{{ $usr->no_telp }}</td>
                <td>{{ $usr->email }}</td>
                <td>{{ $usr->role }}</td>
                <td>{{ $usr->exp_reminder }} hari</td>
                <td><span class="badge {{ ($usr->status == 1) ? 'bg-success' : 'bg-secondary' }}">{{ ($usr->status == 1) ? 'Aktif' : 'Tidak Aktif' }}</span></td>
                <td class="text-center">
                  @if ($usr->status == 1)
                    <a href="/user/status/{{ $usr->id }}" class="btn btn-sm btn-secondary"><i class="fas fa-times-circle"></i></a>
                  @else
                    <a href="/user/status/{{ $usr->id }}" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i></a>
                  @endif
                  {{--  <a href="/user/{{ $usr->id }}" class="btn btn-default btn-sm"><i class="fas fa-eye"></i></a>  --}}

                  <a href="/user/{{ $usr->id }}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                  <form action="/user/{{ $usr->id }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
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
          {{ $user->links() }}
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

  