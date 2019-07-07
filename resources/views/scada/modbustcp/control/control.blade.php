@extends('scada.layout.index')
@section('css')
<style type="text/css">
    .circle {
        background: green;
        width: calc(100%/2);
        height: 100px;
        border-radius: 50%;
        margin-left: calc(100%/4);
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
        @foreach($controls as $key => $val)
        <!-- Column -->
        <div class="col-sm-3">
            <div class="card">
                <div class="card-block" style="text-align: center;">
                    <
                    <div class="circle"></div>
                    <br>
                    <button type="button" class="btn btn-success .btn-lg" 
                        data-toggle="modal"       
                        data-target="#confirmModal" 
                        data-id="{{ $val->id }}"
                        data-name="{{ $val->name }}"
                        >TRUE</button>
                    <button type="button" class="btn btn-secondary .btn-lg">FALSE</button>
                    

                    <!-- onclick="gauge1.update(NewValue());" -->
                    <!-- <span class="text-info">Độ ẩm hiện tại</span> -->

                </div>

            </div>
        </div>

        @endforeach

        <!-- Modal -->
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
                        
                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Control Name: <span id="name" class="data"></span></label>
                                    <!-- <div id="name"></div> -->
                                    <input type="hidden" class="form-control" name="name" id="namedisplay" value="" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Control Name: <span id="name" class="data"></span></label>
                                <!-- <div id="name"></div> -->
                                    <input type="hidden" class="form-control" name="name" id="namedisplay" value="" >
                                </div>
                            </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Scale Value</label>
                                        <input type="text" class="form-control" name="scalevalue" placeholder="Ex: 1, 0.1, 10 ...">
                                        <small class="form-control-feedback"> This is scalevalue </small> </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Slave Id</label>
                                        <input type="text" class="form-control" name="slaveid" placeholder="Default 1">
                                        <small class="form-control-feedback"> This is slave id </small> 
                                    </div>
                                </div>
                            
                            
                            <!--/span-->
                        </div>
                        <!--/row-->
                        
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Add</button>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                <button type="button" class="btn btn-primary" id="test">Write</button>
              </div>
            </div>
          </div>
        </div>


        

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
    

    <!-- <script type="text/javascript" src="scada/js/dashboard/gauge.js"></script> -->
    <!-- <script type="text/javascript" src="scada/js/dashboard/customgauge.js"></script> -->

    <script type="text/javascript" src="scada/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="scada/js/bootstrap4.min.js"></script>
    <script type="text/javascript" src="scada/js/socket.io.dev.js"></script>


        <script>
            //var socket = io('http://localhost:6001');
            var socket = io('10.230.131.3:6001');

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

            $( "#test" ).click(function() {
                console.log("Hihi, Da emit");
                socket.emit('eventMsg','hihi');
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

            $('#name').attr("value", name);
            document.getElementById("name").innerHTML = name;
            $('#namedisplay').attr("value", name);

            //var link = e.relatedTarget;
            console.log(id);
            // var link     = e.relatedTarget(),
            modal    = $(this),
            //     id = link.data("id"),
            //     email    = link.data("email");

            modal.find("name").val(id);
            // //modal.find("#username").val(username);
            
        });
    </script>
@endsection
