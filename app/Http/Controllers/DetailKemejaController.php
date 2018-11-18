<?php

namespace App\Http\Controllers;

use App\Kemeja;
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
        return view('backend.stokbajubatik.index', $kemeja);
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
        //
    }

    public function json()
    {
        $kemeja = Kemeja::all();

        return Datatables::of($kemeja)
            ->addColumn('action', function($kemeja){
                return 'S : <span>'.$kemeja->uk_s.' </span><a href="bajubatik/'.$kemeja->id.'/edit" class="fa btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i></a> '.
                    'M : <span>'.$kemeja->uk_m.' </span><a href="bajubatik/'.$kemeja->id.'/edit" class="fa btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i></a> '.
                    'L : <span>'.$kemeja->uk_l.' </span><a href="bajubatik/'.$kemeja->id.'/edit" class="fa btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i></a> '.
                    'XL : <span>'.$kemeja->uk_xl.' </span><a href="bajubatik/'.$kemeja->id.'/edit" class="fa btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i></a> ';
            })->make(true);
    }
}
