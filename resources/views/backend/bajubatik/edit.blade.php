@extends('admin')
@section('content')

<h1 align="center">Edit Data Baju</h1>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>{!! Html::ul($errors->all()) !!}</strong>
    </div>
@endif
{!! Form::model($kemeja, array('url'=>'backend/bajubatik/'.$kemeja->id, 'files'=>'true', 'method'=>'patch')) !!}
<table class="table table-bordered">
	<tr><td>Nama Baju</td><td>{!! Form::text('nama_kemeja',null,['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Harga</td><td>{!! Form::text('harga',null,['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Kategori</td><td>{!! Form::select('kategori', ['0'=>'All Product', '1'=>'Best Seller', '2' =>'New Product']) !!}</td></tr>
	<tr><td>Uk. S</td><td>{!! Form::text('uk_s',null,['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Uk. M</td><td>{!! Form::text('uk_m',null,['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Uk. L</td><td>{!! Form::text('uk_l',null,['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Uk. XL</td><td>{!! Form::text('uk_xl',null,['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Bahan</td><td>{!! Form::text('bahan',null,['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>Keterangan</td><td>{!! Form::textarea('keterangan',null,['class'=>'form-control', 'required']) !!}</td></tr>
	<tr><td>File</td><td>{!! Form::file('file',['value'=>"$kemeja->file"]) !!}{{"$kemeja->file"}}</td></tr>
	<tr align="center">
		<td colspan="2">
			{!! Form::submit('Update Data',['class'=>'btn btn-success btn-sm']) !!}
			{!! link_to('backend/bajubatik','Batal',['class'=>'btn btn-warning btn-sm']) !!}
		</td>
	</tr>
</table>
{!! Form::close() !!}

@stop