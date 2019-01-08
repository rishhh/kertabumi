<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
	protected $fillable = ['user_id','keranjang_id','noresi','kodeunik','total_bayar','status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
