<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Transaksi')</title>
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
            <h1 class="m-0">Transaksi</h1>
          </div>
        </div><!-- /.row -->

        <div class="row g-3 align-items-center">
          <div class="col-auto">
            <form method="post">
              <a href="/transaksi/create" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"> Tambah Data</i>
              </a>
            </form>
          </div>
          <div class="col-auto">
            <a href="/transaksi/cetak" class="btn btn-success btn-sm" target="blank">
              <i class="fas fa-print"> Cetak Semua Data</i>
            </a>
          </div>
          <div class="col-auto">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#laporanStok">
              <i class="fas fa-calendar"> Laporan Pertanggal</i>
            </button>
            <!-- Modal -->
            <div class="modal fade" id="laporanStok" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Cetak Laporan Pertanggal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <div class="my-3">
                          <label for="label">Tanggal Awal : </label>
                          <input type="date" name="tglawal" id="tglawal" class="form-control">
                        </div>
                        <div class="my-3">
                          <label for="label">Taggal Akhir : </label>
                          <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                        </div>
                        <div class="my-3">
                          <a href="" onclick="this.href='/laporanStokPertanggal/'+document.getElementById('tglawal').value + '/' 
                          + document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary"><i class="fas fa-print"> Cetak</i></a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
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
            <th scope="col">Jenis</th>
            <th scope="col">Jumlah Barang</th>
            <th scope="col">Satuan</th>
            <th scope="col">Tanggal Transaksi</th>
            <th scope="col">Status</th>
            {{--  <th scope="col">Status</th>  --}}
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transaksi as $trans)
          <tr>
            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
            <td>{{ $trans->stokBarang->dataBarang->kode_barang }}</td>
            <td>{{ $trans->stokBarang->dataBarang->nama_barang }}</td>
            <td>{{ $trans->stokBarang->dataBarang->jenis->nama_jenis }}</td>
            <td class="text-center">{{ $trans->jml_barang }}</td>
            <td>{{ $trans->stokBarang->dataBarang->satuan->nama_satuan }}</td>
            <td>{{ $trans->tgl_transaksi }}</td>
            <td class="text-center">
              <a href="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

            <form action="" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
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
    <div class="float-right">
      
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

  