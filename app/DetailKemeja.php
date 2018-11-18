<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKemeja extends Model
{
    protected $fillable = ['id_kemeja','ukuran','awal','masuk','keluar','akhir'];
}
