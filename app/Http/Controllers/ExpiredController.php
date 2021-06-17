<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\StokBarang;

class ExpiredController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkRole']);
    }

    public function product_expiry_check(Request $request){
        $useInterval    = $request->interval;
        $result         = [];

        if(empty($useInterval) || $useInterval == false){
            $stokBarang = DB::table('stok_barang')->where("tgl_exp", "<", date("Y-m-d"));
            if(Auth::user()->role != 'admin'){
                $stokBarang = $stokBarang->where("stok_barang.id_barang", Auth::user()->id);
            }
        } else {
            $interval = Auth::user()->exp_reminder;
            $stokBarang = DB::table('stok_barang')->whereBetween("tgl_exp", [date("Y-m-d"), date("Y-m-d", strtotime(date("Y-m-d").' +'.$interval.' day'))]);
            if(Auth::user()->role != 'admin'){
                $stokBarang = $stokBarang->where("stok_barang.id_barang", Auth::user()->id);
            }
        }

        if(Auth::user()->role != 'admin'){
            $stokBarang = $stokBarang->where("stok_barang.id_barang", Auth::user()->id);
        }

        $stokBarang   = $stokBarang->get();
        
        $result = ["count" => $stokBarang->count()];

        return response()->json($result);
    }

    public function products(Request $request){
        if ($request->ajax()) {
            $stokBarang = DB::table('stok_barang')
                                ->leftJoin('data_barang', 'stok_barang.id_barang', 'data_barang.id_barang')
                                ->select('stok_barang.*', 'data_barang.nama_barang');

            if($request->status == 1){
                $stokBarang = $stokBarang->where("tgl_exp", "<", date("Y-m-d"));
                if(Auth::user()->role != 'admin'){
                    $stokBarang = $stokBarang->where("stok_barang.id_barang", Auth::user()->id);
                }
            } else if($request->status == 2){
                $interval = Auth::user()->exp_reminder;
                $stokBarang = $stokBarang->whereBetween("tgl_exp", [date("Y-m-d"), date("Y-m-d", strtotime(date("Y-m-d").' +'.$interval.' day'))]);
                if(Auth::user()->role != 'admin'){
                    $stokBarang = $stokBarang->where("stok_barang.id_barang", Auth::user()->id);
                }
            } else {
                if(Auth::user()->role != 'admin'){
                    $stokBarang = $stokBarang->where("stok_barang.id_barang", Auth::user()->id);
                }
            }
            
            $data = $stokBarang->get();

            foreach($data as $d){
                $d->tgl_exp = date("d/m/Y", strtotime($d->tgl_exp));
            }

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }

        return View::make("products");
    }
}
