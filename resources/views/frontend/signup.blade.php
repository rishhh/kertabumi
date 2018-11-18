@extends('layouts.customer')
@section('content')

<?php 
$thisPage = "SignUp";
?>

<div class="col-lg-9"><br>
	<div class="container">
	    <div class="card">
	        <div class="card-header" align="center"><h1>Register</h1></div>

	        <div class="card-body">
	            <form method="POST" action="{{ route('customer.signup.submit') }}">
	                @csrf

	                <div class="form-group row">
	                    <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

	                    <div class="col-md-6">
	                        <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>

	                        @if ($errors->has('nama'))
	                            <span class="invalid-feedback">
	                                <strong>{{ $errors->first('nama') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

	                    <div class="col-md-6">
	                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

	                        @if ($errors->has('email'))
	                            <span class="invalid-feedback">
	                                <strong>{{ $errors->first('email') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="telp" class="col-md-4 col-form-label text-md-right">{{ __('No Telp') }}</label>

	                    <div class="col-md-6">
	                        <input id="telp" type="text" class="form-control{{ $errors->has('telp') ? ' is-invalid' : '' }}" name="telp" value="{{ old('telp') }}" required>

	                        @if ($errors->has('email'))
	                            <span class="invalid-feedback">
	                                <strong>{{ $errors->first('email') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="jk" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

	                    <div class="col-md-6">
	                        <input id="jk" type="radio" name="jk" value="0"> Laki - laki 
	                        <input id="jk" type="radio" name="jk" value="1"> Perempuan

	                        @if ($errors->has('email'))
	                            <span class="invalid-feedback">
	                                <strong>{{ $errors->first('email') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

	                    <div class="col-md-6">
	                        <input id="alamat" type="textarea" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ old('alamat') }}" required>

	                        @if ($errors->has('email'))
	                            <span class="invalid-feedback">
	                                <strong>{{ $errors->first('email') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="kodepos" class="col-md-4 col-form-label text-md-right">{{ __('Kode Pos') }}</label>

	                    <div class="col-md-6">
	                        <input id="kodepos" type="text" class="form-control{{ $errors->has('kodepos') ? ' is-invalid' : '' }}" name="kodepos" value="{{ old('kodepos') }}" required>

	                        @if ($errors->has('email'))
	                            <span class="invalid-feedback">
	                                <strong>{{ $errors->first('email') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

	                    <div class="col-md-6">
	                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

	                        @if ($errors->has('password'))
	                            <span class="invalid-feedback">
	                                <strong>{{ $errors->first('password') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

	                    <div class="col-md-6">
	                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
	                    </div>
	                </div>

	                <div class="form-group row mb-0">
	                    <div class="col-md-6 offset-md-4">
	                        <button type="submit" class="btn btn-primary">
	                            {{ __('Register') }}
	                        </button>
	                    </div>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>


<!-- 
	{!! Form::open(array('url'=>'backend/customer')) !!}
	<table class="table table-bordered">
		<h1 align="center">Register</h1>

		<tr><td>Nama</td><td>{!! Form::text('nama','',['class'=>'form-control']) !!}</td></tr>
		<tr><td>Email</td><td>{!! Form::text('email','',['class'=>'form-control']) !!}</td></tr>
		<tr><td>No Telp</td><td>{!! Form::text('telp','',['class'=>'form-control']) !!}</td></tr>
		<tr><td>Jenis Kelamin</td><td>{!! Form::radio('jk', '0') !!} Laki - laki {!! Form::radio('jk', '1') !!} Perempuan</td></tr>
		<tr><td>Alamat</td><td>{!! Form::textarea('alamat','',['class'=>'form-control']) !!}</td></tr>
		<tr><td>Kode Pos</td><td>{!! Form::text('kodepos','',['class'=>'form-control']) !!}</td></tr>
		<tr><td>Password</td><td>{!! Form::password('password', ['class'=>'form-control']) !!}</td></tr>
		<tr>
			<td colspan="2" align="center">
				{!! Form::submit('Simpan Data',['class'=>'btn btn-success btn-sm']) !!}
				{!! link_to('./','Batal',['class'=>'btn btn-warning btn-sm']) !!}
			</td>
		</tr>
	</table>
	<p align="center">Already have an account? <a href="#">Sign in</a>.</p>
	{!! Form::close() !!}
	     -->

@stop
