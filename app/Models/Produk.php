<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'kelola_produk';
    protected $guarded = [];

    public function nama()
    {
        return $this->belongsTo('App\Models\Nama', 'id_nama_produk');
    }

    public function jenis()
    {
         return $this->belongsTo('App\Models\Jenis', 'id_jenis');
    }
    use HasFactory;
}
