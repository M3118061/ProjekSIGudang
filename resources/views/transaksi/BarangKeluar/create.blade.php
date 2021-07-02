<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Tambah Data Barang Keluar')</title>
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
              <strong>Tambah Data Barang Keluar</strong>
            </div>
            <div class="float-right">
              <a href="/BarangKeluar" class="btn btn-secondary btn-sm"><i class="fas fa-undo"> Back</i></a>
            </div>
          </div>
        </div><!-- /.row -->
        <!-- Main content -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 offset-md-4">
              <section class="content">
              <form class="p-3" method="POST" action="/BarangKeluar">
                @csrf
                <div class="mb-3">
                  <label for="id_stok" class="form-label">ID Stok</label>
                  <select name="id_stok" id="id_stok" class="form-control @error('id_stok') is-invalid @enderror">
                    <option value="">- Pilih -</option>
                    @foreach ($stokBarang as $item)
                        <option value="{{ $item->id_stok }}">{{ $item->id_stok }} | {{ $item->dataBarang->kode_barang }} | {{ $item->dataBarang->nama_barang }} | {{ $item->dataBarang->jenis->nama_jenis }} | {{ $item->dataBarang->satuan->nama_satuan }} | {{ $item->tgl_exp }}</option>
                    @endforeach
                  </select>
                  @error('id_stok')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                {{-- <div class="mb-3">
                  <label for="kode_barang" class="form-label">Kode Barang</label>
                  <select name="id_barang" id="kode_barang" class="form-control @error('id_barang') is-invalid @enderror">
                    <option value="">--Pilih--</option>
                    @foreach ($kodeBarang as $key => $value)
                        <option value="{{ $key }}">
                          {{ $key . ' - ' . $value }}
                        </option>
                    @endforeach
                  </select>
                  @error('id_barang')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div> --}}
                {{-- <div class="mb-3">
                  <label for="nama_barang" class="form-label">Nama Barang</label>
                  <select name="id_barang" id="nama_barang" class="form-control @error('id_barang') is-invalid @enderror">
                    <option value="">--Pilih--</option>
                    @foreach ($namaBarang as $key => $value)
                        <option value="{{ $key }}">
                          {{ $key . ' - ' . $value }}
                        </option>
                    @endforeach
                  </select>
                  @error('id_barang')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div> --}}
                {{-- <div class="mb-3">
                  <label for="jenis" class="form-label">Jenis</label>
                  <select name="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror">
                    <option value="">--Pilih--</option>
                    @foreach ($jenisBarang as $jenisBarang)
                      <option value="{{ $jenisBarang->id_jenis }}">{{ $jenisBarang->nama_jenis }}</option>
                    @endforeach
                  </select>
                  @error('jenis')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div> --}}
                <div class="mb-3">
                  <label for="jml_barang" class="form-label">Jumlah Barang</label>
                  <input type="number" class="form-control @error('jml_barang') is-invalid @enderror" id="jml_barang" placeholder="Masukkan jumlah barang" name="jml_barang" value="{{ old('jml_barang') }}">
                  @error('jml_barang')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                {{-- <div class="mb-3">
                  <label for="satuan" class="form-label">Satuan</label>
                  <select name="satuan" id="satuan" class="form-control @error('satuan') is-invalid @enderror">
                    <option value="">--Pilih--</option>
                    @foreach ($satuanBarang as $satuanBarang)
                      <option value="{{ $satuanBarang->id_satuan }}">{{ $satuanBarang->nama_satuan }}</option>
                    @endforeach
                  </select>
                  @error('satuan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div> --}}
                <div class="mb-3">
                  <label for="tgl_keluar" class="form-label">Tanggal Keluar</label>
                  <input type="date" class="form-control @error('tgl_keluar') is-invalid @enderror" id="tgl_keluar" name="tgl_keluar" value="{{ old('tgl_keluar') }}">
                  @error('tgl_keluar')
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

  