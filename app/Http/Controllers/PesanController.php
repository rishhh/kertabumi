<?php

namespace App\Http\Controllers;

use App\Pesan;
use DataTables;
use Input;
use Redirect;
use Illuminate\Http\Request;

class PesanController extends Controller
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
        $pesan['pesan'] = Pesan::all();
        return view('backend.pesan.index', $pesan);
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
        $this->validate($request,[
            'nama'=>'required',
            'email'=>'required',
            'telp'=>'required',
            'pesan'=>'required',
            ]);
        $input = $request->all();
        Customer::create($input);
        return Redirect('backend/pesan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesan['pesan'] = Pesan::find($id);
        return view('backend.pesan.show', $pesan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesan = Pesan::find($id);
        $pesan->delete();
        return Redirect('backend/pesan');
    }

    public function json()
    {
        $pesan = Pesan::all();

        return Datatables::of($pesan)
            ->addColumn('action', function($pesan){
                return '<a href="pesan/'.$pesan->id.'" class="fa btn btn-default btn-sm"><i class="glyphicon glyphicon-search"></i> Detail</a> '.
                    '<a href="pesan" onclick="deleteData('.$pesan->id.')" class="fa btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
            ->addIndexColumn()
            ->make(true);
    }
}
