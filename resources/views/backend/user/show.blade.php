@extends('admin')
@section('content')

<h1 align="center">Profil User</h1>
<br>
<br>
	<div>
        <div class="col-md-4"></div>
        <div class="col-md-4" align="center">
        	Username : 
        	<b>{{ $user->username }}</b><br>
        	Email : 
        	<b>{{ $user->email }}</b><br>
        	Tipe : 
        	<b>@switch($user->tipe) @case(0) Super Admin @break @case(1) Admin Stok @break @endswitch</b><br>
        	<br><br>
        	{!! link_to('backend','Kembali',['class'=>'btn btn-warning btn-sm']) !!}
        </div>
        <div class="col-md-4"></div>
    </div>

@stop