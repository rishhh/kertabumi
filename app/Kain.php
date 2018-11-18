<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kain extends Model
{
    protected $fillable = ['tipe','nama_kain','supplier','stok','file'];
}
