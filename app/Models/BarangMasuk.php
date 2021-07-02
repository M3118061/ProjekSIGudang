<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_masuk';
    protected $fillable = ['jml_barang','tgl_masuk','id_stok','id_supplier'];

    public function stokBarang()
    {
        return $this->belongsTo(StokBarang::class, 'id_stok');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }
}
