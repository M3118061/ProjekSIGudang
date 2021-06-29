<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Ubah Data Stok Barang')</title>
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
              <strong>Edit Data Stok</strong>
            </div>
            <div class="float-right">
              <a href="/stokBarang" class="btn btn-secondary btn-sm"><i class="fas fa-undo"> Back</i></a>
            </div>
          </div>
        </div><!-- /.row -->
        <!-- Main content -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 offset-md-4">
              <section class="content">
              <form class="p-3" method="POST" action="/stokBarang/{{ $stokBarang->id_stok }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                  <label for="id_barang" class="form-label">ID Barang</label>
                  <select name="id_barang" id="id_barang" class="form-control @error('id_barang') is-invalid @enderror">
                    <option value="">- Pilih -</option>
                    @foreach ($dataBarang as $item)
                        <option value="{{ $item->id_barang }}">{{ $item->id_barang }} | {{ $item->kode_barang }} | {{ $item->nama_barang }} | {{ $item->jenis->nama_jenis }} | {{ $item->satuan->nama_satuan }}</option>
                    @endforeach
                  </select>
                  @error('id_barang')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="jml_barang" class="form-label">Jumlah Barang</label>
                  <input type="number" class="form-control @error('jml_barang') is-invalid @enderror" id="jml_barang" name="jml_barang" value="{{ $stokBarang->jml_barang }}">
                  @error('jml_barang')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="tgl_exp" class="form-label">Tanggal EXP</label>
                  <input type="date" class="form-control @error('tgl_exp') is-invalid @enderror" id="tgl_exp" name="tgl_exp" value="{{ $stokBarang->tgl_exp }}">
                  @error('tgl_exp')
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

  