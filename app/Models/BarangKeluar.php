<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluar';
    protected $primaryKey = 'id_keluar';
    protected $fillable = ['id_barang','jenis','jml_barang','satuan','tgl_keluar'];

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
}
