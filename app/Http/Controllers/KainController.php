<?php

namespace App\Http\Controllers;

use App\Kain;
use DataTables;
use Input;
use Redirect;
use Storage;
use Illuminate\Http\Request;

class KainController extends Controller
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
        $kain['kain'] = Kain::all();
        return view('backend.kain.index', $kain);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.kain.create');
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
            'tipe'=>'required',
            'nama_kain'=>'required|string|max:255|unique:kains',
            'supplier'=>'required',
            'stok'=>'required|integer',
            'file'=>'required'
            ]);
        if ( $request->hasFile('file')) {
            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('public/kain',$filename);

            $kain = new Kain();
            $kain->tipe = $request->tipe;
            $kain->nama_kain = $request->nama_kain;
            $kain->supplier = $request->supplier;
            $kain->stok = $request->stok;
            $kain->file = $filename;
            $kain->save();
            return Redirect('backend/kain');
        }else{
            return view('backend/kain/create');
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
        $kain['kain'] = Kain::find($id);
        return view('backend.kain.show', $kain);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kain['kain'] = Kain::find($id);
        return view('backend.kain.edit', $kain);
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
            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('public/kain',$filename);
            $oldfilename = Kain::find($id)['file'];
            Storage::delete('public/kain/'.$oldfilename);

            $kain = Kain::find($id);
            $kain->tipe = $request->tipe;
            $kain->nama_kain = $request->nama_kain;
            $kain->supplier = $request->supplier;
            $kain->stok = $request->stok;
            $kain->file = $filename;
            $kain->update();
            return Redirect('backend/kain');
        }else{
            $oldfilename = Kain::find($id)['file'];
            $kain = Kain::find($id);
            $kain->tipe = $request->tipe;
            $kain->nama_kain = $request->nama_kain;
            $kain->supplier = $request->supplier;
            $kain->stok = $request->stok;
            $kain->file = $oldfilename;
            $kain->update();
            return Redirect('backend/kain');
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
        $oldfilename = Kain::find($id)['file'];
        Storage::delete('public/kain/'.$oldfilename);
        $kain = Kain::find($id);
        $kain->delete();
        return Redirect('backend/kain');
    }

    public function json()
    {
        $kain = Kain::all();

        return Datatables::of($kain)
            ->addColumn('tipe',function($kain){
                switch ($kain->tipe) {
                    case '0': $tipe = 'Batik Tulis'; break;
                    case '1': $tipe = 'Batik Printing'; break;
                    case '2': $tipe = 'Kain Polos'; break;
                };
                return $tipe;
            })
            ->addColumn('action', function($kain){
                return '<a href="kain/'.$kain->id.'" class="fa btn btn-default btn-sm"><i class="glyphicon glyphicon-search"></i> Detail</a> '.
                    '<a href="kain/'.$kain->id.'/edit" class="fa btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a> '.
                    '<a href="kain" onclick="deleteData('.$kain->id.')" class="fa btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
            ->addIndexColumn()
            ->make(true);
    }
}
