@extends('layouts.customer')
@section('content')

<?php 
$thisPage="bayarHome";
function format_ribuan($nilai){
  return number_format($nilai, 0, ',', '.');
}
?>
<div class="col-lg-9">
  <dir class="container">
  <h1 align="center">Pembayaran</h1>
    <div id="pembayaran-kosong"><br>

      <?php $i=1; $total = 0; ?>
       @foreach ($transaksi as $transaksi)
      <p align="center">Silahkan transfer melalui akun rekening berikut ini :</p>
      <h6 align="center"><b>Bank BRI : 6936-01-000756-50-7 a/n Rifki Ali Hamidi</b></h6>
      <h6 align="center"><b>Bank BNI : 0361794808 a/n Rifki Ali Hamidi</b></h6>
      <h6 align="center"><b>Bank BCA : 8025073955 a/n Rifki Ali Hamidi</b></h6>
      <h6 align="center"><b>Bank MANDIRI : 1370006233239 a/n Rifki Ali Hamidi</b></h6>
      <p align="center">Sejumlah :</p>
        <h5 align="center">Rp. <b id="total-trf">
            {{ format_ribuan($transaksi->total_bayar) }}
        </b>
        <?php  
          $total +=  count($transaksi);
          $i++;
        ?>
        <div id="status-transaksi" status="<?php echo $transaksi->status; ?>"></div>
      </h5>
      <p align="center">* Transfer hingga 3 digit terakhir untuk memudahkan kami dalam melakukan verifikasi pembayaran yang anda lakukan.</p>
      <p align="center"><b>Mohon Diperhatikan !!! </b><br>* Kami hanya menggunakan akun rekening diatas untuk menerima pembayaran dari anda. Selain akun diatas berarti bukan rekening kami dan kami tidak bertanggung jawab atas uang yang anda kirimkan selain ke rekening diatas.</p>
      <h5 align="center">Konfirmasi Pembayaran :</h5>
      <p align="center">*Jika Anda sudah melakukan pembayaran segera konfirmasi melalui SMS/WA ke nomer : <br><b>085743240278 <br>dengan format :</b></p>
      <p align="center"><b>KT [Spasi] Nama-Pengirim [Spasi]  Tanggal-Transfer [Spasi] Jumlah-Transfer [Spasi] Bank-Tujuan</b></p>
      <p align="center"><b>Contoh :</b></p>
      <p align="center"><b>KT {{ $customer->nama }} <?php echo date('d/m/Y'); ?> {{ $transaksi->total_bayar }} BRI</b></p>
      <div align="center"><a href="https://wa.me/+6285743240278/?text=KT {{ $customer->nama }} <?php echo date('d/m/Y'); ?> {{ $transaksi->total_bayar }} BRI" data-action="share/whatsapp/share"><button class="btn btn-info btn-trx"><b>Klik Disini Untuk Konfirmasi <br>Melalui WhatsApp <i class="fa fa-paper-plane-o"></i></b></button></a></div><br>
      <p align="center">* Setelah anda melakukan pembayaran dan konfirmasi, setidaknya membutuhkan waktu kurang lebih <b>1x24 jam</b> untuk mengkonfirmasi pembayaran Anda. Harap Menunggu dan Bersabar.</p>
      <div align="center"><a href="{{ url('home') }}/{{ Auth::user()->id }}/trx"><button class="btn btn-success btn-trx">Cek Transaksi</button></a></div><hr>
      @endforeach
    </div>
    <br><h6 id="text-pembayaran-kosong" align="center"></h6>
  </dir>

@endsection
