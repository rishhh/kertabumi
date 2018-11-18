<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerhomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        return view('frontend.home');
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function testimoni()
    {
        return view('frontend.testimoni');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function bs()
    {
        return view('frontend.bestseller');
    }
    public function np()
    {
        return view('frontend.newproduct');
    }
    public function ap()
    {
        return view('frontend.allproduct');
    }
    public function profil()
    {
        return view('frontend.profil');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer['customer'] = Customer::find($id);
        return view('frontend.profil', $customer);
    }
}