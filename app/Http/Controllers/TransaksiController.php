<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Customer;
use App\Keranjang;
use DataTables;
use Redirect;
use Illuminate\Http\Request;

class TransaksiController extends Controller
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
        $transaksi['transaksi'] = Transaksi::all();        
        return view('backend.transaksi.index', $transaksi);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi['transaksi'] = Transaksi::find($id);
        $transaksi['customer'] = Customer::find($transaksi['transaksi']['customer_id']);
        $transaksi['keranjang'] = Keranjang::where('customer_id', $transaksi['transaksi']['customer_id'])->where('kodeunik', $transaksi['transaksi']['kodeunik'])->get();
        return view('backend.transaksi.show', $transaksi);
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
    }
    public function changestatus($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->status = $transaksi->status+1;
        $transaksi->update(); 

        return Redirect('backend/transaksi');
    }
    public function json()
    {
        $transaksi = Transaksi::all();

        return Datatables::of($transaksi)
            ->addColumn('status', function($transaksi){
                switch ($transaksi->status) {
                    case '0': $status = '<b>Menunggu Pembayaran</b> '.'<a href="transaksi/'.$transaksi->id.'/changestatus" class="fa btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i> >>Sudah Dibayar </a>';
                        break;
                    case '1': $status = '<b>Sudah Dibayar</b> '.'<a href="transaksi/'.$transaksi->id.'/changestatus" class="fa btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i> >>Pesanan Diproses</a>';
                        break;
                    case '2': $status = '<b>Pesanan Diproses</b> '.'<a href="transaksi/'.$transaksi->id.'/changestatus" class="fa btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i> >>Pesanan Dikirim</a>';
                        break;
                    case '3': $status = '<b>Pesanan Dikirim</b>'; break;
                    case '4': $status = '<b>Selesai</b>'; break;                
                };
                return $status;
            })
            ->addColumn('action', function($transaksi){
                return '<a href="transaksi/'.$transaksi->id.'" class="fa btn btn-default btn-sm"><i class="glyphicon glyphicon-search"></i> Detail</a> '.
                    '<a href="transaksi" onclick="deleteData('.$transaksi->id.')" class="fa btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
            ->addIndexColumn()
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
}
