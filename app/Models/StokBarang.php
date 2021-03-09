<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBarang extends Model
{
    use HasFactory;
    protected $table = 'stok_barang';
    protected $primaryKey = 'id_stok';

    public function barang()
    {
        return $this->belongsTo(DataBarang::class, 'id_barang');
    }
}
