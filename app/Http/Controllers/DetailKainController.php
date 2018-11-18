<?php

namespace App\Http\Controllers;

use App\Kain;
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
        return view('backend.stokkain.index', $kain);
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
        $kain = Kain::find($id);
        return $kain;
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
        //
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
                return '<a onclick="editForm('.$kain->id.')" class="fa btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"> Edit</i></a> ';
            })->make(true);
    }
}
