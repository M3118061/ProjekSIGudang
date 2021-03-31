<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\LaporanMasuk;
use Illuminate\Http\Request;

class LaporanMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laporan.barangmasuk.index');
    }

    public function CetakMasukPertanggal($tglawal, $tglakhir)
    {
        // dd("tanggal awal : ".$tglawal, "tanggal akhir : ".$tglakhir);
        $barangMasuk = BarangMasuk::with('supplier')->whereBetween('tgl_masuk',[$tglawal, $tglakhir])->get();
        return view('laporan.barangmasuk.cetak', compact('barangMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporanMasuk  $laporanMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanMasuk $laporanMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanMasuk  $laporanMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanMasuk $laporanMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaporanMasuk  $laporanMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanMasuk $laporanMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanMasuk  $laporanMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanMasuk $laporanMasuk)
    {
        //
    }
}
