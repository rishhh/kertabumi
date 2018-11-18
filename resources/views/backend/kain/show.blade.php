@extends('admin')
@section('content')

<h1 align="center">Detail Kain {{ $kain->nama_kain }} </h1>
<br>
<br>
	<div>
        <div class="col-md-6"><img src="{{ asset('storage/kain') }}/{{ $kain->file }}"></div>
        <div class="col-md-6" align="center">
        	<b>Tipe : @switch($kain->tipe) @case(0) Batik Tulis @break @case(1) Batik Printing @break @case(2) Polos @endswitch</b><br>
        	<b>Stok : {{ $kain->stok }}</b><br>
        	<b>Supplier : @switch($kain->supplier) @case(0) Sekarniti @break @case(1) SAB @break @case(2) Lainya @endswitch</b><br>
        	{!! link_to('backend/kain','Kembali',['class'=>'btn btn-warning btn-sm']) !!}

        </div>
    </div>

@stop