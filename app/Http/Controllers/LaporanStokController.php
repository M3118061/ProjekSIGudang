<?php

namespace App\Http\Controllers;

use App\Models\LaporanStok;
use App\Models\StokBarang;
use Illuminate\Http\Request;

class LaporanStokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laporan.stokbarang.index');
    }

    public function CetakStokPertanggal($tglawal, $tglakhir)
    {
        // dd("tanggal awal : ".$tglawal, "tanggal akhir : ".$tglakhir);
        $stokBarang = StokBarang::with('dataBarang')->whereBetween('tgl_exp',[$tglawal, $tglakhir])->get();
        return view('laporan.stokbarang.cetak', compact('stokBarang'));
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
     * @param  \App\Models\LaporanStok  $laporanStok
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanStok $laporanStok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanStok  $laporanStok
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanStok $laporanStok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaporanStok  $laporanStok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanStok $laporanStok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanStok  $laporanStok
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanStok $laporanStok)
    {
        //
    }
}
