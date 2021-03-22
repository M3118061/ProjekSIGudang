<?php

namespace App\Http\Controllers;

use App\Models\StokBarang;
use App\Models\DataBarang;
use App\Models\SatuanBarang;
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
        $dataBarang = DataBarang::all();
        $satuanBarang = SatuanBarang::all();
        // $dataBarang = DataBarang::pluck('nama_barang','id_barang');
        // $satuanBarang = SatuanBarang::pluck('nama_satuan','id_satuan');
        return view('barang.stok.create', compact('dataBarang','satuanBarang'));
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
            'nama_barang' => 'required',
            'jml_barang' => 'required | numeric',
            'satuan' => 'required',
            'tgl_exp' => 'required | date',
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
}
