<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kemeja extends Model
{
    protected $fillable = ['nama_kemeja','harga','kategori','uk_s','uk_m','uk_l','uk_xl','bahan','keterangan','file'];


}
