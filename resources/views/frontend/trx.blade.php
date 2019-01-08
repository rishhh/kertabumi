@extends('layouts.customer')
@section('content')

<?php 
$thisPage="trxHome";
function format_ribuan($nilai){
  return number_format($nilai, 0, ',', '.');
}
?>
<div class="col-lg-9">
  <dir class="container">
  <h1 align="center">Transaksi</h1>
    <div><br>
      <h6 align="center"></h6>
        <table class="table table-bordered table-hover table-transaksi" align="center">
          <thead>
            <tr align="center">
              <th>No</th>
              <th>Id Transaksi</th>
              <th>Total Bayar</th>
              <th>Status</th>
              <th>  </th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; $total = 0; ?>
            @foreach ($transaksi as $transaksi)
            <tr>
              <td align="center">{{ $i }}</td>
              <td align="center">{{ $transaksi->noresi }}</td>
              <td align="center">{{ format_ribuan($transaksi->total_bayar) }}</td>
              <td align="center">@switch($transaksi->status) @case(0) <p style="color:red">Belum Dibayar</p> @break @case(1) <p style="color:green">Sudah Dibayar</p> @break @case(2) Pesanan Diproses @break @case(3) Pesanan Dikirim <br> <a href="{{ route('customer.home') }}/trx/{{$transaksi->id}}/changestatus" class="btn btn-danger btn-konfirmasi-diterima">Konfirmasi Diterima</a> @break @case(4) Selesai @break @endswitch</td>
              <td><a href="{{ url('home') }}/trx/{{ $transaksi->id }}/detail" class="btn btn-info btn-detail-transaksi">Detail</a>
              </td>
            </tr>
            <?php  
            $i++;
            ?>
            @endforeach
          </tbody>
            
        </table>
    </div>
  </dir>

@endsection