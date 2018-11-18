@extends('admin')
@section('content')

<h1 align="center">Edit Data Kain</h1>
{!! Html::ul($errors->all()) !!}
{!! Form::model($kain, array('url'=>'backend/kain/'.$kain->id, 'files'=>'true', 'method'=>'patch')) !!}
<table class="table table-bordered">
	<tr><td>Tipe</td><td>{!! Form::select('tipe', ['0'=>'Batik Tulis', '1'=>'Batik Printing', '2' => 'Polos']) !!}</td></tr>
	<tr><td>Nama Kain</td><td>{!! Form::text('nama_kain',null,['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Supplier</td><td>{!! Form::select('supplier', ['0'=>'Sekarniti', '1'=>'SAB', '2'=>'Lainya']) !!}</td></tr>
	<tr><td>Stok</td><td>{!! Form::text('stok',null,['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>File</td><td>{!! Form::file('file') !!}</td></tr>
	<tr align="center">
		<td colspan="2">
			{!! Form::submit('Update Data',['class'=>'btn btn-success btn-sm']) !!}
			{!! link_to('backend/kain','Batal',['class'=>'btn btn-warning btn-sm']) !!}
		</td>
	</tr>
</table>
{!! Form::close() !!}

@stop