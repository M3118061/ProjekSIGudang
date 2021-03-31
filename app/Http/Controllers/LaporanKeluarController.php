<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\LaporanKeluar;
use Illuminate\Http\Request;

class LaporanKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laporan.barangkeluar.index');
    }

    public function CetakKeluarPertanggal($tglawal, $tglakhir)
    {
        // dd("tanggal awal : ".$tglawal, "tanggal akhir : ".$tglakhir);
        $barangKeluar = BarangKeluar::get()->whereBetween('tgl_keluar',[$tglawal, $tglakhir]);
        return view('laporan.barangkeluar.cetak', compact('barangKeluar'));
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
     * @param  \App\Models\LaporanKeluar  $laporanKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanKeluar $laporanKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanKeluar  $laporanKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanKeluar $laporanKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaporanKeluar  $laporanKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanKeluar $laporanKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanKeluar  $laporanKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanKeluar $laporanKeluar)
    {
        //
    }
}
