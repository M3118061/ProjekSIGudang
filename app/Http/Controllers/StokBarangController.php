<?php

namespace App\Http\Controllers;

use App\Models\StokBarang;
use App\Models\DataBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $dataBarang = DataBarang::pluck('nama_barang','id_barang');
        return view('barang.stok.create', compact('dataBarang'));
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
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'jenis' => 'required',
            'jml_barang' => 'required'|'numeric',
            'satuan' => 'required',
            'tgl_exp' => 'required',
        ]);

        StokBarang::create($request->all());

        return redirect('/stokBarang')->with('pesan', 'Stok Barang Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StokBarang  $stokBarang
     * @return \Illuminate\Http\Response
     */
    public function show(StokBarang $stokBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StokBarang  $stokBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(StokBarang $stokBarang)
    {
        //
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
        //
    }

    public function NamaBarang($id){
        echo json_encode(DB::table('data_barang')->where('nama_barang', $id)->get());
    }
}
