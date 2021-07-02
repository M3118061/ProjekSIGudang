<?php

namespace App\Http\Controllers;

use App\Models\StokBarang;
use App\Models\BarangMasuk;
// use App\Models\DataBarang;
use App\Models\JenisBarang;
// use App\Models\SatuanBarang;
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
        $barangMasuk = BarangMasuk::orderBy('created_at','desc')->paginate(10);
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
        // $kodeBarang = DataBarang::pluck('kode_barang','id_barang');
        // $namaBarang = DataBarang::pluck('nama_barang','id_barang');
        // $jenisBarang = JenisBarang::all();
        // $satuanBarang = SatuanBarang::all();
        $stokBarang = StokBarang::all();
        $supplier = Supplier::all();
        return view('transaksi.BarangMasuk.create',compact('supplier','stokBarang'));
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
            'id_stok' => 'required',
            // 'jenis' => 'required',
            'jml_barang' => 'required',
            // 'satuan' => 'required',
            'tgl_masuk' => 'required',
            'id_supplier' => 'required',
        ]);

        BarangMasuk::create($request->all());
        
        $stokBarang = StokBarang::findOrFail($request->id_stok);
        $stokBarang->jml_barang += $request->jml_barang;
        $stokBarang->save();

        return redirect('/BarangMasuk')->with('success', 'Data Barang Masuk Berhasil Ditambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(BarangMasuk $barangMasuk)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangMasuk $barangMasuk)
    {
        // $kodeBarang = DataBarang::pluck('kode_barang','id_barang');
        // $namaBarang = DataBarang::pluck('nama_barang','id_barang');
        // $jenisBarang = JenisBarang::all();
        // $satuanBarang = SatuanBarang::all();
        $stokBarang = StokBarang::all();
        $supplier = Supplier::all();
        return view('transaksi.BarangMasuk.edit', compact('stokBarang','supplier','barangMasuk'));
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
            'id_stok' => 'required',
            // 'jenis' => 'required',
            'jml_barang' => 'required',
            // 'satuan' => 'required',
            'tgl_masuk' => 'required',
            'id_supplier' => 'required',
        ]);

        BarangMasuk::where('id_masuk', $barangMasuk->id_masuk)
                ->update([
                    'id_stok' => $request->id_stok,
                    // 'jenis' => $request->jenis,
                    'jml_barang' => $request->jml_barang,
                    // 'satuan' => $request->satuan,
                    'tgl_masuk' => $request->tgl_masuk,
                    'id_supplier' => $request->id_supplier,
                ]);
        
        $stokBarang = StokBarang::findOrFail($request->id_stok);
        $stokBarang->jml_barang += $request->jml_barang;
        $stokBarang->save();

        return redirect('/BarangMasuk')->with('success', 'Data Barang Masuk Berhasil Diupdate!');
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
        return redirect('/BarangMasuk')->with('success', 'Data Barang Masuk Berhasil Dihapus!');
    }

    public function cetakBarangMasuk(){
        $barangMasuk = BarangMasuk::get();
        return view('transaksi.BarangMasuk.cetak', compact('barangMasuk'));
    }
}
