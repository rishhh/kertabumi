@extends('admin')
@section('content')

<h1 align="center">Edit Data Admin</h1>
{!! Html::ul($errors->all()) !!}
{!! Form::model($adminstok, array('url'=>'backend/user/'.$adminstok->id,'method'=>'patch')) !!}
@csrf
<table class="table table-bordered">
	<tr><td>Username</td><td>{!! Form::text('username',null ,['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Email</td><td>{!! Form::text('email',null ,['class'=>'form-control', 'required']) !!}</td></tr>	
	<tr><td>Level</td><td>{!! Form::select('level', ['0'=>'Super Admin', '1'=>'Admin Stok']) !!}</td></tr>
	<tr><td>Password</td><td>{!! Form::password('password', ['class'=>'form-control', 'required']) !!}</td></tr>
	<tr align="center">
		<td colspan="2">
			{!! Form::submit('Update Data',['class'=>'btn btn-success btn-sm']) !!}
			{!! link_to('backend/user','Batal',['class'=>'btn btn-warning btn-sm']) !!}
		</td>
	</tr>
</table>
{!! Form::close() !!}

@stop