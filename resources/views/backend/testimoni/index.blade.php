@extends('admin')
@section('content')

<h1 align="center">Kelola Testimoni</h1>
<br>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>{!! Html::ul($errors->all()) !!}</strong>
    </div>
@endif
{!! Form::open(array('url'=>'backend/testimoni/store', 'files'=>'true')) !!}
<table>
    <tr><td>{!! Form::file('file') !!}</td><td>{!! Form::submit('Upload',['class'=>'btn btn-success btn-sm']) !!}</td></tr>
</table>
{!! Form::close() !!}
<hr>
<table width="100%" id="testimoni-table" class="table table-hover">
	<thead>
		<tr>
            <th>No</th><th>Foto</th><th>Nama File</th><th> </th>
        </tr>
	</thead>
    <tbody>
        
    </tbody>
    <tfoot>
        <tr>
            <th>No</th><th>Foto</th><th>Nama File</th><th> </th>
        </tr>
    </tfoot>

</table>

@stop

@section('DataTablesScript')

	$(function(){
            $('#testimoni-table').DataTable({
                responsive: true,
                processing : true,
                serverSide : true,
                ajax : '{{ route('backend.testimonijs') }}',
                columns : [
                    { data: 'DT_Row_Index', name: 'id'},
                    { data: 'foto', name: 'foto'},
                    { data: 'file', name: 'file'},
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

@endsection

@section('deleteData')
		
		function deleteData(id){
            var popup = confirm("Are you sure you want to delete?");
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if (popup == true) {
                $.ajax({
                    url : "{{ url('backend/testimoni') }}" + '/' +id,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' : csrf_token},
                    success : function (data) {
                        table.ajax.reload();
                        console.log(data);
                    },
                })
            }
        }

@endsection