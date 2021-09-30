<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $table = 'table_target';
    protected $fillable = ['jml_target', 'time', 'produk'];
    use HasFactory;
}
