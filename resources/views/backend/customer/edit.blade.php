@extends('admin')
@section('content')

<h1 align="center">Edit Data Pelanggan</h1>
{!! Html::ul($errors->all()) !!}
{!! Form::model($customer, array('url'=>'backend/customer/'.$customer->id,'method'=>'patch')) !!}
@csrf
<table class="table table-bordered">
	<tr><td>Nama</td><td>{!! Form::text('nama',null,['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Email</td><td>{!! Form::text('email',null,['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>No Telp</td><td>{!! Form::text('telp',null,['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Jenis Kelamin</td><td>{!! Form::radio('jk', '0') !!} Laki - laki {!! Form::radio('jk', '1') !!} Perempuan</td></tr>
	<tr><td>Alamat</td><td>{!! Form::textarea('alamat',null,['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Kode Pos</td><td>{!! Form::text('kodepos',null,['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Password</td><td>{!! Form::password('password',['class'=>'form-control', 'required']) !!}</td></tr>
	<tr align="center">
		<td colspan="2">
			{!! Form::submit('Update Data',['class'=>'btn btn-success btn-sm']) !!}
			{!! link_to('backend/customer','Batal',['class'=>'btn btn-warning btn-sm']) !!}
		</td>
	</tr>
</table>
{!! Form::close() !!}

@stop