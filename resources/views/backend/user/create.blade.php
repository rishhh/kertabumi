@extends('admin')
@section('content')

<h1 align="center">Tambah Admin</h1>
{!! Form::open(array('url'=>'backend/user')) !!}
@csrf
<table class="table table-bordered">
	<tr><td>Username</td><td>{!! Form::text('username','',['class'=>'form-control', 'required','autofocus']) !!}</td></tr>
	<tr><td>Email</td><td>{!! Form::text('email','',['class'=>'form-control', 'required']) !!}</td></tr>	
	<tr><td>Level</td><td>{!! Form::select('level', ['0'=>'Super Admin', '1'=>'Admin Stok']) !!}</td></tr>
	<tr><td>Password</td><td>{!! Form::password('password', ['class'=>'form-control', 'required']) !!}</td></tr>
	<tr>
		<td colspan="2" align="center">
			{!! Form::submit('Simpan Data',['class'=>'btn btn-success btn-sm']) !!}
			{!! link_to('backend/user','Batal',['class'=>'btn btn-warning btn-sm']) !!}
		</td>
	</tr>
</table>
{!! Form::close() !!}

@stop