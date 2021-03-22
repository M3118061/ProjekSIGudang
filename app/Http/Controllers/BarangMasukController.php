<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\DataBarang;
use App\Models\JenisBarang;
use App\Models\SatuanBarang;
use App\Models\Supplier;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangMasuk = BarangMasuk::all();
        return view('transaksi.BarangMasuk.index', compact('barangMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $dataBarang = DataBarang::all();
        $kodeBarang = DataBarang::pluck('kode_barang','id_barang');
        $namaBarang = DataBarang::pluck('nama_barang','id_barang');
        $jenisBarang = JenisBarang::all();
        $satuanBarang = SatuanBarang::all();
        $supplier = Supplier::all();
        return view('transaksi.BarangMasuk.create',compact('kodeBarang','namaBarang','supplier','jenisBarang','satuanBarang'));
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
            'tgl_masuk' => 'required',
            'id_supplier' => 'required',
        ]);

        BarangMasuk::create($request->all());

        return redirect('/BarangMasuk')->with('message', 'Data barang berhasil ditambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(BarangMasuk $barangMasuk)
    {
        return view('transaksi.BarangMasuk.show', compact('barangMasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangMasuk $barangMasuk)
    {
        $kodeBarang = DataBarang::pluck('kode_barang','id_barang');
        $namaBarang = DataBarang::pluck('nama_barang','id_barang');
        $jenisBarang = JenisBarang::all();
        $satuanBarang = SatuanBarang::all();
        $supplier = Supplier::all();
        return view('transaksi.BarangMasuk.edit', compact('kodeBarang','namaBarang','barangMasuk','jenisBarang','satuanBarang','supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        $request->validate([
            'id_barang' => 'required',
            'jenis' => 'required',
            'jml_barang' => 'required',
            'satuan' => 'required',
            'tgl_masuk' => 'required',
            'id_supplier' => 'required',
        ]);

        BarangMasuk::where('id_masuk', $barangMasuk->id_masuk)
                ->update([
                    'id_barang' => $request->id_barang,
                    'jenis' => $request->jenis,
                    'jml_barang' => $request->jml_barang,
                    'satuan' => $request->satuan,
                    'tgl_masuk' => $request->tgl_masuk,
                    'id_supplier' => $request->id_supplier,
                ]);

        return redirect('/BarangMasuk')->with('pesan', 'Data Supplier Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangMasuk $barangMasuk)
    {
        BarangMasuk::destroy($barangMasuk->id_masuk);
        return redirect('/BarangMasuk')->with('message', 'Data Supplier Berhasil Dihapus!');
    }
}
