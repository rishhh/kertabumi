@extends('admin')
@section('content')

<h1 align="center">Kelola Pesan</h1>
<br>
<hr>
<table width="100%" id="pesan-table" class="table table-hover">
	<thead>
		<tr><th>Tanggal Masuk</th><th>Nama</th><th>Email</th><th>No Telp</th><th> </th></tr>
	</thead>

</table>

@stop

@section('DataTablesScript')

	$(function(){
            $('#pesan-table').DataTable({
                processing : true,
                serverSide : true,
                ajax : '{{ route('backend.pesanjs') }}',
                columns : [
                    { data: 'created_at', name: 'created_at'},
                    { data: 'nama', name: 'nama'},
                    { data: 'email', name: 'email'},
                    { data: 'telp', name: 'telp'},
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
                    url : "{{ url('backend/pesan') }}" + '/' +id,
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