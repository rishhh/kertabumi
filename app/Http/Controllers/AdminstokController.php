<?php

namespace App\Http\Controllers;

use App\Adminstok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminstokController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminstok.index');
    }
    
    public function store(request $request)
    {
        if ( $request->hasFile('file')) {
            $filename = $request->file->getClientOriginalName();
            return $request->file->storeAs('public',$filename);
        }else{
            return 'No selected file';
        }
    }
    
    public function show()
    {
        if (Storage::move('public/kmj.jpg', 'kmj.jpg')) {
             return "moved";
         }
    }

    public function profilshow($id)
    {
        $adminstok['adminstok'] = Adminstok::find($id);
        return view('adminstok.profil', $adminstok);
    }

    public function profiledit($id)
    {
        $adminstok['adminstok'] = Adminstok::find($id);
        return view('adminstok.profiledit', $adminstok);
    }

    public function profilupdate(Request $request, $id)
    {
        $this->validate($request,[
            'username'=>'required|string|max:255',
            'email'=>'required|string|email|max:255'
            ]);
        $data = $request->all();
        $adminstok = Adminstok::find($id);
        $adminstok->update([
            'username' => $data['username'],
            'email' => $data['email'],
        ]);
        return Redirect('adminstok/profil/'.$id)->with('message', 'Profil Kamu Sudah Diperbarui');
    }
}