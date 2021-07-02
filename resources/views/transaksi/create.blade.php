<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Tambah Data Transaksi')</title>
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
      <div class="card">
        <div class="card-outline">
          <div class="card-header">
            <div class="float-left">
              <strong>Tambah Data Transaksi</strong>
            </div>
            <div class="float-right">
              <a href="/transaksi" class="btn btn-secondary btn-sm"><i class="fas fa-undo"> Back</i></a>
            </div>
          </div>
        </div><!-- /.row -->
        <!-- Main content -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 offset-md-4">
              <section class="content">
              <!-- Session -->
              @if (Session::get('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              @endif
              
              @if (Session::get('failed'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('failed') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              @endif

              <form class="p-3" method="POST" action="/transaksi">
                @csrf
                <div class="mb-3">
                  <label for="id_stok" class="form-label">ID Barang</label>
                  <select name="id_stok" id="id_stok" class="form-control @error('id_stok') is-invalid @enderror">
                    @if ($stokBarang->count() == 0)
                        <option value="">Belum Ada Stok Barang</option>
                    @else
                        @foreach ($stokBarang as $item)
                            <option value="{{ $item->id_stok }}">{{ $item->id_stok }} | {{ $item->dataBarang->kode_barang }} | {{ $item->dataBarang->nama_barang }} | {{ $item->dataBarang->jenis->nama_jenis }} | {{ $item->dataBarang->satuan->nama_satuan }}</option>
                        @endforeach
                    @endif
                  </select>
                  @error('id_stok')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="jml_barang" class="form-label">Jumlah Barang</label>
                  <input type="number" class="form-control @error('jml_barang') is-invalid @enderror" id="jml_barang" placeholder="Masukkan jumlah barang" name="jml_barang" value="{{ old('jml_barang') }}">
                  @error('jml_barang')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
                  <input type="date" class="form-control @error('tgl_transaksi') is-invalid @enderror" id="tgl_transaksi" name="tgl_transaksi" value="{{ old('tgl_transaksi') }}">
                  @error('tgl_transaksi')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="tipe" class="form-label">Tipe</label>
                  <select name="tipe" id="tipe" class="form-control @error('tipe') is-invalid @enderror">
                      <option value="">----- Pilih -----</option>
                      <option value="jual">Jual</option>
                      <option value="beli">Beli</option>
                  </select>
                  @error('tipe')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              </section>
            </div>
          </div>
        </div>
        <!-- /.content -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  