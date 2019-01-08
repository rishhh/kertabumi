<?php

namespace App\Http\Controllers;

use App\Kemeja;
use App\DetailKemeja;
use DataTables;
use Input;
use Redirect;
use Illuminate\Http\Request;

class DetailKemejaController extends Controller
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
        $kemeja['kemeja'] = Kemeja::all();
        return view('adminstok.stokbajubatik.index', $kemeja);
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
        $model = Kemeja::findOrFail($id);
        return view('adminstok.stokbajubatik.form', compact('model'));        
    }

    public function edit2($id)
    {
        $model = Kemeja::findOrFail($id);
        return view('adminstok.stokbajubatik.form2', compact('model'));        
    }

    public function edit3($id)
    {
        $model = Kemeja::findOrFail($id);
        return view('adminstok.stokbajubatik.form3', compact('model'));        
    }

    public function edit4($id)
    {
        $model = Kemeja::findOrFail($id);
        return view('adminstok.stokbajubatik.form4', compact('model'));        
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
            'nama_kemeja'=>'required'
            ]);
        if ( $request->hasFile('file')) {
            $model = Kemeja::findOrFail($id);
            return $model;
        }else{
            $oldfilename = Kemeja::find($id)['file'];
            $kemeja = Kemeja::find($id);

            switch ($request->uk) {
                case 'S':
                    $stokAwal = $request->uk_s;
                    $stokMasuk = $request->masuk;
                    $stokKeluar = $request->keluar;
                    $stokAkhir = $stokAwal + $stokMasuk - $stokKeluar;
                    $kemeja->nama_kemeja = $request->nama_kemeja;
                    $kemeja->harga = $request->harga;
                    $kemeja->kategori = $request->kategori;
                    $kemeja->uk_s = $stokAkhir;
                    $kemeja->uk_m = $request->uk_m;
                    $kemeja->uk_l = $request->uk_l;
                    $kemeja->uk_xl = $request->uk_xl;
                    $kemeja->bahan = $request->bahan;
                    $kemeja->keterangan = $request->keterangan;
                    $kemeja->file = $oldfilename;
                    $kemeja->update();
                    break;

                case 'M':
                    $stokAwal = $request->uk_m;
                    $stokMasuk = $request->masuk;
                    $stokKeluar = $request->keluar;
                    $stokAkhir = $stokAwal + $stokMasuk - $stokKeluar;
                    $kemeja->nama_kemeja = $request->nama_kemeja;
                    $kemeja->harga = $request->harga;
                    $kemeja->kategori = $request->kategori;
                    $kemeja->uk_s = $request->uk_s;
                    $kemeja->uk_m = $stokAkhir;
                    $kemeja->uk_l = $request->uk_l;
                    $kemeja->uk_xl = $request->uk_xl;
                    $kemeja->bahan = $request->bahan;
                    $kemeja->keterangan = $request->keterangan;
                    $kemeja->file = $oldfilename;
                    $kemeja->update();
                    break;
                case 'L':
                    $stokAwal = $request->uk_l;
                    $stokMasuk = $request->masuk;
                    $stokKeluar = $request->keluar;
                    $stokAkhir = $stokAwal + $stokMasuk - $stokKeluar;
                    $kemeja->nama_kemeja = $request->nama_kemeja;
                    $kemeja->harga = $request->harga;
                    $kemeja->kategori = $request->kategori;
                    $kemeja->uk_s = $request->uk_s;
                    $kemeja->uk_m = $request->uk_m;
                    $kemeja->uk_l = $stokAkhir;
                    $kemeja->uk_xl = $request->uk_xl;
                    $kemeja->bahan = $request->bahan;
                    $kemeja->keterangan = $request->keterangan;
                    $kemeja->file = $oldfilename;
                    $kemeja->update();
                    break;
                case 'XL':
                    $stokAwal = $request->uk_xl;
                    $stokMasuk = $request->masuk;
                    $stokKeluar = $request->keluar;
                    $stokAkhir = $stokAwal + $stokMasuk - $stokKeluar;
                    $kemeja->nama_kemeja = $request->nama_kemeja;
                    $kemeja->harga = $request->harga;
                    $kemeja->kategori = $request->kategori;
                    $kemeja->uk_s = $request->uk_s;
                    $kemeja->uk_m = $request->uk_m;
                    $kemeja->uk_l = $request->uk_l;
                    $kemeja->uk_xl = $stokAkhir;
                    $kemeja->bahan = $request->bahan;
                    $kemeja->keterangan = $request->keterangan;
                    $kemeja->file = $oldfilename;
                    $kemeja->update();
                    break;
            }

            $detailKemeja = new DetailKemeja();
            $detailKemeja->id_kemeja = $id;
            $detailKemeja->ukuran = $request->uk;
            $detailKemeja->awal = $stokAwal;
            $detailKemeja->masuk = $stokMasuk;
            $detailKemeja->keluar = $stokKeluar;
            $detailKemeja->akhir = $stokAkhir;
            $detailKemeja->save();

            $model = Kemeja::findOrFail($id);
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
        $model = Kemeja::all();
        return DataTables::of($model)
            ->addColumn('action1', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_edit' => route('stokbajubatik.edit', $model->id)
                ]);
            })
            ->addColumn('action2', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_edit' => route('stokbajubatik.edit2', $model->id)
                ]);
            })
            ->addColumn('action3', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_edit' => route('stokbajubatik.edit3', $model->id)
                ]);
            })
            ->addColumn('action4', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_edit' => route('stokbajubatik.edit4', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action1', 'action2', 'action3', 'action4'])
            ->make(true);
    }
}
