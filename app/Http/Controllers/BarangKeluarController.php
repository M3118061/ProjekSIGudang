<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use App\Models\DataBarang;
use App\Models\JenisBarang;
use App\Models\SatuanBarang;
use App\Models\StokBarang;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangKeluar = BarangKeluar::paginate(3);
        return view('transaksi.BarangKeluar.index', compact('barangKeluar'));
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
        return view('transaksi.BarangKeluar.create',compact('kodeBarang','namaBarang','jenisBarang','satuanBarang'));
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
            'jml_barang' => 'required|numeric',
            'satuan' => 'required',
            'tgl_keluar' => 'required|date',
        ]);
        
        BarangKeluar::create($request->all());
        
        $stokBarang = StokBarang::findOrFail($request->id_barang);
        $stokBarang->jml_barang -= $request->jml_barang;
        $stokBarang->save();
        
        return redirect('/BarangKeluar')->with('message', 'Data barang berhasil ditambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(BarangKeluar $barangKeluar)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        $kodeBarang = DataBarang::pluck('kode_barang','id_barang');
        $namaBarang = DataBarang::pluck('nama_barang','id_barang');
        $jenisBarang = JenisBarang::all();
        $satuanBarang = SatuanBarang::all();
        return view('transaksi.BarangKeluar.edit', compact('kodeBarang','namaBarang','barangKeluar','jenisBarang','satuanBarang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        $request->validate([
            'id_barang' => 'required',
            'jenis' => 'required',
            'jml_barang' => 'required',
            'satuan' => 'required',
            'tgl_keluar' => 'required',
        ]);

        BarangKeluar::where('id_keluar', $barangKeluar->id_keluar)
                ->update([
                    'id_barang' => $request->id_barang,
                    'jenis' => $request->jenis,
                    'jml_barang' => $request->jml_barang,
                    'satuan' => $request->satuan,
                    'tgl_keluar' => $request->tgl_keluar,
                ]);

        return redirect('/BarangKeluar')->with('pesan', 'Data Supplier Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangKeluar $barangKeluar)
    {
        BarangKeluar::destroy($barangKeluar->id_keluar);
        return redirect('/BarangKeluar')->with('message', 'Data Supplier Berhasil Dihapus!');
    }

    public function cetakBarangKeluar()
    {
        $barangKeluar = BarangKeluar::get();
        return view('transaksi.BarangKeluar.cetak', compact('barangKeluar'));
    }
}
