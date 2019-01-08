@extends('admin')
@section('content')

<h1 align="center" class="judul">Detail Transaksi</h1>
<br>
<?php 
function format_ribuan($nilai){
  return number_format($nilai, 0, ',', '.');
}
 ?>
<br>
	<div>
      <div class="col-md-4"></div>
        <div class="col-md-4" align="center" id="print-area">
        	
            Id Transaksi : 
            <b>{{ $transaksi->noresi }}</b><br>
            Nama Penerima : 
            <b>{{ $customer->nama }} - {{ $customer->telp }}</b><br>
            Alamat Tujuan : 
            <b>{{ $customer->alamat }} - {{ $customer->kodepos }}</b><br><br>
            Pesanan : 
            <table align="center" border="bordered">
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
                <tr>
                  <td colspan="5" align="center">Total</td>
                  <td><b><?php echo format_ribuan($total); ?></b></td>
                </tr>
            </table><br>
            Kode unik : 
            <b>{{ $transaksi->kodeunik }}</b><br>
            Total Transfer : 
            <b>{{ format_ribuan($transaksi->total_bayar) }}</b><br>
        	<br><br>
          <a class="fa fa-print btn btn-info btn-sm no-print" onclick="printFunc()"> Cetak</a>
          <a href="{{ route('transaksi.index') }}" class="fa fa-backward btn btn-warning btn-sm no-print"> Kembali</a>
        </div>
      <div class="col-md-4"></div>
    </div>

@endsection

@section('printFunction')
    
    function printFunc(){
      $('.judul').text('INVOICE');
      $('.btn').hide();
      window.print();
    }

@endsection
