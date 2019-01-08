<?php

namespace App\Http\Controllers;

use App\Keranjang;
use DataTables;
use Illuminate\Http\Request;

class KeranjangController extends Controller
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
        $keranjang['keranjang'] = Keranjang::all();        
        return view('backend.keranjang.index', $keranjang);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keranjang = Keranjang::find($id);
        $keranjang->delete();
    }

     public function json()
    {
        $keranjang = Keranjang::all();

        return Datatables::of($keranjang)
            ->addColumn('status', function($keranjang){
                switch ($keranjang->status) {
                    case '0': $status = '<b>Belum Dibayar</b>'; break;
                    case '1': $status = '<b>Dibayar</b>'; break;                
                };
                return $status;
            })
            ->addColumn('action', function($keranjang){
                return '<a href="keranjang" onclick="deleteData('.$keranjang->id.')" class="fa btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
            ->addIndexColumn()
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
}
