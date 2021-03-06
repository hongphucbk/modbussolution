@extends('scada.layout.index')
@section('css')
<style type="text/css">
	.liquidFillGaugeText { 
		font-family: Helvetica; 
		font-weight: bold; 
	}
</style>
<script type="text/javascript" src="scada/js/dashboard/d3.min.js"></script>

@endsection
@section('content')

 <!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <a href="https://wrappixel.com/templates/monsteradmin/" class="btn pull-right hidden-sm-down btn-success"> Upgrade to Pro</a>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-sm-4">
            <div class="card">
                <div class="card-block" style="text-align: center;">
                    <svg id="fillgauge1" width="97%" height="250" ></svg>
                    <!-- onclick="gauge1.update(NewValue());" -->
                    <span class="text-info">Độ ẩm hiện tại</span>

                </div>

            </div>
        </div>

        


        <!-- Column -->
        <!-- Column -->
        
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- Row -->
    
    <!-- Row -->
    
    
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

@endsection

@section('script')
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.dev.js"></script> -->
    <script type="text/javascript" src="scada/js/dashboard/liquid.js"></script>

    <!-- <script type="text/javascript" src="scada/js/dashboard/gauge.js"></script> -->
    <!-- <script type="text/javascript" src="scada/js/dashboard/customgauge.js"></script> -->

    <script type="text/javascript" src="scada/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="scada/js/socket.io.dev.js"></script>


        <script>
            var socket = io('http://localhost:6001');
            socket.on('modbus',function(data) {
                console.log(data);
                // $('#pValue').text(data);
                //$('.cValue').text(data);
                $('#iValue'+ data.id).text(data.value);
                $('#iTime'+ data.id).text(data.time);
                if (data.id == 3) {
                	gauge1.update(data.value);
                }
                
            })
        </script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		
        });

        
    </script>
@endsection
