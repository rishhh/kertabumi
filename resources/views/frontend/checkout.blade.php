@extends('layouts.customer')
@section('content')

<?php 
$thisPage="cartHome";

function format_ribuan($nilai){
  return number_format($nilai, 0, ',', '.');
}

function genRandomInt($length) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomInt = '';
    for ($i = 0; $i < $length; $i++) {
        $randomInt .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomInt;
}

function genRandomStr($length) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomStr = '';
    for ($i = 0; $i < $length; $i++) {
        $randomStr .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomStr;
}
?>
<div class="col-lg-9">
  <dir class="container">
  <h1 align="center">Checkout Pesanan</h1>
    <div><br>
      <h5 align="center">Alamat Tujuan :</h5>
      <h6 align="center"><b>{{ $customer->nama }}</b><br>{{ $customer->alamat }}, {{ $customer->kodepos }}<br>({{ $customer->telp }})</h6>
      <div align="center"><a href="{{ url('/home/profil/'.Auth::user()->id.'/edit') }}"><button class="btn btn-info">Edit</button></a></div>
      <br>
      <h5 align="center">Pesanan :</h5>
      <h6 align="center">
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
        </table>
      </h6>
      <?php 
        $kode = genRandomInt(3);
        $totalbayar = $kode + $total;

        $idtrx = genRandomStr(9);
        $date = date("ymd");
        $noresi = $date.$idtrx;
      ?><br>
      <h5 align="center">Total : Rp. <b id="total-harga-cart"><?php echo format_ribuan($total); ?></b></h5>
      <h5 align="center" id="kode-unik">Kode Unik : <b id="kode"><?php echo $kode ?></b></h5>
      <h5 align="center" id="total-bayar">Total Bayar: Rp. <b id="totalbayar" total="<?php echo $totalbayar; ?>"><?php echo format_ribuan($totalbayar); ?></b></h5>
      <br>

      @if(Auth::guard('customer')->check())

      {!! Form::open(array('url'=>'home/'.Auth::user()->id.'/bayar')) !!} 

      {!! Form::hidden('customer_id',Auth::user()->id) !!}
      {!! Form::hidden('noresi',$noresi) !!}
      {!! Form::hidden('kodeunik',$kode) !!}
      {!! Form::hidden('total_bayar',$totalbayar) !!}
      {!! Form::hidden('status','0') !!}

      <div align="center" id="button-bayar">
        {!! Form::submit('Bayar',['class'=>'btn btn-success btn-lg btn-bayar', 'url'=>'url(home/'.Auth::user()->id.'/checkout)', 'id'=>'btn-bayar']) !!}
      </div>

      {!! Form::close() !!}
      @endif
      
    </div>
  </dir>

@endsection
