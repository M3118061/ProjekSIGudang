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
        <div class="row g-3 align-items-center">
          <div class="col-auto">
            <form method="post">
              <a href="/BarangKeluar/create" class="btn btn-primary">
                <i class="fas fa-plus-square"> Tambah Data</i>
              </a>
            </form>
          </div>
          <div class="col-auto">
            <a href="/BarangKeluar/cetak" class="btn btn-success" target="blank">
              <i class="fas fa-print"> Cetak Semua Data</i>
            </a>
          </div>
          <div class="col-auto">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#laporanStok">
              Laporan Pertanggal
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
                        <div class=" my-3">
                          <a href="" onclick="this.href='/laporanKeluarPertanggal/'+document.getElementById('tglawal').value + '/' 
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

  