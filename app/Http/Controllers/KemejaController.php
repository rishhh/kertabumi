<?php

namespace App\Http\Controllers;

use App\Kemeja;
use DataTables;
use Input;
use Redirect;
use Storage;
use Illuminate\Http\Request;

class KemejaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kemeja['kemeja'] = Kemeja::all();
        return view('backend.bajubatik.index', $kemeja);

        // $kemeja = Kemeja::where('nama_kemeja','=','Lucid')->paginate(2);
        // $data['kemeja'] = $kemeja->setPath('kemeja');
        // return view('backend.bajubatik.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $keyword = $request['keyword'];
        echo $keyword;
    }

    public function create()
    {
        return view('backend.bajubatik.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_kemeja'=>'required',
            'harga'=>'required',
            'uk_s'=>'required',
            'uk_m'=>'required',
            'uk_l'=>'required',
            'uk_xl'=>'required',
            'bahan'=>'required',
            'keterangan'=>'required',
            'file'=>'required'
            ]);
        if ( $request->hasFile('file')) {
            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('public/img',$filename);

            $kemeja = new Kemeja();
            $kemeja->nama_kemeja = $request->nama_kemeja;
            $kemeja->harga = $request->harga;
            $kemeja->kategori = $request->kategori;
            $kemeja->uk_s = $request->uk_s;
            $kemeja->uk_m = $request->uk_m;
            $kemeja->uk_l = $request->uk_l;
            $kemeja->uk_xl = $request->uk_xl;
            $kemeja->bahan = $request->bahan;
            $kemeja->keterangan = $request->keterangan;
            $kemeja->file = $filename;
            $kemeja->save();
            return Redirect('backend/bajubatik');
        }else{
            return view('backend/bajubatik/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kemeja['kemeja'] = Kemeja::find($id);
        return view('backend.bajubatik.show', $kemeja);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kemeja['kemeja'] = Kemeja::find($id);
        return view('backend.bajubatik.edit', $kemeja);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_kemeja'=>'required',
            'harga'=>'required',
            'uk_s'=>'required',
            'uk_m'=>'required',
            'uk_l'=>'required',
            'uk_xl'=>'required',
            'bahan'=>'required',
            'keterangan'=>'required'
            ]);
        if ( $request->hasFile('file')) {
            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('public/img',$filename);
            $oldfilename = Kemeja::find($id)['file'];
            Storage::delete('public/img/'.$oldfilename);

            $kemeja = Kemeja::find($id);
            $kemeja->nama_kemeja = $request->nama_kemeja;
            $kemeja->harga = $request->harga;
            $kemeja->kategori = $request->kategori;
            $kemeja->uk_s = $request->uk_s;
            $kemeja->uk_m = $request->uk_m;
            $kemeja->uk_l = $request->uk_l;
            $kemeja->uk_xl = $request->uk_xl;
            $kemeja->bahan = $request->bahan;
            $kemeja->keterangan = $request->keterangan;
            $kemeja->file = $filename;
            $kemeja->update();
            return Redirect('backend/bajubatik');
        }else{
            $oldfilename = Kemeja::find($id)['file'];
            $kemeja = Kemeja::find($id);
            $kemeja->nama_kemeja = $request->nama_kemeja;
            $kemeja->harga = $request->harga;
            $kemeja->kategori = $request->kategori;
            $kemeja->uk_s = $request->uk_s;
            $kemeja->uk_m = $request->uk_m;
            $kemeja->uk_l = $request->uk_l;
            $kemeja->uk_xl = $request->uk_xl;
            $kemeja->bahan = $request->bahan;
            $kemeja->keterangan = $request->keterangan;
            $kemeja->file = $oldfilename;
            $kemeja->update();
            return Redirect('backend/bajubatik');
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
        $oldfilename = Kemeja::find($id)['file'];
        Storage::delete('public/img/'.$oldfilename);
        $kemeja = Kemeja::find($id);
        $kemeja->delete();
        return Redirect('backend/bajubatik');
    }

    public function json()
    {
        $kemeja = Kemeja::all();

        return Datatables::of($kemeja)
            ->addColumn('action', function($kemeja){
                return '<a href="bajubatik/'.$kemeja->id.'" class="fa btn btn-default btn-sm"><i class="glyphicon glyphicon-search"></i> Detail</a> '.
                    '<a href="bajubatik/'.$kemeja->id.'/edit" class="fa btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a> '.
                    '<a href="bajubatik" onclick="deleteData('.$kemeja->id.')" class="fa btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
            ->addIndexColumn()
            ->make(true);
    }

}
