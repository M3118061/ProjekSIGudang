<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\JenisBarang;
use App\Models\SatuanBarang;
use Illuminate\Http\Request;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataBarang = DataBarang::all();
        return view('barang.dataBarang.index', compact('dataBarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisBarang = JenisBarang::all();
        $satuanBarang = SatuanBarang::all();
        return view('barang.dataBarang.create', compact('jenisBarang','satuanBarang'));
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
            'id_jenis' => 'required',
            'id_satuan' => 'required',
        ]);

        DataBarang::create($request->all());

        return redirect('/dataBarang')->with('message', 'Data barang berhasil ditambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function show(DataBarang $dataBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(DataBarang $dataBarang)
    {
        $jenisBarang = JenisBarang::all();
        $satuanBarang = SatuanBarang::all();
        return view('barang.dataBarang.edit', compact('dataBarang','jenisBarang','satuanBarang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataBarang $dataBarang)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'id_jenis' => 'required',
            'id_satuan' => 'required'
        ]);

        DataBarang::where('id_barang', $dataBarang->id_barang)
                  ->update([
                      'kode_barang' => $request->kode_barang,
                      'nama_barang' => $request->nama_barang,
                      'id_jenis' => $request->id_jenis,
                      'id_satuan' => $request->id_satuan
                  ]);
        
        return redirect('/dataBarang')->with('message','Data barang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataBarang $dataBarang)
    {
        DataBarang::destroy($dataBarang->id_barang);
        return redirect('/dataBarang')->with('message','Data jenis berhasil dihapus!!');
    }
}
