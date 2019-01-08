<?php

namespace App\Http\Controllers;

use App\Customer;
use DataTables;
use Input;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class customerController extends Controller
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
        $customer['customer'] = Customer::all();
        return view('backend.customer.index', $customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customer.create');
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
            'jk'=>'required',
            'alamat'=>'required',
            'kodepos'=>'required'
            ]);
        $data = $request->all();
        Customer::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'telp' => $data['telp'],
            'jk' => $data['jk'],
            'alamat' => $data['alamat'],
            'kodepos' => $data['kodepos'],
            'password' => Hash::make($data['password']),
        ]);
        return Redirect('backend/customer');
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
        $customer['customer'] = Customer::find($id);
        return view('backend.customer.edit', $customer);
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
            'nama'=>'required',
            'email'=>'required',
            'telp'=>'required',
            'jk'=>'required',
            'alamat'=>'required',
            'kodepos'=>'required'
            ]);
        $data = $request->all();
        $customer = Customer::find($id);
        $customer->update([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'telp' => $data['telp'],
            'jk' => $data['jk'],
            'alamat' => $data['alamat'],
            'kodepos' => $data['kodepos'],
            'password' => Hash::make($data['password']),
        ]);
        return Redirect('backend/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return Redirect('backend/customer');
    }

    public function json()
    {
        $customer = Customer::all();

        return Datatables::of($customer)
            ->addColumn('jk',function($customer){
                switch ($customer->jk) {
                    case '0': $jk = 'Laki - laki'; break;
                    case '1': $jk = 'Perempuan'; break;
                };
                return $jk;
            })
            ->addColumn('action', function($customer){
                return '<a href="customer/'.$customer->id.'/edit" class="fa btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a> '.
                    '<a href="customer" onclick="deleteData('.$customer->id.')" class="fa btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
            ->addIndexColumn()
            ->make(true);
    }
}
