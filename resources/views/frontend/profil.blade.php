@extends('layouts.customer')
@section('content')

<?php 
$thisPage="Profil";
?>
<div class="col-lg-9">
  <dir class="container">
  @if(session()->has('message'))
      <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
  @endif
  <h1 align="center">Profil User</h1>
    <div><br><br>
          <div align="center">
            Nama : 
            <b>{{ $customer->nama }}</b><br>
            Email : 
            <b>{{ $customer->email }}</b><br>
            No Telp : 
            <b>{{ $customer->telp }}</b><br>
            Jenis Kelamin : 
            <b>@switch($customer->jk) @case(0) Laki - laki @break @case(1) Perempuan @break @endswitch</b><br>
            Alamat : 
            <b>{{ $customer->alamat }} - {{ $customer->kodepos }}</b><br>
            <br><br>
            {!! link_to('/home/profil/'.Auth::user()->id.'/edit','Edit',['class'=>'btn btn-info btn-sm']) !!}
            {!! link_to('/home','Kembali',['class'=>'btn btn-warning btn-sm']) !!}
          </div>
    </div>
  </dir>

@endsection