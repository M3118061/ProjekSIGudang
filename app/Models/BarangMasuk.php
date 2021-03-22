<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_masuk';
    protected $fillable = ['jenis','jml_barang','satuan','tgl_masuk','id_barang','id_supplier'];

    public function dataBarang()
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

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }
}
