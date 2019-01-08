@extends('admin')
@section('content')

<h1 align="center">Kelola Keranjang</h1>
<br>
<hr>
<table width="100%" id="keranjang-table" class="table table-hover">
	<thead>
		<tr>
            <th>No</th><th>Cust</th><th>Kemeja</th><th>Uk</th><th>Harga</th><th>Qty</th><th>Total</th><th>Kode</th><th>Status</th><th> </th>
        </tr>
	</thead>
    <tbody>
        
    </tbody>
    <tfoot>
        <tr>
            <th>No</th><th>Cust</th><th>Kemeja</th><th>Uk</th><th>Harga</th><th>Qty</th><th>Total</th><th>Kode</th><th>Status</th><th> </th>
        </tr>
    </tfoot>
</table>

@stop

@section('DataTablesScript')

	$(function(){
            $('#keranjang-table').DataTable({
                responsive: true,
                processing : true,
                serverSide : true,
                ajax : '{{ route('backend.keranjangjs') }}',
                columns : [
                    { data: 'DT_Row_Index', name: 'id'},
                    { data: 'customer_id', name: 'customer_id'},
                    { data: 'nama_kemeja', name: 'nama_kemeja'},
                    { data: 'uk', name: 'uk'},
                    { data: 'harga', name: 'harga'},
                    { data: 'qty', name: 'qty'},
                    { data: 'total_harga', name: 'total_harga'},
                    { data: 'kodeunik', name: 'kodeunik'},
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
                    url : "{{ url('backend/keranjang') }}" + '/' +id,
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
