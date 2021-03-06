@extends('admin')
@section('content')

<h1 align="center">Tambah Data Kain</h1>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>{!! Html::ul($errors->all()) !!}</strong>
    </div>
@endif
{!! Form::open(array('url'=>'backend/kain', 'files'=>'true')) !!}
<table class="table table-bordered">
	<tr><td>Tipe</td><td>{!! Form::select('tipe', ['0'=>'Batik Tulis', '1'=>'Batik Printing', '2' => 'Polos']) !!}</td></tr>
	<tr><td>Nama Kain</td><td>{!! Form::text('nama_kain','',['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Supplier</td><td>{!! Form::select('supplier', ['0'=>'Sekarniti', '1'=>'SAB', '2'=>'Lainya']) !!}</td></tr>
	<tr><td>Stok</td><td>{!! Form::text('stok','',['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>File</td><td>{!! Form::file('file') !!}</td></tr>
	<tr>
		<td colspan="2" align="center">
			{!! Form::submit('Simpan Data',['class'=>'btn btn-success btn-sm']) !!}
			{!! link_to('backend/kain','Batal',['class'=>'btn btn-warning btn-sm']) !!}
		</td>
	</tr>
</table>
{!! Form::close() !!}

@stop