@extends('layouts.customer')
@section('content')

<?php 
$thisPage="Home";
?>
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
          <a href="detailproduct-ap.php?id=<?php echo "$a";?>"><img class="card-img-top" src="{{ asset('storage/img') }}/<?php print_r($arr[$a]['file']); ?>" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="detailproduct-ap.php?id=<?php echo "$a";?>"><?php print_r($arr[$a]['nama_kemeja']); ?></a>
            </h4>
            <h5><?php print_r('Rp. '.$arr[$a]['harga']); ?></h5>
          </div>
          <div class="card-footer">
            <a href="contact.php#info" class="btn btn-success">Pesan</a>
          </div>
        </div>
      </div>
      <?php } ?>

    </div>
    <!-- /.row -->

@stop