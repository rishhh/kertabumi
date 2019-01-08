@extends('admin')
@section('content')

<h1 align="center">Detail Pesan</h1>
<br>
<br>
	<div>
        <div class="col-md-4"></div>
        <div class="col-md-4" align="center">
        	Dari : 
        	<b>{{ $pesan->nama }}</b><br>
        	Email : 
        	<b>{{ $pesan->email }}</b><br>
        	Nomer Telpon : 
        	<b>{{ $pesan->telp }}</b><br>
        	Isi Pesan : <br>
        	<b>{{ $pesan->pesan }}</b><br><br>
        	{!! link_to('backend/pesan',' Kembali',['class'=>'fa fa-backward btn btn-warning btn-sm']) !!}
        </div>
        <div class="col-md-4"></div>
    </div>

@stop