@extends('admin')
@section('content')

<h1 align="center">Kelola Admin</h1>
<br>
{!! link_to(route('user.create'),' Tambah Data',['class'=>'fa fa-plus-circle btn btn-primary']) !!}
<hr>
<table width="100%" id="user-table" class="table table-hover">
	<thead>
		<tr>
            <th>No</th><th>Username</th><th>Level</th><th> </th>
        </tr>
	</thead>
    <tbody>
        
    </tbody>
    <tfoot>
        <tr>
            <th>No</th><th>Username</th><th>Level</th><th> </th>
        </tr>
    </tfoot>
</table>

@stop

@section('DataTablesScript')

	$(function(){
            $('#user-table').DataTable({
                responsive: true,
                processing : true,
                serverSide : true,
                ajax : '{{ route('backend.userjs') }}',
                columns : [
                    { data: 'DT_Row_Index', name: 'id'},
                    { data: 'username', name: 'username'},
                    { data: 'level', name: 'level'},
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
                    url : "{{ url('backend/user') }}" + '/' +id,
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
