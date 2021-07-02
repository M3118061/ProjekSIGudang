<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::orderBy('created_at','desc')->paginate(10);
        return view('supplier.index', compact('supplier'));
    }

    public function cari(Request $request){
        $search = $request->get('search');
        $supplier = Supplier::where('nama_supplier','like',"%".$search."%")->paginate(3);
        return view('supplier.index',compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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
            'nama_supplier' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        Supplier::create($request->all());

        return redirect('/supplier')->with('success', 'Data Supplier Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        Supplier::where('id_supplier', $supplier->id_supplier)
                ->update([
                    'nama_supplier' => $request->nama_supplier,
                    'jk' => $request->jk,
                    'alamat' => $request->alamat,
                    'no_telp' => $request->no_telp,
                ]);

        return redirect('/supplier')->with('success', 'Data Supplier Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        Supplier::destroy($supplier->id_supplier);
        return redirect('/supplier')->with('success', 'Data Supplier Berhasil Dihapus!');
    }
}
