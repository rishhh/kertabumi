@extends('admin')
@section('content')

<h1 align="center">Tambah Data Baju</h1>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>File foto belum dipilih...</strong>
    </div>
@endif
{!! Form::open(array('url'=>'backend/bajubatik', 'files'=>'true')) !!}
<table class="table table-bordered">
	<tr><td>Nama Baju</td><td>{!! Form::text('nama_kemeja','',['class'=>'form-control', 'required', 'autofocus']) !!}</td></tr>
	<tr><td>Harga</td><td>{!! Form::text('harga','',['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Kategori</td><td>{!! Form::select('kategori', ['0'=>'All Product', '1'=>'Best Seller', '2' => 'New Product']) !!}</td></tr>
	<tr><td>Uk. S</td><td>{!! Form::text('uk_s','',['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Uk. M</td><td>{!! Form::text('uk_m','',['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Uk. L</td><td>{!! Form::text('uk_l','',['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Uk. XL</td><td>{!! Form::text('uk_xl','',['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Bahan</td><td>{!! Form::text('bahan','',['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Keterangan</td><td>{!! Form::textarea('keterangan','',['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>File</td><td>{!! Form::file('file') !!}</td></tr>
	<tr>
		<td colspan="2" align="center">
			{!! Form::submit('Simpan Data',['class'=>'btn btn-success btn-sm']) !!}
			{!! link_to('backend/bajubatik','Batal',['class'=>'btn btn-warning btn-sm']) !!}
		</td>
	</tr>
</table>
{!! Form::close() !!}

@stop