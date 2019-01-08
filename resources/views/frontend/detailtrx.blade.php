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
  <h1 align="center">Detail Transaksi</h1>
    <div align="center"><br>
      <h6 align="center"></h6>
        <p>Nomer Resi : <b>{{ $transaksi->noresi }}</b></p>
        <p>Nama Penerima : <b>{{ $customer->nama }} - {{ $customer->telp }}</b></p>
        <p>Alamat Tujuan : <b>{{ $customer->alamat }} - {{ $customer->kodepos }}</b></p>
        <p>Pesanan : </p>
        <table align="center" border="border">
          <thead>
            <td>No</td>
            <td>Nama</td>
            <td>Ukuran</td>
            <td>Harga</td>
            <td>Qty</td>
            <td>Subtotal</td>
          </thead>
          <?php $i=1; $total = 0; ?>
            @foreach ($keranjang as $keranjang)
            <tr>
              <td align="center">{{ $i }}</td>
              <td>{{ $keranjang->nama_kemeja }}</td>
              <td align="center">{{ $keranjang->uk }}</td>
              <td align="right"><?php echo format_ribuan($keranjang->harga); ?></td>
              <td align="center">{{ $keranjang->qty }}</td>
              <td align="right"><?php echo format_ribuan($keranjang->total_harga); ?></td>
            </tr>
            <?php
            $total +=  $keranjang->total_harga;
            $i++;
            ?>
            @endforeach
        </table><br>

        Total Transfer : 
        <b><?php echo format_ribuan($total); ?></b><br>
        Kode unik : 
        <b>{{ $transaksi->kodeunik }}</b><br>
        <p>Total Transfer : <b>{{ format_ribuan($transaksi->total_bayar) }}</b></p>
        <a href="{{ url('home') }}/{{ Auth::user()->id }}/trx" class="btn btn-warning">Kembali</a>
    </div>
  </dir>

@endsection