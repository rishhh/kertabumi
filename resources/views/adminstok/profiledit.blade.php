@extends('adminstok')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" align="center">Edit Profil</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
   	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>{!! Html::ul($errors->all()) !!}</strong>
    </div>
	@endif
	{!! Form::model($adminstok, array('url'=>'adminstok/profil/'.$adminstok->id,'method'=>'patch')) !!}
	<table class="table table-bordered">
		<tr><td>Nama</td><td>{!! Form::text('username',null,['class'=>'form-control', 'required']) !!}</td></tr>
		<tr><td>Email</td><td>{!! Form::text('email',null,['class'=>'form-control', 'required']) !!}</td></tr>
		<tr align="center">
			<td colspan="2">
				{!! Form::submit('Update Data',['class'=>'btn btn-success btn-sm']) !!}
				{!! link_to('adminstok/profil/'.Auth::user()->id,'Batal',['class'=>'btn btn-warning btn-sm']) !!}
			</td>
		</tr>
	</table>
	{!! Form::close() !!}

@endsection