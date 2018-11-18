<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKain extends Model
{
    protected $fillable = ['id_kain','tipe','awal','masuk','keluar','akhir'];
}
