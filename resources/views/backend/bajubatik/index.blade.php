@extends('admin')
@section('content')

<h1 align="center">Kelola Baju Batik</h1>
<br>
{!! link_to('backend/bajubatik/create',' Tambah Data',['class'=>'fa fa-plus-circle btn btn-primary']) !!}
<hr>
<table width="100%" id="kemeja-table" class="table table-hover" align="center">
	<thead>
		<tr>
			<th>Nama baju</th><th>Size S</th><th>Size M</th><th>Size L</th><th>Size XL</th><th> </th>
		</tr>
	</thead>

</table>
@stop

@section('DataTablesScript')

	$(function(){
            $('#kemeja-table').DataTable({
                processing : true,
                serverSide : true,
                ajax : '{{ route('backend.bajubatikjs') }}',
                columns : [
                    { data: 'nama_kemeja', name: 'nama_kemeja'},
                    { data: 'uk_s', name: 'uk_s'},
                    { data: 'uk_m', name: 'uk_m'},
                    { data: 'uk_l', name: 'uk_l'},
                    { data: 'uk_xl', name: 'uk_xl'},
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
                    url : "{{ url('backend/bajubatik') }}" + '/' +id,
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
