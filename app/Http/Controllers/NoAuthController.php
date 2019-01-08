<?php

namespace App\Http\Controllers;

use App\Kemeja;
use App\Kain;
use App\User;
use App\Customer;
use App\Pesan;
use App\Testimoni;
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

    public function show($id)
    {
        $kemeja['kemeja'] = Kemeja::find($id);
        return view('frontend.detailproduct', $kemeja);
    }

    public function testimoni()
    {
        $testimoni['testimoni'] = Testimoni::all();
        return view('frontend.testimoni', $testimoni);
    }
}
