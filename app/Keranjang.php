<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $fillable = ['customer_id','kemeja_id','nama_kemeja','uk','harga','qty','total_harga','status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}



