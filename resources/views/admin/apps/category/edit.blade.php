@extends('admin.layout.index')
@section('content')

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Category</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Category</li>
                </ol>
                <a href="admin/app/category/add">
                <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button></a>
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
                    <h4 class="m-b-0 text-white">CATEGORY</h4>
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
                    <form action="admin/app/category/edit/{{$category->id}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <h3 class="card-title">Edit category <span style="color: blue">{{$category->name}}</span></h3>
                            <hr> 
                            <div class="row p-t-20">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">Category Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Category name ..." value="{{$category->name}}">
                                        <small class="form-control-feedback"> This is category name </small> </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="control-label">Note</label>
                                        <input type="text" id="note" class="form-control form-control-danger" name="note" placeholder="Note ..." value="{{$category->note}}">
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


@endsection
