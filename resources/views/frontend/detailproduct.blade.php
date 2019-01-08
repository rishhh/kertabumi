@extends('layouts.customer')
@section('content')

<?php 
$thisPage="Home";
function format_ribuan($nilai){
  return number_format($nilai, 0, ',', '.');
}
?>
<div class="col-lg-9">
  <dir class="container">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>{!! Html::ul($errors->all()) !!}</strong>
        </div>
    @endif
  <h1 align="center">Detail Product {{ $kemeja->nama_kemeja }}</h1>
    <div class="col-lg-12 col-md-9 mb-6">
          <div align="center" class="card h-900">
            <br>
            <img src="{{ asset('storage/img') }}/{{ $kemeja->file }}">
            <br><br>
            <b>Harga :</b> <b><?php echo "Rp. ".format_ribuan($kemeja->harga); ?></b><br>
            <b>Stok :</b>
            S : {{ $kemeja->uk_s }} | M : {{ $kemeja->uk_m }} | L : {{ $kemeja->uk_l }} | XL : {{ $kemeja->uk_xl }}<br>
            <b>Bahan :</b> {{ $kemeja->bahan }}<br>
            <b>Keterangan :</b> {{ $kemeja->keterangan }}
            <br><br>
            @if(Auth::guard('customer')->check())

            {!! Form::open(array('url'=>'home/'.Auth::user()->id.'/cart')) !!} 

            {!! Form::hidden('customer_id',Auth::user()->id) !!}
            {!! Form::hidden('kemeja_id',$kemeja->id) !!}
            {!! Form::hidden('nama_kemeja',$kemeja->nama_kemeja) !!}
            {!! Form::hidden('harga',$kemeja->harga) !!}
            {!! Form::select('uk', [''=>'--Pilih Ukuran--','S'=>'S', 'M'=>'M', 'L' => 'L', 'XL' => 'XL'], null, array('id'=>'uk')) !!}
            <br><br>
            
            <input type="number" name="jumlah" id="ukinput" value="1" min="1" max="1">

            {!! Form::hidden('status','0') !!}<br><br>

            {!! Form::submit('Pesan',['class'=>'btn btn-success btn-lg', 'id'=>'btn-submit-cart']) !!}<br><br>
            {!! link_to(URL::previous(),'Kembali',['class'=>'btn btn-warning btn-lg']) !!}
            @else
            {!! link_to('/home/pesan','Pesan',['class'=>'btn btn-success btn-lg']) !!}<br><br>
            {!! link_to(URL::previous(),'Kembali',['class'=>'btn btn-warning btn-lg']) !!}
            @endif
            {!! Form::close() !!}
          </div>
    </div>
    {!! Form::number('jumlah', '1', ['min'=>'1', 'max'=> $kemeja->uk_s, 'id'=>'uks']); !!}
    {!! Form::number('jumlah', '1', ['min'=>'1', 'max'=> $kemeja->uk_m, 'id'=>'ukm']); !!}
    {!! Form::number('jumlah', '1', ['min'=>'1', 'max'=> $kemeja->uk_l, 'id'=>'ukl']); !!}
    {!! Form::number('jumlah', '1', ['min'=>'1', 'max'=> $kemeja->uk_xl, 'id'=>'ukxl']); !!}
  </dir>


@endsection