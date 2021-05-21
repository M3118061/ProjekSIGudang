<?php

namespace App\Http\Controllers;

use App\Models\SatuanBarang;
use Illuminate\Http\Request;

class SatuanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuanBarang = SatuanBarang::paginate(3);
        return view('barang.satuan.index', compact('satuanBarang'));
    }

    public function cari(Request $request){
        $search = $request->get('search');
        $satuanBarang = SatuanBarang::where('nama_satuan','like',"%".$search."%")->paginate(3);
        return view('barang.satuan.index',compact('satuanBarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.satuan.create');
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
            'nama_satuan' => 'required'
        ]);

        SatuanBarang::create($request->all());

        return redirect('/satuan')->with('success', 'Data Satuan Barang Berhasil Ditambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function show(SatuanBarang $satuanBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(SatuanBarang $satuanBarang)
    {
        return view('barang.satuan.edit', compact('satuanBarang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SatuanBarang $satuanBarang)
    {
        $request->validate([
            'nama_satuan' => 'required'
        ]);

        SatuanBarang::where('id_satuan', $satuanBarang->id_satuan)
                    ->update([
                        'nama_satuan' => $request->nama_satuan
                    ]);
        
        return redirect('/satuan')->with('success', 'Data Satuan Barang Berhasil Diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(SatuanBarang $satuanBarang)
    {
        SatuanBarang::destroy($satuanBarang->id_satuan);
        return redirect('/satuan')->with('success','Data Satuan Barang Berhasil Dihapus!!');
    }
}
