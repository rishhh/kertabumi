@extends('adminstok')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" align="center">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
    		
	    <a href="{{ route('adminstok.home') }}/stokbajubatik">
	        <div class="col-xs-6 col-md-4">
	            <div class="panel panel-danger">
	                <div class="panel-heading">
	                    <div class="row">
	                        <div class="col-xs-3">
	                            <i class="fa fa-tasks fa-5x"></i>
	                        </div>
	                        <div class="col-xs-9 text-right">
	                            <div class="huge">
	                            	<?php  
								         $sumber = "".route('api.stokbajubatikjs');
								         $arr = json_decode(file_get_contents($sumber), true);
								         echo count($arr);
								    ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                    <div class="panel-footer">
                        <span class="pull-left">Stok Batik</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
	            </div>
	        </div>
	    </a>
	    <a href="{{ route('adminstok.home') }}/stokkain">
	        <div class="col-xs-6 col-md-4">
	            <div class="panel panel-danger">
	                <div class="panel-heading">
	                    <div class="row">
	                        <div class="col-xs-3">
	                            <i class="fa fa-tasks fa-5x"></i>
	                        </div>
	                        <div class="col-xs-9 text-right">
	                            <div class="huge">
	                            	<?php  
								         $sumber = "".route('api.stokkainjs');
								         $arr = json_decode(file_get_contents($sumber), true);
								         echo count($arr);
								    ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                    <div class="panel-footer">
                        <span class="pull-left">Stok Kain</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
	            </div>
	        </div>
	    </a>
	    
    </div>

@endsection