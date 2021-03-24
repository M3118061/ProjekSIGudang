<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBarang extends Model
{
    use HasFactory;
    protected $table = 'stok_barang';
    protected $primaryKey = 'id_stok';
    protected $fillable = ['id_barang','jenis','jml_barang','satuan','tgl_exp'];

    public function databarang()
    {
        return $this->belongsTo(DataBarang::class, 'id_barang');
    }
    
    public function jenis()
    {
        return $this->belongsTo(JenisBarang::class, 'id_jenis');
    }

    public function satuan()
    {
        return $this->belongsTo(SatuanBarang::class, 'id_satuan');
    }
}
