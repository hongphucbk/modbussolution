@extends('scada.layout.index')
@section('css')


@endsection
@section('content')

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0"><a href="scada/modbustcp/realtime"> VALUE</a></h3>
            <!-- <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol> -->
        </div>
        <!-- <div class="col-md-6 col-4 align-self-center">
            <a href="https://wrappixel.com/templates/monsteradmin/" class="btn pull-right hidden-sm-down btn-success"> Upgrade to Pro</a>
        </div> -->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-block">
                    <!-- <h4 class="card-title">Basic Table</h4>
                    <h6 class="card-subtitle">Add class <code>.table</code></h6>
                    @foreach($parameters as $key => $val)
                        {{ $val->name }} 

                    @endforeach -->
                    
                    <div class="table-responsive">
                        <table id="table_id" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Device Name</th>
                                    <th>Parameter Name</th>
                                    <th>Value</th>
                                    <th>Time</th>

                                    <!-- <th>Edit</th>
                                    <th>Delete</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($parameters as $key => $val)
                                <tr>
                                    <td>{{ $val->id }}</td>
                                    <td>{{ $val->ins_modbustcp_device->name }}</td>
                                    <td>{{ $val->name }}</td>
                                    <td id="iValue{{ $val->id }}" class="cValue"></td>
                                    <td id="iTime{{ $val->id }}"></td>
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
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.dev.js"></script> -->
    <script type="text/javascript" src="scada/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="scada/js/socket.io.dev.js"></script>

        <script>
            //var socket = io('http://localhost:6001');
            var socket = io('127.0.0.1:6001');
            socket.on('modbus',function(data) {
                console.log(data);
                // $('#pValue').text(data);
                //$('.cValue').text(data);
                $('#iValue'+ data.id).text(data.value);
                $('#iTime'+ data.id).text(data.time);
            })
        </script>

@endsection
