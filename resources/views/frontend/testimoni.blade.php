@extends('layouts.customer')
@section('content')

<?php 
$thisPage = "Testimoni";
?>
  <div class="col-lg-9"><br>
  	<div class="container">
	    <h1 align="center">Testimoni Pelanggan</h1> <br>
	    <div class="row">
	        @foreach ($testimoni as $testimoni)
		    <figure><img width="200" src="{{ asset('storage/testimoni') }}/{{ $testimoni->file }}" hspace="3"></figure>
            @endforeach
	    </div>
	</div>

@endsection