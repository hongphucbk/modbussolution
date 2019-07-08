@extends('scada.layout.index')
@section('css')
<style type="text/css">
    .circle {
        background: green;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        /*margin-left: calc(100%/4);*/
    }

    .data{
        color: blue;
    }
</style>


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
        <div class="col-md-12">
            <div class="card">
                <div class="card-block" style="text-align: center;">
                    <table style="width:100%" style="text-align: left;">
                      <tr>
                        <th style="width: 20%" rowspan="3"><div class="circle"></div></th>
                        <th style="width: 15%">Status</th>
                        <th style="width: 25%">-- Run --</th> 
                        <th style="width: 15%">Kp</th>
                        <th style="width: 25%">-- 2 --</th>
                      </tr>
                      <tr>
                        <th>Speed (RPM)</th> 
                        <th>-- 1500 --</th>
                        <th>Ki</th> 
                        <th>-- 0.1 --</th>
                      </tr>
                      <tr>
                        <th>F (Hz)</th> 
                        <th>-- 50 --</th>
                        <th>Kd</th> 
                        <th>-- 0.01 --</th>
                      </tr>
                      <tr>
                        <th></th>
                        <th>Error</th> 
                        <th>-- No --</th>
                        <th></th> 
                        <th></th>
                      </tr>
                    </table>
                </div>
            </div>
        </div>

        @foreach($controls as $key => $val)
        <!-- Column -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-block" style="text-align: center;">
                    <div style="font-weight: bold;">{{ $val->name}}</div>
                    <!-- <div class="circle"></div> -->
                    
                    <button type="button" class="btn btn-success .btn-lg" 
                        data-toggle="modal"       
                        data-target="#confirmModal" 
                        data-id="{{ $val->id }}"
                        data-name="{{ $val->name }}"
                        data-register="{{ $val->register }}"
                        data-slaveid="{{ $val->slaveid }}"
                        data-ipaddress="{{ $val->ins_modbustcp_device->IPaddress }}"
                        data-value="1"
                        >TRUE</button>
                    <button type="button" class="btn btn-secondary .btn-lg"
                        data-toggle="modal"       
                        data-target="#confirmModal" 
                        data-id="{{ $val->id }}"
                        data-name="{{ $val->name }}"
                        data-slaveid="{{ $val->slaveid }}"
                        data-register="{{ $val->register }}"
                        data-ipaddress="{{ $val->ins_modbustcp_device->IPaddress }}"
                        data-value="0"

                    >FALSE</button>

                    <!-- onclick="gauge1.update(NewValue());" -->
                    <!-- <span class="text-info">Độ ẩm hiện tại</span> -->
                </div>
            </div>
        </div>

        @endforeach
        <hr>
        <div class="col-md-12">
            <div class="card">
                <div class="card-block" style="text-align: left;">
                    <?php $total_id = ""; ?>
                    @foreach($text_controls as $key => $val)
                    <div class="col-md-3" style="display: inline-block;">
                        <label>{{ $val->name }}</label>
                        <input type="text" name="{{ $val->name }}" id="{{ $val->id }}" style="width: 100px">
                    </div>
                    @endforeach
                    
                    <!-- <div class="circle"></div> -->
                    
                    @foreach($text_controls as $key => $val)
                       <?php $total_id = $total_id.",".$val->id ?>
                    @endforeach
                    <button type="button" class="btn btn-success .btn-lg" 
                        data-toggle="modal"       
                        data-target="#confirmModal_Text" 
                        data-id="{{ $total_id }}"
                    >SEND</button>

                    <!-- onclick="gauge1.update(NewValue());" -->
                    <!-- <span class="text-info">Độ ẩm hiện tại</span> -->
                </div>
            </div>
        </div>


        <!-- Modal 1 -->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Infomation Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="form" action="admin/app/modbustcp/control/submit" method="post">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Control Name: <span id="name" class="data"></span></label>
                                    <!-- <div id="name"></div> -->
                                    <input type="hidden" class="form-control" name="name" id="namedisplay" value="" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Register: <span id="register" class="data"></span></label>
                                <!-- <div id="name"></div> -->
                                    <input type="hidden" class="form-control" name="register" id="namedisplay" value="" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Value: <span id="value" class="data"></span></label>
                                    <input type="hidden" class="form-control" name="value" id="namedisplay" value="" >
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        
                    </div>
                    <!-- <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Add</button>
                    </div> -->
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                <button type="button" class="btn btn-primary" id="write_data_button" 
                    data-send="127.0.0.1,1,40001,125"
                >Write</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Text box -->
        <div class="modal fade" id="confirmModal_Text" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Infomation Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="form" action="admin/app/modbustcp/control/submit" method="post">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row p-t-20">
                            @foreach($text_controls as $key => $val)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">{{$val->name}}: <span id="display{{$val->id}}" class="data"></span></label>
                                    <!-- <div id="name"></div> -->
                                    <input type="hidden" class="form-control" name="{{$val->id}}" id="{{$val->id}}" value="" >
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--/row-->
                        
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Write</button>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                <button type="button" class="btn btn-primary" id="write_data_text">Write</button>
              </div>
            </div>
          </div>
        </div>
    </div>
   
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
    

    <!-- <script type="text/javascript" src="scada/js/dashboard/gauge.js"></script> -->
    <!-- <script type="text/javascript" src="scada/js/dashboard/customgauge.js"></script> -->

    <script type="text/javascript" src="scada/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="scada/js/bootstrap4.min.js"></script>
    <script type="text/javascript" src="scada/js/socket.io.dev.js"></script>


        <script>
            var socket = io('http://localhost:6001');
            //var socket = io('10.230.131.3:6001');

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

            $("#write_data_button").click(function(e) {
                var button1 = $(e.relatedTarget);
                var datasend = button1.data('send');
                datasend = "127.0.0.1,1,40001,1"
                console.log("Hihi, Da emit buton " + datasend);
                socket.emit('write_data_button', datasend);
            });

            $( "#write_data_text" ).click(function() {
                console.log("Hihi, Da emit data text");
                socket.emit('write_data_text','hihi');
            });

        </script>
        <script>


        </script>
    <script>
        //alert("hihi");
        $('#confirmModal').on('shown.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var ipaddress = button.data('ipaddress');
            var register = button.data('register');
            var value = button.data('value');
            var slaveid = button.data('slaveid');


            $('#name').attr("value", name);
            $('#id').attr("id", id);
            $('#register').attr("value", register);
            $('#value').attr("value", value);

            document.getElementById("name").innerHTML = name;
            document.getElementById("register").innerHTML = register;
            document.getElementById("value").innerHTML = value;

            //var link = e.relatedTarget;
            
            var data_send = ipaddress + "," + slaveid + "," + register + "," + value;
            console.log(data_send);
            $('#write_data_button').attr("data-send", data_send);
            
            
        });

        $('#confirmModal_Text').on('shown.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var id = button.data('id');

            var array = id.split(",");
            for (i = 1; i < array.length; i++) { 
              //text += cars[i] + "<br>";
              console.log(array[i]);
              var temp = document.getElementById(array[i]).value
              document.getElementById("display"+array[i]).innerHTML = temp;
              
            }

            // var name = button.data('name');
            // var register = button.data('register');
            // var value = button.data('value');

            // ;




            // $('#name').attr("value", name);
            // $('#id').attr("id", id);
            // $('#register').attr("value", register);
            // $('#value').attr("value", value);

            // document.getElementById("name").innerHTML = name;
            // document.getElementById("register").innerHTML = register;
            // document.getElementById("value").innerHTML = value;

            //var link = e.relatedTarget;
            //console.log(id);
            //console.log(array);
            // var link     = e.relatedTarget(),
            // modal    = $(this),
            // //     id = link.data("id"),
            // //     email    = link.data("email");

            // modal.find("name").val(id);
            // //modal.find("#username").val(username);
            
        });
    </script>
@endsection
