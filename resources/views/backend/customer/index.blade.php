@extends('admin')
@section('content')

<h1 align="center">Kelola Pelanggan</h1>
<br>
{!! link_to('backend/customer/create',' Tambah Data',['class'=>'fa fa-plus-circle btn btn-primary']) !!}
<hr>
<table width="100%" id="customer-table" class="table table-hover">
	<thead>
		<tr><th>Nama</th><th>Jenis Kelamin</th><th>No Telp</th><th>Email</th><th>Alamat</th><th>Kode Pos</th><th> </th></tr>
	</thead>

</table>

@stop

@section('DataTablesScript')

	$(function(){
            $('#customer-table').DataTable({
                processing : true,
                serverSide : true,
                ajax : '{{ route('backend.customerjs') }}',
                columns : [
                    { data: 'nama', name: 'nama'},
                    { data: 'jk', name: 'jk'},
                    { data: 'telp', name: 'telp'},
                    { data: 'email', name: 'email'},
                    { data: 'alamat', name: 'alamat'},
                    { data: 'kodepos', name: 'kodepos'},
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
                    url : "{{ url('backend/customer') }}" + '/' +id,
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