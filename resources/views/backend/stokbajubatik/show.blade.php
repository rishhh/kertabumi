@extends('admin')
@section('content')

<h1 align="center">Detail Baju Seri {{ $kemeja->nama_kemeja }} </h1>
<br>
<br>
	<div>
        <div class="col-md-6">.col-md-6</div>
        <div class="col-md-6" align="center">
        	<b>Harga : {{ $kemeja->harga }}</b><br>
        	<b>Kategori : @switch($kemeja->kategori) @case(1) Best Seller @break @case(2) New Product @break @default All Product @endswitch</b><br>
        	<b>Stok S : {{ $kemeja->uk_s }} M : {{ $kemeja->uk_m }} L : {{ $kemeja->uk_l }} XL : {{ $kemeja->uk_xl }}</b><br>
        	<b>Bahan : <br>{{ $kemeja->bahan }}</b><br>
        	<b>Keterangan : <br>{{ $kemeja->keterangan }}</b><br><br>
        	{!! link_to('backend/bajubatik','Kembali',['class'=>'btn btn-warning btn-sm']) !!}

        </div>
    </div>

@stop