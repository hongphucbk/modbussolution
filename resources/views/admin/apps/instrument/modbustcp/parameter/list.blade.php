@extends('admin.layout.index')
@section('content')

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">MODBUS TCP</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Modbus TCP</a></li>
                    <li class="breadcrumb-item active">Parameter</li>
                </ol>
                <a href="admin/app/modbustcp/parameter/export">
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa fa-file-excel-o"></i> Parameter Export </button>
                </a>
                <a href="admin/app/modbustcp/parameter/add">
                <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button></a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Info box -->
    <!-- ============================================================== -->
    <div class="card-group">
        <!-- <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3><i class="icon-screen-desktop"></i></h3>
                                <p class="text-muted">MYNEW CLIENTS</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-primary">23</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Column -->
        <!-- Column -->
        <!-- <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3><i class="icon-note"></i></h3>
                                <p class="text-muted">NEW PROJECTS</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-cyan">169</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Column -->
        <!-- Column -->
        <!-- <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3><i class="icon-doc"></i></h3>
                                <p class="text-muted">NEW INVOICES</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-purple">157</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Column -->
        <!-- Column -->
        <!-- <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3><i class="icon-bag"></i></h3>
                                <p class="text-muted">All Device</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-success">{{get_Admin_Helpdesk_All_Category()}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!-- ============================================================== -->
    <!-- End Info box -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
	<!-- Start Page Content -->
	<!-- ============================================================== -->
	<div class="row">
	    <div class="col-12">
	        <div class="card">
	            <div class="card-body">
	                <h4 class="card-title">PARAMETER</h4>
	                <div class="table-responsive m-t-40">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('notification'))
                            <div class="alert alert-success">
                                {{session('notification')}}                         
                            </div>
                        @endif
	                    <table id="myTable" class="table table-bordered table-striped">
	                        <thead>
	                            <tr>
	                                <th>#</th>
                                    <th>Device</th>
	                                <th>Name</th>
                                    <th>Slave ID</th>
                                    <th>Register</th>
                                    <th>Scale</th>
                                    <th>Display</th>
	                                <th>Note</th>

	                                <th>Edit</th>
	                                <th>Delete</th>
	                            </tr>
	                        </thead>
	                        <tbody>
                                @foreach($parameters as $key => $val)
	                            <tr>
	                                <td>{{ $val->id }}</td>
                                    <td>{{ $val->ins_modbustcp_device->name }}</td>
                                    <td>{{ $val->name }}</td>
                                    <td>{{ $val->slaveid }}</td>
                                    <td>{{ $val->register }}</td>
                                    <td>{{ $val->scalevalue }}</td>
	                                <td>{{ $val->display }}</td>
	                                <td>{{ $val->note }}</td>

	                                <td>
                                        <a href="admin/app/modbustcp/parameter/edit/{{$val->id}}" class="btn btn-info">
                                            <span class="glyphicon glyphicon-edit"></span>
                                            <span>Edit</span>            
                                        </a>
                                    </td>
	                                <td>
                                        <a href="admin/app/modbustcp/parameter/delete/{{$val->id}}" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span>
                                            <span>Delete</span>            
                                        </a>
                                    </td>
	                            </tr>
	                            @endforeach
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	        
	    </div>
	</div>
	<!-- ============================================================== -->
	<!-- End PAge Content -->
	<!-- ============================================================== -->
</div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        });
</script>
@endsection
