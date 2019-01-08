@extends('admin')
@section('content')

<h1 align="center" class="judul">Kelola Kain</h1>
<br>
<a class="fa fa-print btn btn-info btn-sm no-print" onclick="printFunc()"> Cetak</a>
{!! link_to('backend/kain/create',' Tambah Data',['class'=>'fa fa-plus-circle btn btn-primary']) !!}
<hr>
<table width="100%" id="kain-table" class="table table-hover">
	<thead>
		<tr>
            <th>No</th><th>Tipe</th><th>Nama Kain</th><th>Stok</th><th> </th>
        </tr>
	</thead>
    <tbody>
        
    </tbody>
    <tfoot>
        <tr>
            <th>No</th><th>Tipe</th><th>Nama Kain</th><th>Stok</th><th> </th>
        </tr>
    </tfoot>

</table>

@endsection

@section('printFunction')

    function printFunc(){
      $('.judul').text('LAPORAN STOK KAIN');
      $('.btn').hide();
      window.print();
    }

@endsection

@section('DataTablesScript')

	$(function(){
            $('#kain-table').DataTable({
                responsive: true,
                processing : true,
                serverSide : true,
                ajax : '{{ route('backend.kainjs') }}',
                columns : [
                    { data: 'DT_Row_Index', name: 'id'},
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