@extends('layouts.customer')
@section('content')

<script>
  <?php 
    $sumber = "".route('api.bajubatikjs');
    $konten = file_get_contents($sumber);
    $arr = json_decode($konten, true);
  ?>   
</script>

  <div class="col-lg-9"><br>
    <h2 align="center">All Product</h2><br>
    <div class="row">
        <?php   
         for($a=0; $a < count($arr); $a++)
         {
        ?>
      <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
          @if(Auth::guard('customer')->check())
          <?php 
          $thisPage="apHome";
          ?>
          <a href="{{ url('home/detailProduct') }}/<?php print_r($arr[$a]['id']); ?>"><img class="card-img-top" src="{{ asset('storage/img') }}/<?php print_r($arr[$a]['file']); ?>" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="{{ url('home/detailProduct') }}/<?php print_r($arr[$a]['id']); ?>"><?php print_r($arr[$a]['nama_kemeja']); ?></a>
            </h4>
            <h5><?php print_r('Rp. '.$arr[$a]['harga']); ?></h5>
          </div>
          <div class="card-footer">
            <a href="{{ url('home/detailProduct') }}/<?php print_r($arr[$a]['id']); ?>" class="btn btn-success">Pesan</a>
          </div>
          @else
          <?php 
          $thisPage="ap";
          ?>
          <a href="{{ url('detailProduct') }}/<?php print_r($arr[$a]['id']); ?>"><img class="card-img-top" src="{{ asset('storage/img') }}/<?php print_r($arr[$a]['file']); ?>" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="{{ url('detailProduct') }}/<?php print_r($arr[$a]['id']); ?>"><?php print_r($arr[$a]['nama_kemeja']); ?></a>
            </h4>
            <h5><?php print_r('Rp. '.$arr[$a]['harga']); ?></h5>
          </div>
          <div class="card-footer">
            <a href="{{ url('detailProduct') }}/<?php print_r($arr[$a]['id']); ?>" class="btn btn-success">Pesan</a>
          </div>
          @endif
        </div>
      </div>
      <?php } ?>

    </div>
    <!-- /.row -->

@stop