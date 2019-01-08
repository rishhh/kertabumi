@extends('layouts.customer')
@section('content')

<?php 
$thisPage="Home";

// $token = "776356783:AAH3dyN0qB7kjvSugnV4R_mYv_MJOCfh_Yw"; $user_id = "237368436";
// $msg = "kertabumi diakses tanggal ".date('d-m-Y H:i:s')."";
// $req_params = ['chat_id' => $user_id, 'text' => $msg ];
// file_get_contents('https://api.telegram.org/bot'.$token.'/sendMessage?'.http_build_query($req_params));

?>
<script>
  <?php 
    $sumber = "".route('api.bajubatikjs.bs');
    $konten = file_get_contents($sumber);
    $arr = json_decode($konten, true);
  ?>   
</script>

        <div class="col-lg-9">
          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="{{ asset('storage/slider') }}/k11.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="{{ asset('storage/slider') }}/k22.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="{{ asset('storage/slider') }}/k33.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <div class="row">
            <?php   
             for($a=0; $a < count($arr); $a++)
             {
            ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
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
              </div>
            </div>
            <?php } ?>

          </div>
          <!-- /.row -->

@endsection