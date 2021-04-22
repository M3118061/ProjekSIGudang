<?php

namespace App\Http\Controllers;

use App\Models\StokBarang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stokBarang = StokBarang::all();
        $categories = [];
        foreach ($stokBarang as $stok) {
            $categories[] = $stok->jenis;
        }
        // dd(json_encode($categories));

        return view('dashboard',['categories' => $categories]);
    }
}
