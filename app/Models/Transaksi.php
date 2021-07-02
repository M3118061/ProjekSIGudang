<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['id_transaksi','id_stok','tgl_transaksi','jml_barang','tipe'];

    public function stokbarang()
    {
        return $this->belongsTo(StokBarang::class, 'id_stok');
    }
}
