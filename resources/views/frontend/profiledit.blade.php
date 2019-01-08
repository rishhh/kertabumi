@extends('layouts.customer')
@section('content')

<?php 
$thisPage="Profil";
?>
<div class="col-lg-9">
  <dir class="container">
  <h1 align="center">Edit Profil User</h1>
   	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>{!! Html::ul($errors->all()) !!}</strong>
    </div>
	@endif
	{!! Form::model($customer, array('url'=>'home/profil/'.$customer->id,'method'=>'patch')) !!}
	<table class="table table-bordered">
		<tr><td>Nama</td><td>{!! Form::text('nama',null,['class'=>'form-control', 'required']) !!}</td></tr>
		<tr><td>Email</td><td>{!! Form::text('email',null,['class'=>'form-control', 'required']) !!}</td></tr>
		<tr><td>No Telp</td><td>{!! Form::text('telp',null,['class'=>'form-control', 'required']) !!}</td></tr>
		<tr><td>Jenis Kelamin</td><td>{!! Form::radio('jk', '0') !!} Laki - laki {!! Form::radio('jk', '1') !!} Perempuan</td></tr>
		<tr><td>Alamat</td><td>{!! Form::text('alamat',null,['class'=>'form-control', 'required']) !!}</td></tr>
		<tr><td>Kode Pos</td><td>{!! Form::text('kodepos',null,['class'=>'form-control', 'required']) !!}</td></tr>
		<tr align="center">
			<td colspan="2">
				{!! Form::submit('Update Data',['class'=>'btn btn-success btn-sm']) !!}
				<a onClick="history.go(-1)" class="btn btn-warning btn-sm"> Kembali </a>
			</td>
		</tr>
	</table>
	{!! Form::close() !!}
  </dir>

@endsection

	    