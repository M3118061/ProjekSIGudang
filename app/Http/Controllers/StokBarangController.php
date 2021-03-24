<?php

namespace App\Http\Controllers;

use App\Models\StokBarang;
use App\Models\DataBarang;
use App\Models\SatuanBarang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class StokBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stokBarang = StokBarang::all();
        $dataBarang = DataBarang::all();
        return view('barang.stok.index', compact('stokBarang','dataBarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kodeBarang = DataBarang::pluck('kode_barang','id_barang');
        $namaBarang = DataBarang::pluck('nama_barang','id_barang');
        $jenisBarang = JenisBarang::all();
        $satuanBarang = SatuanBarang::all();

        return view('barang.stok.create', compact('kodeBarang','namaBarang','jenisBarang','satuanBarang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'jenis' => 'required',
            'jml_barang' => 'required',
            'satuan' => 'required',
            'tgl_exp' => 'required',
        ]);

        StokBarang::create($request->all());

        return redirect('/stokBarang')->with('message', 'Data barang berhasil ditambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StokBarang  $stokBarang
     * @return \Illuminate\Http\Response
     */
    public function show(StokBarang $stokBarang)
    {
        return view('barang.stok.show',compact('stokBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StokBarang  $stokBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(StokBarang $stokBarang)
    {
        $kodeBarang = DataBarang::pluck('kode_barang','id_barang');
        $namaBarang = DataBarang::pluck('nama_barang','id_barang');
        $jenisBarang = JenisBarang::all();
        $satuanBarang = SatuanBarang::all();

        return view('barang.stok.edit', compact('kodeBarang','namaBarang','jenisBarang','satuanBarang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StokBarang  $stokBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StokBarang $stokBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StokBarang  $stokBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(StokBarang $stokBarang)
    {
        StokBarang::destroy($stokBarang->id_stok);
        return redirect('/stokBarang')->with('message', 'Data Supplier Berhasil Dihapus!');
    }
}
