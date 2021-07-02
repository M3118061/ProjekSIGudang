<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisBarang = JenisBarang::orderBy('created_at','desc')->paginate(10);
        return view('barang.jenis.index', compact('jenisBarang'));
    }

    public function cari(Request $request){
        $search = $request->get('search');
        $jenisBarang = JenisBarang::where('nama_jenis','like',"%".$search."%")->paginate(3);
        return view('barang.jenis.index',compact('jenisBarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.jenis.create');
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
            'nama_jenis' => 'required',
        ]);

        JenisBarang::create($request->all());

        return redirect('/jenis')->with('success', 'Data Jenis Barang Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function show(JenisBarang $jenisBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisBarang $jenisBarang)
    {
        return view('barang.jenis.edit', compact('jenisBarang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisBarang $jenisBarang)
    {
        $request->validate([
            'nama_jenis' => 'required'
        ]);

        JenisBarang::where('id_jenis', $jenisBarang->id_jenis)
                    ->update([
                        'nama_jenis' => $request->nama_jenis
                    ]);

        return redirect('/jenis')->with('success', 'Data Jenis Barang Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisBarang $jenisBarang)
    {
        JenisBarang::destroy($jenisBarang->id_jenis);
        return redirect('/jenis')->with('success','Data Jenis Barang Berhasil Dihapus!!');
    }
}
