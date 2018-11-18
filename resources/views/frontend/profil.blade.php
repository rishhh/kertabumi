@extends('layouts.customer')
@section('content')

<?php 
$thisPage="Home";
?>
<div class="col-lg-9">
  <dir class="container">
  <h1 align="center">Profil User</h1>
    <div><br><br>
          <div align="center">
            Nama : 
            <b>{{ $customer->nama }}</b><br>
            Email : 
            <b>{{ $customer->email }}</b><br>
            No Telp : 
            <b>{{ $customer->telp }}</b><br>
            <br><br>
            {!! link_to('/edit','Edit',['class'=>'btn btn-info btn-sm']) !!}<br><br>
            {!! link_to('/home','Kembali',['class'=>'btn btn-warning btn-sm']) !!}
          </div>
    </div>
  </dir>

@stop