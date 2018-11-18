<?php 
include 'include/header.php'; 
$id=$_GET['id'];
?>
<script>
  <?php 
    $sumber = 'kbap.json';
    $konten = file_get_contents($sumber);
    $arr = json_decode($konten, true);
  ?>   
</script>

      <div class="col-lg-9"><br>
        <h1 align="center">Detail <?php print_r($arr[$id]['nama_kemeja']); ?></h1><br>
        <div class="row">
          <div class="col-sm-8">
            <img src="img/all/<?php print_r($arr[$id]['file']); ?>">
          </div>
          <div class="col-sm-4">
            <h3>Bahan :</h3>
            <p><?php print_r($arr[$id]['bahan']); ?></p>
            <h3>Keterangan :</h3>
            <p><?php print_r($arr[$id]['keterangan']); ?></p><br>
            <h3>Harga : </h3>
            <h3><?php print_r('Rp. '.$arr[$id]['harga']); ?></h3><br>
<!--             <h3>Stok :</h3>
            <div class="row">
              <div class="col-sm-3">
                <p>S : <?php print_r($arr[$id]['uk_s']); ?></p>
              </div>
              <div class="col-sm-3">
                <p>M : <?php print_r($arr[$id]['uk_s']); ?></p>
              </div>
              <div class="col-sm-3">
                <p>L : <?php print_r($arr[$id]['uk_s']); ?></p>
              </div>
              <div class="col-sm-3">
                <p>XL : <?php print_r($arr[$id]['uk_s']); ?></p>
              </div>
            </div> -->
            <form action="contact.php#info" method="post">
              <button type="submit" class="btn btn-success">PESAN</button>
            </form>
          </div>
        </div>
        <br><br>

<?php include 'include/footer.php';?>