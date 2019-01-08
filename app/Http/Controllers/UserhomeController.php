<?php

namespace App\Http\Controllers;

use App\User;
use App\Testimoni;
use DataTables;
use Storage;
use Illuminate\Http\Request;

class UserhomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.index');
    }

    public function indextesti()
    {
        return view('backend.testimoni.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'file'=>'required'
            ]);
        if ( $request->hasFile('file')) {
            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('public/testimoni',$filename);

            $testimoni = new Testimoni();
            $testimoni->file = $filename;
            $testimoni->save();
            return Redirect('backend/testimoni');
        }else{
            return view('backend/testimoni/create');
        }
    }

    public function destroy($id)
    {
        $oldfilename = Testimoni::find($id)['file'];
        Storage::delete('public/testimoni/'.$oldfilename);
        $testimoni = Testimoni::find($id);
        $testimoni->delete();
        return Redirect('backend/testimoni');
    }

    public function json()
    {
        $testimoni = Testimoni::all();

        return Datatables::of($testimoni)
            ->addColumn('foto',function($testimoni){
                return '<img src="'.asset('storage/testimoni').'/'.$testimoni->file.'" width="75px" height="75px"/>';
            })
            ->addColumn('action', function($testimoni){
                return '<a href="testimoni" onclick="deleteData('.$testimoni->id.')" class="fa btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
            ->addIndexColumn()
            ->rawColumns(['foto', 'action'])
            ->make(true);
    }
}
