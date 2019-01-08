@extends('layouts.customer')
@section('content')

<?php 
$thisPage="cartHome";

function format_ribuan($nilai){
  return number_format($nilai, 0, ',', '.');
}
?>
<div class="col-lg-9">
  <dir class="container">
  <h1 align="center">Keranjang</h1>
    <div><br>
      <h6 align="center" id="cart-empty"></h6>
        <table class="table table-bordered table-hover table-cart">
          <thead>
            <tr align="center">
              <th>No</th>
              <th>Kemeja</th>
              <th>Ukuran</th>
              <th>Harga</th>
              <th>Qty</th>
              <th>Sub Total</th>
              <th>  </th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; $total = 0; ?>
            @foreach ($keranjang as $keranjang)
            <tr>
              <td align="center">{{ $i }}</td>
              <td>{{ $keranjang->nama_kemeja }}</td>
              <td align="center">{{ $keranjang->uk }}</td>
              <td align="right"><?php echo format_ribuan($keranjang->harga); ?></td>
              <td align="center">{{ $keranjang->qty }}</td>
              <td align="right"><?php echo format_ribuan($keranjang->total_harga); ?></td>
              <td><button class="btn btn-danger btn-delete-keranjang" data-id="{{ $keranjang->id }}">Hapus</button></td>
            </tr>
            <?php  
            $total +=  $keranjang->total_harga;
            $i++;
            ?>
            @endforeach
            <tr align="right">
              <th></th>
              <th></th>
              <th></th>
              <th>Jumlah</th>
              <th></th>
              <th id="total-harga-cart"><?php echo format_ribuan($total); ?></th>
              <th></th>
            </tr>
          </tbody>
            
        </table>
        <div align="right">
          <a href="{{ url('home/'.Auth::user()->id.'/checkout') }}" id="btn-checkout"><button class="btn btn-success btn-checkout">Checkout -></button></a>
        </div>
    </div>
  </dir>

@endsection
