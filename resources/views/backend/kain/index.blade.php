@extends('admin')
@section('content')

<h1 align="center">Kelola Kain</h1>
<br>
{!! link_to('backend/kain/create',' Tambah Data',['class'=>'fa fa-plus-circle btn btn-primary']) !!}
<hr>
<table width="100%" id="kain-table" class="table table-hover">
	<thead>
		<tr><th>Tipe</th><th>Nama Kain</th><th>Stok</th><th> </th></tr>
	</thead>

</table>

@stop

@section('DataTablesScript')

	$(function(){
            $('#kain-table').DataTable({
                processing : true,
                serverSide : true,
                ajax : '{{ route('backend.kainjs') }}',
                columns : [
                    { data: 'tipe', name: 'tipe'},
                    { data: 'nama_kain', name: 'nama_kain'},
                    { data: 'stok', name: 'stok'},
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
                    url : "{{ url('backend/kain') }}" + '/' +id,
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