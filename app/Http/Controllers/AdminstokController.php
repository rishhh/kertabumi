<?php

namespace App\Http\Controllers;

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
        return view('adminstok');
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
}