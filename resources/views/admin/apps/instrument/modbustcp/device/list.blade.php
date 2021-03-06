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
                    <li class="breadcrumb-item active">Device</li>
                </ol>
                <a href="admin/app/modbustcp/device/export">
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa fa-file-excel-o"></i> Export Device</button>
                </a>
                <a href="admin/app/modbustcp/device/add">
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
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3><i class="icon-screen-desktop"></i></h3>
                                <p class="text-muted">All Parameter</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-primary">{{get_Count_All_Parameter()}}</h2>
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
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3><i class="icon-note"></i></h3>
                                <p class="text-muted">All Control</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-cyan">{{ get_Count_All_Control() }}</h2>
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
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3><i class="icon-doc"></i></h3>
                                <p class="text-muted">All Records</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-purple">{{ get_Count_All_Record() }}</h2>
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
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3><i class="icon-bag"></i></h3>
                                <p class="text-muted">All Device</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-success">{{get_Count_All_Device()}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="10"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
	                <h4 class="card-title">DEVICES</h4>
	                <div class="table-responsive m-t-10">
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
	                                <th>Name</th>
                                    <th>IP address</th>
                                    <th>Display</th>
	                                <th>Note</th>

	                                <th>Edit</th>
	                                <th>Delete</th>
	                            </tr>
	                        </thead>
	                        <tbody>
                                @foreach($devices as $key => $val)
	                            <tr>
	                                <td>{{ $val->id }}</td>
                                    <td>{{ $val->name }}</td>
                                    <td>{{ $val->IPaddress }}</td>
	                                <td>{{ $val->display }}</td>
	                                <td>{{ $val->note }}</td>

	                                <td>
                                        <a href="admin/app/modbustcp/device/edit/{{$val->id}}" class="btn btn-info">
                                            <span class="glyphicon glyphicon-edit"></span>
                                            <span>Edit</span>            
                                        </a>
                                    </td>
	                                <td>
                                        <a href="admin/app/modbustcp/device/delete/{{$val->id}}" class="btn btn-danger">
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
