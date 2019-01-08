<?php

namespace App\Http\Controllers;

use App\Kain;
use App\DetailKain;
use DataTables;
use Input;
use Redirect;
use Illuminate\Http\Request;

class DetailKainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:adminstok');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kain['kain'] = Kain::all();
        return view('adminstok.stokkain.index', $kain);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Kain::findOrFail($id);
        return view('adminstok.stokkain.form', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'tipe'=>'required',
            'nama_kain'=>'required|string|max:255',
            'supplier'=>'required',
            'stok'=>'required|integer'
            ]);
        if ( $request->hasFile('file')) {
            $model = Kain::findOrFail($id);
            return $model;
        }else{
            $oldfilename = Kain::find($id)['file'];
            $kain = Kain::find($id);

            $stokAwal = $request->stok;
            $stokMasuk = $request->masuk;
            $stokKeluar = $request->keluar;
            $stokAkhir = $stokAwal + $stokMasuk - $stokKeluar;

            $kain->tipe = $request->tipe;
            $kain->nama_kain = $request->nama_kain;
            $kain->supplier = $request->supplier;
            $kain->stok = $stokAkhir;
            $kain->file = $oldfilename;
            $kain->update();

            $detailKain = new DetailKain();
            $detailKain->id_kain = $id;
            $detailKain->tipe = $kain->tipe;
            $detailKain->awal = $stokAwal;
            $detailKain->masuk = $stokMasuk;
            $detailKain->keluar = $stokKeluar;
            $detailKain->akhir = $stokAkhir;
            $detailKain->save();

            $model = Kain::findOrFail($id);
            return $model;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dataTable()
    {
        $model = Kain::all();
        return DataTables::of($model)
            ->addColumn('tipe',function($model){
                switch ($model->tipe) {
                    case '0': $tipe = 'Batik Tulis'; break;
                    case '1': $tipe = 'Batik Printing'; break;
                    case '2': $tipe = 'Kain Polos'; break;
                };
                return $tipe;
            })
            ->addColumn('action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_edit' => route('stokkain.edit', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
