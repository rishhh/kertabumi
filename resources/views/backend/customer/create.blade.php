@extends('admin')
@section('content')

<h1 align="center">Tambah Data Pelanggan</h1>
{!! Form::open(array('url'=>'backend/customer')) !!}
<table class="table table-bordered">
	<tr><td>Nama</td><td>{!! Form::text('nama','',['class'=>'form-control', 'required', 'autofocus']) !!}</td></tr>
	<tr><td>Email</td><td>{!! Form::text('email','',['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>No Telp</td><td>{!! Form::text('telp','',['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Jenis Kelamin</td><td>{!! Form::radio('jk', '0') !!} Laki - laki {!! Form::radio('jk', '1') !!} Perempuan</td></tr>
	<tr><td>Alamat</td><td>{!! Form::textarea('alamat','',['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Kode Pos</td><td>{!! Form::text('kodepos','',['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Password</td><td>{!! Form::password('password', ['class'=>'form-control', 'required']) !!}</td></tr>
	<tr>
		<td colspan="2" align="center">
			{!! Form::submit('Simpan Data',['class'=>'btn btn-success btn-sm']) !!}
			{!! link_to('backend/customer','Batal',['class'=>'btn btn-warning btn-sm']) !!}
		</td>
	</tr>
</table>
{!! Form::close() !!}

@stop