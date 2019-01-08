@extends('adminstok')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" align="center">User Profil</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div>
        <div align="center">
          Nama : 
          <b>{{ $adminstok->username }}</b><br>
          Email : 
          <b>{{ $adminstok->email }}</b><br>

          <br><br>
          {!! link_to('/adminstok/profil/'.Auth::user()->id.'/edit','Edit',['class'=>'btn btn-info btn-sm']) !!}
          {!! link_to('/adminstok','Kembali',['class'=>'btn btn-warning btn-sm']) !!}
        </div>
    </div>

@endsection