@extends('admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" align="center">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
    	<a href="{{ route('backend.home') }}/keranjang">
	        <div class="col-xs-6 col-md-4">
	            <div class="panel panel-green">
	                <div class="panel-heading">
	                    <div class="row">
	                        <div class="col-xs-3">
	                            <i class="fa fa-shopping-cart fa-5x"></i>
	                        </div>
	                        <div class="col-xs-9 text-right">
	                            <div class="huge">
	                            	<?php  
								         $sumber = "".route('api.keranjangjs');
								         $arr = json_decode(file_get_contents($sumber), true);
								         echo count($arr);
								    ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                    <div class="panel-footer">
                        <span class="pull-left">Keranjang</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
	            </div>
	        </div>
	    </a>
	    <a href="{{ route('backend.home') }}/transaksi">
	        <div class="col-xs-6 col-md-4">
	            <div class="panel panel-primary">
	                <div class="panel-heading">
	                    <div class="row">
	                        <div class="col-xs-3">
	                            <i class="fa fa-exchange fa-5x"></i>
	                        </div>
	                        <div class="col-xs-9 text-right">
	                            <div class="huge">
	                            	<?php  
								         $sumber = "".route('api.transaksijs');
								         $arr = json_decode(file_get_contents($sumber), true);
								         echo count($arr);
								    ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                    <div class="panel-footer">
                        <span class="pull-left">Transaksi</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
	            </div>
	        </div>
	    </a>
	    <a href="{{ route('backend.home') }}/pesan">
	        <div class="col-xs-6 col-md-4">
	            <div class="panel panel-yellow">
	                <div class="panel-heading">
	                    <div class="row">
	                        <div class="col-xs-3">
	                            <i class="fa fa-envelope fa-5x"></i>
	                        </div>
	                        <div class="col-xs-9 text-right">
	                            <div class="huge">
	                            	<?php  
								         $sumber = "".route('api.pesanjs');
								         $arr = json_decode(file_get_contents($sumber), true);
								         echo count($arr);
								    ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                    <div class="panel-footer">
                        <span class="pull-left">Pesan</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
	            </div>
	        </div>
	    </a>
	    <a href="{{ route('backend.home') }}/bajubatik">
	        <div class="col-xs-6 col-md-4">
	            <div class="panel panel-red">
	                <div class="panel-heading">
	                    <div class="row">
	                        <div class="col-xs-3">
	                            <i class="fa fa-wrench fa-5x"></i>
	                        </div>
	                        <div class="col-xs-9 text-right">
	                            <div class="huge">
	                            	<?php  
								         $sumber = "".route('api.bajubatikjs');
								         $arr = json_decode(file_get_contents($sumber), true);
								         echo count($arr);
								    ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                    <div class="panel-footer">
                        <span class="pull-left">Kelola Batik</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
	            </div>
	        </div>
	    </a>
	    <a href="{{ route('backend.home') }}/kain">
	        <div class="col-xs-6 col-md-4">
	            <div class="panel panel-red">
	                <div class="panel-heading">
	                    <div class="row">
	                        <div class="col-xs-3">
	                            <i class="fa fa-wrench fa-5x"></i>
	                        </div>
	                        <div class="col-xs-9 text-right">
	                            <div class="huge">
	                            	<?php  
								         $sumber = "".route('api.kainjs');
								         $arr = json_decode(file_get_contents($sumber), true);
								         echo count($arr);
								    ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                    <div class="panel-footer">
                        <span class="pull-left">Kelola Kain</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
	            </div>
	        </div>
	    </a>
	    <a href="{{ route('backend.home') }}/customer">
	        <div class="col-xs-6 col-md-4">
	            <div class="panel panel-info">
	                <div class="panel-heading">
	                    <div class="row">
	                        <div class="col-xs-3">
	                            <i class="fa fa-group fa-5x"></i>
	                        </div>
	                        <div class="col-xs-9 text-right">
	                            <div class="huge">
	                            	<?php  
								         $sumber = "".route('api.customerjs');
								         $arr = json_decode(file_get_contents($sumber), true);
								         echo count($arr);
								    ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                    <div class="panel-footer">
                        <span class="pull-left">Pelanggan</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
	            </div>
	        </div>
	    </a>
<!-- 	    <a href="#">
	        <div class="col-xs-6 col-md-4">
	            <div class="panel panel-danger">
	                <div class="panel-heading">
	                    <div class="row">
	                        <div class="col-xs-3">
	                            <i class="fa fa-align-justify fa-5x"></i>
	                        </div>
	                        <div class="col-xs-9 text-right">
	                            <div class="huge">
	                            	X
	                            </div>
	                        </div>
	                    </div>
	                </div>
                    <div class="panel-footer">
                        <span class="pull-left">Diskripsi</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
	            </div>
	        </div>
	    </a> -->
	    <a href="{{ route('backend.home') }}/testimoni">
	        <div class="col-xs-6 col-md-4">
	            <div class="panel panel-danger">
	                <div class="panel-heading">
	                    <div class="row">
	                        <div class="col-xs-3">
	                            <i class="fa fa-photo fa-5x"></i>
	                        </div>
	                        <div class="col-xs-9 text-right">
	                            <div class="huge">
	                            	<?php  
								         $sumber = "".route('api.testimonijs');
								         $arr = json_decode(file_get_contents($sumber), true);
								         echo count($arr);
								    ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                    <div class="panel-footer">
                        <span class="pull-left">Testimoni</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
	            </div>
	        </div>
	    </a>
	    <a href="{{ route('backend.home') }}/user">
	        <div class="col-xs-6 col-md-4">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <div class="row">
	                        <div class="col-xs-3">
	                            <i class="fa fa-user fa-5x"></i>
	                        </div>
	                        <div class="col-xs-9 text-right">
	                            <div class="huge">
	                            	<?php  
								         $sumber = "".route('api.adminstokjs');
								         $arr = json_decode(file_get_contents($sumber), true);
								         echo count($arr);
								    ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                    <div class="panel-footer">
                        <span class="pull-left">Admin</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
	            </div>
	        </div>
	    </a>
    </div>

@stop