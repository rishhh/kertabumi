@extends('layouts.customer')
@section('content')

<?php 
$thisPage = "Contact";
?>
<div class="col-lg-9">
	<dir class="container">
		<h1 align="center">Contact Us</h1>
		<div class="row">
			<div class="col-sm-6"><br>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.5475670097867!2d110.21759531477835!3d-7.837612994352671!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x535829e763825005!2sCV+Busana+Mandiri!5e0!3m2!1sid!2sid!4v1530506384023" width="100%" height="320px" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="col-sm-6">
				<form action="{{ route('customer.contact.submit') }}" method="POST">
				@csrf
				@if(session()->has('message'))
				    <div class="alert alert-success">
				        {{ session()->get('message') }}
				    </div>
				@endif
					@if(Auth::guard('customer')->check())
				  <div class="container">
				    <hr>

				    <label for="nama"><b>Nama</b></label><br>
				    <input type="text" placeholder="Masukkan Nama" name="nama" value="{{ Auth::user()->nama }}" class="form-control" required><br>

				    <label for="email"><b>Email</b></label><br>
				    <input type="text" placeholder="Masukkan Email" name="email" value="{{ Auth::user()->email }}" class="form-control" required><br>

				    <label for="telp"><b>No Telp</b></label><br>
				    <input type="text" placeholder="Masukkan Nomor Telepon" name="telp" value="{{ Auth::user()->telp }}" class="form-control" required><br>

				    <label for="pesan"><b>Pesan</b></label><br>
				    <textarea placeholder="Tulis Pesan Disini ..." name="pesan" class="form-control" required></textarea>
				    <hr>

				  </div>
					@else
				  <div class="container">
				    <hr>

				    <label for="nama"><b>Nama</b></label><br>
				    <input type="text" placeholder="Masukkan Nama" name="nama" class="form-control" required><br>

				    <label for="email"><b>Email</b></label><br>
				    <input type="text" placeholder="Masukkan Email" name="email" class="form-control" required><br>

				    <label for="telp"><b>No Telp</b></label><br>
				    <input type="text" placeholder="Masukkan Nomor Telepon" name="telp" class="form-control" required><br>

				    <label for="pesan"><b>Pesan</b></label><br>
				    <textarea placeholder="Tulis Pesan Disini ..." name="pesan" class="form-control" required></textarea>
				    <hr>

				  </div>
				  @endif
				  <div class="container">
				    <button type="submit" class="btn container">Kirim</button>
				  </div>
				</form><br><br>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-4" align="center">
				<a href="http://www.batikkertabumi.co.id"><img src="{{ asset('storage/icon') }}/www.png" width="100" height="100"><br>batikkertabumi.co.id</a>
			</div>
			<div class="col-sm-4" align="center">
				<a href="http://www.facebook.com/batikkertabumi"><img src="{{ asset('storage/icon') }}//fb.png" width="100" height="100"><br>@batikkertabumi</a>
			</div>
			<div class="col-sm-4" align="center">
				<a href="https://www.instagram.com/batik_kertabumi/?hl=id"><img src="{{ asset('storage/icon') }}//ig.png" width="100" height="100"><br>@batik_kertabumi</a><p id="info"></p>	
			</div>
		</div>

		<div class="container"><br><br>
			<center><h4 id="ip">INFO & PEMESANAN</h4></center><br>
			<div class="row">	
				<div class="col-sm-3"> 
					<b>ANISA </b> <br>
					WA  : 087739034290<br>
					BBM : D7386DCE<br>
				</div><div class="col-sm-3"> 
					<b>SANTIA </b> <br>
					WA  : 087838999331<br>
					BBM : D5E5E54A<br>
				</div><div class="col-sm-3"> 
					<b>DEVI </b> <br>
					WA  : 087739272477<br>
					BBM : D5E860F4<br>
				</div><div class="col-sm-3"> 
					<b>SISCA </b> <br>
					WA  : 085726527305<br>
					BBM : D64A999B<br>
				</div><div class="col-sm-3"> 
					<b>WINA </b> <br>
					WA  : 082226192204<br>
					BBM : D77DD5E5<br>
				</div><div class="col-sm-3"> 
					<b>YONA </b> <br>
					WA  : 087828347558<br>
					BBM : D7E2A495<br>
				</div><div class="col-sm-3"> 
					<b>DICA </b> <br>
					WA  : 081325155004<br>
					BBM : D78CC0E2<br>
				</div><div class="col-sm-3"> 
					<b>VIA </b> <br>
					WA  : 085713352739<br>
					BBM : D38E568E<br>
				</div><div class="col-sm-3"> 
					<b>AISSA </b> <br>
					WA  : 085326199762<br>
					BBM : DAC3CDEB<br>
				</div><div class="col-sm-3"> 
					<b>YUNIA  </b> <br>
					WA  : 087823931301<br>
					BBM : DA8C4387<br>
				</div><div class="col-sm-3"> 
					<b>HAYU </b> <br>
					WA  : 085847887377<br>
					BBM : DB56732C<br>
				</div><div class="col-sm-3"> 
					<b>FITRI  </b> <br>
					WA  : 082220503511<br>
					BBM : DD4184E0<br>
				</div><div class="col-sm-3"> 
					<b>ICHA </b> <br>
					WA  : 082230792144<br>
					BBM : DC8FBB4A<br>
				</div><div class="col-sm-3"> 
					<b>HANNA </b> <br>
					WA  : 082297123221<br>
					BBM : DB91ACFB<br>
				</div><div class="col-sm-3"> 
					<b>BELLA </b> <br>
					WA  : 085742057570<br>
					BBM : DDEE4296<br>
				</div><div class="col-sm-3"> 
					<b>ULFA </b> <br>
					WA  : 087831287110<br>
					BBM : E3E6B7FB<br>
				</div><div class="col-sm-3"> 
					<b>CHIKA </b> <br>
					WA  : 081335753129<br>
					BBM : E359208C<br>
				</div><div class="col-sm-3"> 
					<b>NOVI </b> <br>
					WA  : 081335753139<br>
					BBM : KRTBM9<br>
				</div><div class="col-sm-3"> 
					<b>MAYA </b> <br>
					WA  : 081335753133 <br>
					BBM : E3DE0832<br>
				</div><div class="col-sm-3"> 
					<b>RIA </b> <br>
					WA  : 081335753137<br>
					BBM : E35B9235<br>
				</div><div class="col-sm-3"> 
					<b>RARA </b> <br>
					WA  : 081335753134<br>
					BBM : E3F27A99<br>
				</div><div class="col-sm-3"> 
					<b>RISA </b> <br>
					WA  : 081335753136<br>
					BBM : E3EA3D6E<br>
				</div><div class="col-sm-3"> 
					<b>PITA </b> <br>
					WA  : 087739732531<br>
					BBM : DAD0BBD9<br>
				</div><div class="col-sm-3"> 
					<b>HESTI </b> <br>
					WA  : 083109537121<br>
					BBM : DDC0C980<br>
				</div>	
			 </div>							
		</div>

	</dir>
</div>



@stop