{{--@extends('layouts.app')--}}


{{--@section('css')--}}
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">--}}
{{--@endsection--}}

{{--@section('content')--}}
    {{--<div class="content-wrapper">--}}
        {{--<section class="content">--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-12 col-xs-12">--}}
                    {{--<div class="box">--}}
                        {{--<div class="box-body">--}}
                            {{--<div class="dataTables_wrapper form-inline dt-bootstrap">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-sm-12">--}}
                                        {{--<table id="categoryTable" class="table table-bordered table-striped dataTable" role="grid" ></table>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}
    {{--</div>--}}
{{--@endsection--}}

{{--@section('js')--}}
    {{--<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>--}}
    {{--<script>--}}
        {{--$(document).ready(function() {--}}
            {{--$('#categoryTable').DataTable({--}}
                {{--processing: true,--}}
                {{--serverSide: true,--}}
                {{--stateSave: true,--}}
                {{--ajax:{--}}
                    {{--"url": "{!! route('product.table')!!}",--}}
                    {{--"type": "POST",--}}
                    {{--data:function (d){--}}
                        {{--d._token="{{csrf_token()}}";--}}
                    {{--},--}}
                {{--},--}}
                {{--columns: [--}}

                    {{--{ data: 'productId',title:'Product ID', name: 'productId',"orderable": false, "searchable":true },--}}
                    {{--{ data: 'productName',title:'Product Name', name: 'productName',"orderable": true, "searchable":true },--}}
                    {{--{ data: 'price',title:'Price', name: 'price',"orderable": true, "searchable":true },--}}

                    {{--{ title:'Action',"data": function(data){--}}
                        {{--return '<button class="btn btn-sm btn-info" onclick="productedit('+data.productId+')"><i class="fa fa-edit"></i></button>'--}}
                            {{--;},--}}
                        {{--"orderable": false, "searchable":false--}}
                    {{--},--}}


                {{--],--}}
            {{--});--}}
        {{--});--}}

        {{--function productedit(id) {--}}
            {{--            window.open({{url('/category-add')}}+id);--}}
                {{--window.location.href = '{{url('/product-add')}}/'+id;--}}
        {{--}--}}
    {{--</script>--}}
{{--@endsection--}}

@extends('layouts.app')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="info-box bg-yellow">

                        <div class="info-box-content">
                            <span class="info-box-text">CPU Traffic</span>
                            <span class="info-box-number">90<small>%</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="info-box  bg-green">

                        <div class="info-box-content">
                            <span class="info-box-text">Likes</span>
                            <span class="info-box-number">41,410</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="info-box  bg-red">

                        <div class="info-box-content">
                            <span class="info-box-text">Sales</span>
                            <span class="info-box-number">760</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="info-box  bg-blue">

                        <div class="info-box-content">
                            <span class="info-box-text">New Members</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="info-box bg-aqua">

                        <div class="info-box-content">
                            <span class="info-box-text">New Members</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="info-box bg-red">


                        <div class="info-box-content">
                            <span class="info-box-text">New Members</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>


          <div class="row">
              <div class="col-md-12">
                  <!-- MAP & BOX PANE -->
                  <div class="box box-success">
                      <div class="box-header with-border">
                          <h3 class="box-title">products</h3>

                          <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body no-padding">
                          <div class="row">

                              <!-- /.col -->
                              <div class="col-md-2 col-sm-6 col-xs-12">
                                  <div class="info-box bg-yellow">

                                      <div class="info-box-content">
                                          <span class="info-box-text">CPU Traffic</span>
                                          <span class="info-box-number">90<small>%</small></span>
                                          <i class="ion ion-ios-cart-outline fa-2x" style="color: white;float: right;margin-top: 1%;"></i>
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                              <div class="col-md-2 col-sm-6 col-xs-12">
                                  <div class="info-box bg-aqua">

                                      <div class="info-box-content">
                                          <span class="info-box-text">Likes</span>
                                          <span class="info-box-number">41,410</span>
                                          <i class="ion ion-ios-cart-outline fa-2x" style="color: white;float: right;margin-top: 1%;"></i>
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>
                              <!-- /.col -->

                              <!-- fix for small devices only -->
                              <div class="clearfix visible-sm-block"></div>

                              <div class="col-md-2 col-sm-6 col-xs-12">
                                  <div class="info-box bg-red">

                                      <div class="info-box-content">
                                          <span class="info-box-text">Sales</span>
                                          <span class="info-box-number">760</span>
                                          <i class="ion ion-ios-cart-outline fa-2x" style="color: white;float: right;margin-top: 1%;"></i>
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                              <div class="col-md-2 col-sm-6 col-xs-12">
                                  <div class="info-box bg-green">

                                      <div class="info-box-content">
                                          <span class="info-box-text">New Members</span>
                                          <span class="info-box-number">2,000</span>
                                          <i class="ion ion-ios-cart-outline fa-2x" style="color: white;float: right;margin-top: 1%;"></i>
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>

                              <div class="col-md-2 col-sm-6 col-xs-12">
                                  <div class="info-box bg-blue">

                                      <div class="info-box-content">
                                          <span class="info-box-text">New Members</span>
                                          <span class="info-box-number">2,000</span>
                                          <i class="ion ion-ios-cart-outline fa-2x" style="color: white;float: right;margin-top: 1%;"></i>
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>

                              <div class="col-md-2 col-sm-6 col-xs-12">
                                  <div class="info-box bg-aqua">


                                      <div class="info-box-content">
                                          <span class="info-box-text">New Members</span>
                                          <span class="info-box-number">2,000</span>
                                          <i class="ion ion-ios-cart-outline fa-2x" style="color: white;float: right;margin-top: 1%;"></i>
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>
                          </div>
                          <!-- /.row -->
                      </div>
                      <!-- /.box-body -->
                  </div>


                  <!-- /.box -->
              </div>
          </div>
        </section>


    </div>

@endsection

