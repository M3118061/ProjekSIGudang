<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['name','jk','alamat','no_telp','email','password','role'];
    // protected $primaryKey = 'id_pegawai';
}
