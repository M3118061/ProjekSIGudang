<?php

namespace App\Http\Controllers;

use App\Models\StokBarang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        $stokBarang = StokBarang::all();
        return view('transaksi.index',compact('transaksi','stokBarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stokBarang = StokBarang::all();

        return view('transaksi.create', compact('stokBarang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $key1 = 0;
        $key2 = 0;
        $key3 = 0;
        $key4 = 0;
        if($request->input('tipe') == 'jual'){
            foreach ($request as $stokBarang){
                $stokBarang = Transaksi::where('id_stok',$request->input('id_stok.'.$key1++));
                if($stokBarang == NULL){
                    return redirect(route('transaksi.index'))->with('error','Ada Kesalahan !, Barang mungkin belum ada');
                }
                $request->validate([
                    'id_transaksi' => 'required',
                    'id_stok' => 'required',
                    'jml_barang' => 'required|numeric',
                    'tgl_transaksi' => 'required|date',
                    'tipe' => 'required',
                ]);
                Transaksi::create($request->all());
        
                $stokBarang = StokBarang::findOrFail($request->id_barang);
                $stokBarang->jml_barang -= $request->jml_barang;
                $stokBarang->save();
            }
        } elseif($request->input('tipe') == 'beli'){
            foreach ($request->input('id_stok') as $row){
                $stokBarang = Transaksi::where('id_stok',$request->input('id_stok.'.$key1++));
                if($stokBarang == NULL){
                    return redirect(route('transaksi.index'))->with('error','Ada Kesalahan !, Barang mungkin belum ada');
                }
                $request->validate([
                    'id_transaksi' => 'required',
                    'id_stok' => 'required',
                    'jml_barang' => 'required|numeric',
                    'tgl_transaksi' => 'required|date',
                    'tipe' => 'required',
                ]);
            }
        } else {
            return redirect(route('transaksi.index'));
        }
        //dd($charges);
        Transaksi::insert($request);
        return redirect(route('transaksi.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
