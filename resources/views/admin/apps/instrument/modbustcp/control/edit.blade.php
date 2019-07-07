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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Modbus TCP</li>
                </ol>
                <a href="admin/app/modbustcp/parameter">
                <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Home</button></a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
	<!-- Start Page Content -->
	<!-- ============================================================== -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">EDIT PARAMETER </h4>
                </div>
                <div class="card-body">
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
                    <form action="admin/app/modbustcp/parameter/edit/{{ $parameter->id }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <h3 class="card-title">Edit parameter <span style="color: blue">{{$parameter->name}}</span></h3>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-3" >
                                    <label class="col-sm-12">Device</label>
                                    <select class="form-control" name="device_id">
                                        @foreach($devices as $key => $val)
                                            <option value="{{$val->id}}" 
                                                @if($val->id == $parameter->device_id)
                                                    selected=""
                                                @endif

                                                >{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Parameter Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Parameter name ..." value="{{ $parameter->name }}">
                                        <small class="form-control-feedback"> This is parameter name </small> </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Register</label>
                                        <input type="text" class="form-control" name="register" placeholder="Register ..." value="{{ $parameter->register }}">
                                        <small class="form-control-feedback"> This is register </small> </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Scale Value</label>
                                        <input type="text" class="form-control" name="scalevalue" placeholder="Ex: 1, 0.1, 10 ..." value="{{ $parameter->scalevalue }}">
                                        <small class="form-control-feedback"> This is scalevalue </small> </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Slave Id</label>
                                        <input type="text" class="form-control" name="slaveid" placeholder="Default 1" value="{{ $parameter->slaveid }}">
                                        <small class="form-control-feedback"> This is slave id </small> 
                                    </div>
                                </div>
                                <div class="col-md-3" >
                                    <label class="col-sm-12">Display</label>
                                    <select class="form-control" name="display">
                                        @if($parameter->device_id = 1)
                                            <option value="1">Yes</option>
                                            <option value="0">No display</option>
                                        @else
                                            <option value="0">No display</option>
                                            <option value="1">Yes</option>
                                        @endif
                                        
                                        
                                    </select>
                                </div>
                                <!--/span-->
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="control-label">Note</label>
                                        <input type="text" id="note" class="form-control form-control-danger" name="note" placeholder="Note ..." value="{{ $parameter->note }}">
                                        <small class="form-control-feedback"> You can input your note </small> </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Edit</button>
                        </div>
                    </form>
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
