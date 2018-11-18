@extends('layouts.customer')
@section('content')

<?php 
$thisPage = "Testimoni";
?>
  <div class="col-lg-9"><br>
  	<div class="container">
	    <h1 align="center">Testimoni Pelanggan</h1> <br>
	    <div class="row">
    		<?php   
	         for($a=1; $a <= 20; $a++)
	         {
	        ?>
		    <figure><img width="200" src="img/testi/<?php print_r($a) ?>.jpg" hspace="3"></figure>
		    <?php } ?>
	    </div>
	</div>

@stop