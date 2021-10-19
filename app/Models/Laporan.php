<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'kelola_laporan';
    protected $guarded = [];

    public function nama()
    {
        return $this->belongsTo('App\Models\Nama', 'id_nama_produk');
    }
}
