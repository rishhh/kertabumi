<?php

namespace App\Http\Controllers;

use App\Kemeja;
use App\Kain;
use App\User;
use App\Customer;
use App\Pesan;
use DataTables;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoAuthController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeContact(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required',
            'email'=>'required',
            'telp'=>'required',
            'pesan'=>'required'
            ]);
        $data = $request->all();
        Pesan::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'telp' => $data['telp'],
            'pesan' => $data['pesan'],
        ]);
        return redirect()->back()->with('message', 'Pesan Terkirim');
    }
    public function jsBajuBatik()
    {
        $kemeja = Kemeja::all();
        return Datatables::of($kemeja);
    }
    public function jsStokBajuBatik()
    {
        $kemeja = Kemeja::all();
        return Datatables::of($kemeja);
    }
    public function jsKain()
    {
        $kain = Kain::all();
        return Datatables::of($kain);
    }
    public function jsStokKain()
    {
        $kain = Kain::all();
        return Datatables::of($kain);
    }
    public function jsUser()
    {
        $user = User::all();
        return Datatables::of($user);
    }
    public function jsCustomer()
    {
        $customer = Customer::all();
        return Datatables::of($customer);
    }
    public function jsPesan()
    {
        return Pesan::all();
    }
}
