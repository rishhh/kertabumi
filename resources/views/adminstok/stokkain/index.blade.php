@extends('adminstok')
@section('content')

<h1 align="center">Update Stok Kain</h1>
<br>
<!-- {!! link_to(route('stokkain.create'), 'Tambah Data', ['class'=>'fa fa-plus-circle btn btn-primary modal-show', 'title'=>'Tambah Kain']) !!} -->
<hr>
<div class="panel-body">
    <table width="100%" id="kain-table" class="table table-hover  table-bordered" align="center">
    	<thead>
    		<tr>
    			<th>No</th>
                <th>Nama Kain</th>
                <th>Tipe</th>
                <th>Stok</th>
                <th> </th>
    		</tr>
    	</thead>
        <tbody>
            
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama Kain</th>
                <th>Tipe</th>
                <th>Stok</th>
                <th> </th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

@push('scripts')
    <script>
        $('#kain-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('backend.stokkainjs') }}",
            columns: [
                {data: 'DT_Row_Index', name: 'id'},
                {data: 'nama_kain', name: 'nama_kain'},
                {data: 'tipe', name: 'tipe'},
                {data: 'stok', name: 'stok'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
@endpush

