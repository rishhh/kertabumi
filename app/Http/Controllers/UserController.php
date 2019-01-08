<?php

namespace App\Http\Controllers;

use App\User;
use App\Adminstok;
use DataTables;
use Input;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserController extends Controller
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
        $adminstok['adminstok'] = Adminstok::all();        
        return view('backend.user.index', $adminstok);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
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
            'username'=>'required',
            'email'=>'required',
            'level'=>'required',
            'password'=>'required'
            ]);
        $data = $request->all();
        Adminstok::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'level' => $data['level'],
            'password' => Hash::make($data['password']),
        ]);
        switch ($data['level']) {
            case '0':
                User::create([
                'username' => $data['username'],
                'email' => $data['email'],
                'level' => $data['level'],
                'password' => Hash::make($data['password']),
                ]);
                return Redirect('backend/user');
                break;
            
            default:
                return Redirect('backend/user');
                break;
        }
        // return Redirect('backend/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user['user'] = User::find($id);
        return view('backend.user.show', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adminstok['adminstok'] = Adminstok::find($id);
        return view('backend.user.edit', $adminstok);
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
            'username'=>'required',
            'email'=>'required',
            'level'=>'required',
            'password'=>'required'
            ]);
        $data = $request->all();
        $adminstok = Adminstok::find($id);
        $adminstok->update([
            'username' => $data['username'],
            'email' => $data['email'],
            'level' => $data['level'],
            'password' => Hash::make($data['password']),
        ]);
        switch ($data['level']) {
            case '0':
                User::create([
                'username' => $data['username'],
                'email' => $data['email'],
                'level' => $data['level'],
                'password' => Hash::make($data['password']),
                ]);
                return Redirect('backend/user');
                break;
            
            default:
                return Redirect('backend/user');
                break;
        }
        // return Redirect('backend/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Adminstok::find($id);
        $email = $user->email;
        $result =  User::where("email",$email)->get();

        if (!$result->isEmpty()){

            $user = Adminstok::find($id);
            $email = $user->email;

            $asid['id'] = User::where("email",$email)->first();
            User::find($asid['id']->id)->delete();
            
            $user->delete();
            return Redirect('backend/user');

        }else{

            $adminstok = Adminstok::find($id);

            $adminstok->delete();
            return Redirect('backend/user');
        } 
    }

    public function json()
    {
        $user = Adminstok::all();

        return Datatables::of($user)
            ->addColumn('level',function($user){
                switch ($user->level) {
                    case '0': $level = 'Super Admin'; break;
                    case '1': $level = 'Admin Stok'; break;
                };
                return $level;
            })
            ->addColumn('action', function($user){
                return '<a href="user/'.$user->id.'/edit" class="fa btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a> '.
                    '<a href="user" onclick="deleteData('.$user->id.')" class="fa btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
            ->addIndexColumn()
            ->make(true);
    }
}
