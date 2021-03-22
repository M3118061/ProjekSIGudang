<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Tambah Data Barang Masuk')</title>
  @include('layouts/header')
  {{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   --}}
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
            <h1 class="m-0">Tambah Data Barang Masuk</h1>
          </div>
        </div><!-- /.row -->
        <!-- Main content -->
        <form method="POST" action="/BarangMasuk">
          @csrf
          {{--  <div class="form-group">
            <label for="id_barang" class="form-label">Kode Barang</label>
            <select name="kode_barang" id="id_barang" class="form-control">
              <option value="">--Pilih--</option>
              @foreach ($kodeBarang as $key => $value)
                  <option value="{{ $key }}">
                    {{ $key . ' - ' . $value }}
                  </option>
              @endforeach
            </select>
          </div>  --}}
          <div class="form-group">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <select name="id_barang" id="nama_barang" class="form-control">
              <option value="">--Pilih--</option>
              @foreach ($dataBarang as $dataBarang)
                <option value="{{ $dataBarang->id_barang }}">{{ $dataBarang->nama_barang }}</option>
              @endforeach
            </select>
          </div>

          {{--  <script type="text/javascript">
            jQuery(document).ready(function ()
            {
                    jQuery('select[name="id_barang"]').on('change',function(){
                       var id_barang = jQuery(this).val();
                       if(id_barang)
                       {
                          jQuery.ajax({
                             url : '/BarangMasuk/create' +id_barang,
                             type : "GET",
                             dataType : "json",
                             success:function(data)
                             {
                                console.log(data);
                                jQuery('select[name="nama_barang"]').empty();
                                jQuery.each(data, function(key,value){
                                   $('select[name="nama_barang"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                             }
                          });
                       }
                       else
                       {
                          $('select[name="nama_barang"]').empty();
                       }
                    });
            });
            </script>  --}}

          <div class="form-group">
            <label for="jenis" class="form-label">Jenis</label>
            <select name="jenis" id="jenis" class="form-control">
              <option value="">--Pilih--</option>
              @foreach ($jenisBarang as $jenisBarang)
                <option value="{{ $jenisBarang->id_jenis }}">{{ $jenisBarang->nama_jenis }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="jml_barang" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control @error('jml_barang') is-invalid @enderror" id="jml_barang" placeholder="Masukkan jumlah barang" name="jml_barang" value="{{ old('jml_barang') }}">
            @error('jml_barang')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="satuan" class="form-label">Satuan</label>
            <select name="satuan" id="satuan" class="form-control">
              <option value="">--Pilih--</option>
              @foreach ($satuanBarang as $satuanBarang)
                <option value="{{ $satuanBarang->id_satuan }}">{{ $satuanBarang->nama_satuan }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
            <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" id="tgl_masuk" name="tgl_masuk" value="{{ old('tgl_masuk') }}">
            @error('tgl_masuk')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="id_supplier" class="form-label">Supplier</label>
            <select name="id_supplier" id="id_supplier" class="form-control">
              <option value="">--Pilih--</option>
              @foreach ($supplier as $supplier)
                <option value="{{ $supplier->id_supplier }}">{{ $supplier->nama_supplier }}</option>
              @endforeach
            </select>
          </div>
          
          
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/BarangMasuk" class="btn btn-danger">Cancel</a>
        </form>
        <!-- /.content -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  