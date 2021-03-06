<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama','email','telp','jk','alamat','kodepos','password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Method One To Many Customers -> Keranjang
     */
    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }
        public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
