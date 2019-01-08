@extends('admin')
@section('content')

<h1 align="center" class="judul">Kelola Transaksi</h1>
<br>
<a class="fa fa-print btn btn-info btn-sm no-print" onclick="printFunc()"> Cetak</a>
<hr>
<table width="100%" id="transaksi-table" class="table table-hover">
	<thead>
		<tr>
            <th>No</th><th>IdCust</th><th>No Transaksi</th><th>Total Bayar</th><th>Status</th><th> </th>
        </tr>
	</thead>
    <tbody>
        
    </tbody>
    <tfoot>
        <tr>
            <th>No</th><th>IdCust</th><th>No Transaksi</th><th>Total Bayar</th><th>Status</th><th> </th>
        </tr>
    </tfoot>
</table>

@endsection

@section('printFunction')

    function printFunc(){
      $('.judul').text('LAPORAN PENJUALAN');
      $('.btn').hide();
      window.print();
    }

@endsection

@section('DataTablesScript')

	$(function(){
            $('#transaksi-table').DataTable({
                responsive: true,
                processing : true,
                serverSide : true,
                ajax : '{{ route('backend.transaksijs') }}',
                columns : [
                    { data: 'DT_Row_Index', name: 'id'},
                    { data: 'customer_id', name: 'customer_id'},
                    { data: 'noresi', name: 'noresi'},
                    { data: 'total_bayar', name: 'total_bayar'},
                    { data: 'status', name: 'status'},
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
                    url : "{{ url('backend/transaksi') }}" + '/' +id,
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
