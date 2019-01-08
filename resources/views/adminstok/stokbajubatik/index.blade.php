@extends('adminstok')
@section('content')

<h1 align="center">Update Stok Batik</h1>
<br>
<!-- {!! link_to('backend/bajubatik/create',' Tambah Data',['class'=>'fa fa-plus-circle btn btn-primary']) !!} -->
<hr>
<table width="100%" id="kemeja-table" class="table table-hover table-bordered" align="center">
	<thead>
		<tr>
			<th>No</th><th>Nama baju</th><th>S</th><th> </th><th>M</th><th> </th><th>L</th><th> </th><th>XL</th><th> </th>
		</tr>
	</thead>
    <tbody>
        
    </tbody>
    <tfoot>
        <tr>
            <th>No</th><th>Nama baju</th><th>S</th><th> </th><th>M</th><th> </th><th>L</th><th> </th><th>XL</th><th> </th>
        </tr>
    </tfoot>
</table>
@endsection

@push('scripts')
    <script>
        $('#kemeja-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('backend.stokbajubatikjs') }}",
            columns: [
                {data: 'DT_Row_Index', name: 'id'},
                {data: 'nama_kemeja', name: 'nama_kemeja'},
                {data: 'uk_s', name: 'uk_s'},
                {data: 'action1', name: 'action1', orderable: false, searchable: false},
                {data: 'uk_m', name: 'uk_m'},
                {data: 'action2', name: 'action2', orderable: false, searchable: false},
                {data: 'uk_l', name: 'uk_l'},
                {data: 'action3', name: 'action3', orderable: false, searchable: false},
                {data: 'uk_xl', name: 'uk_xl'},
                {data: 'action4', name: 'action4', orderable: false, searchable: false},
            ]
        });
    </script>
@endpush


