<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Tambah Data Stok')</title>
  @include('layouts/header')

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
    $( function() {
      $( "#tgl_exp" ).datepicker({
        dateFormat: "yy-mm-dd"
      });
    } );
    </script>

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
            <h1 class="m-0">Tambah Data Stok</h1>
          </div>
        </div><!-- /.row -->
        <!-- Main content -->
        <form method="POST" action="/jenis">
          @csrf
          <div class="form-group">
            <label for="id_barang" class="form-label">Kode Barang</label>
            <select name="id_barang" id="id_barang" class="form-control">
              <option value="0" disabled selected>--Pilih--</option>
              @foreach ($dataBarang as $dataBarang)
                <option value="{{ $dataBarang->id_barang }}">{{ $dataBarang->kode_barang }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <select name="nama_barang" id="nama_barang" class="form-control">
              <option value="">--Pilih--</option>
          </select>
          </div>

          <div class="form-group">
            <label for="jenis" class="form-label">Jenis Barang</label>
            <select name="jenis" id="jenis" class="form-control">
              <option value="">--Pilih--</option>
          </select>
          </div>
          
          <div class="form-group">
            <label for="jml_barang" class="form-label">Jumlah Barang</label>
            <input type="text" class="form-control @error('jml_barang') is-invalid @enderror" id="jml_barang" placeholder="Masukkan jumlah barang" name="jml_barang" value="{{ old('jml_barang') }}">
            @error('jml_barang')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="satuan" class="form-label">Satuan Barang</label>
            <select name="satuan" id="satuan" class="form-control">
              <option value="">--Pilih--</option>
          </select>
          </div>

          <div class="form-group">
            <label for="tgl_exp" class="form-label">Tanggal EXP</label>
            <input type="text" class="form-control @error('tgl_exp') is-invalid @enderror" id="tgl_exp" name="tgl_exp" value="{{ old('tgl_exp') }}">
            @error('tgl_exp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <script src="http://code.jquery.com/jquery-3.4.1.js"></script>

          <script>
            $(document).ready(function () {
            $('#id_barang').on('change', function () {
            let id = $(this).val();
            $('#nama_barang').empty();
            $('#nama_barang').append(`<option value="0" disabled selected>Processing...</option>`);
            $.ajax({
            type: 'GET',
            url: 'NamaBarang' + id,
            success: function (response) {
            var response = JSON.parse(response);
            console.log(response);   
            $('#nama_barang').empty();
            $('#nama_barang').append(`<option value="0" disabled selected>Select nama barang</option>`);
            response.forEach(element => {
                $('#nama_barang').append(`<option value="${element['id']}">${element['name']}</option>`);
                });
              }
           });
          });
          });
          </script>

          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/stokBarang" class="btn btn-danger">Cancel</a>
        </form>
        <!-- /.content -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  