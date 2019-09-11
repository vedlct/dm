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
                @if(!empty($category))
                    @foreach($category as $categories)
                    <div class="col-md-1 col-sm-6 col-xs-12">
                        <a href="{{url('/product-list/'.$categories->id)}}" >
                            {{--<div class="info-box">--}}
                                {{--<div class="info-box-content">--}}
                                    {{--<span class="info-box-text">{{$categories->categoryName}}</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="box-footer" style="background-color: #3C8DBC;">
                                <button type="submit" class="btn btn-primary" style="border: none;text-align: center;background-color:#3C8DBC;">{{$categories->categoryName}}</button>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @endif
            </div>

            @if (session('message'))
                <div class="alert alert-danger" role="alert">
                    {{ session('message') }}
                </div>
            @endif
          <div class="row" style="margin-top: 1%;">
              <div class="col-md-12">
                  <!-- MAP & BOX PANE -->
                  <div class="box box-success">
                      <div class="box-header with-border">
                          <h3 class="box-title">products</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body no-padding">
                          <div class="row">
                              @if($product)
                                  @foreach($product as $products)
                                      {{--<div class="col-md-2 col-sm-6 col-xs-12">--}}
                                          {{--<div class="info-box bg-yellow">--}}
                                              {{--<div class="info-box-content">--}}
                                                  {{--<span class="info-box-text">{{$products->productName}}</span>--}}
                                                  {{--<span>{{$products->productShortDescription}}</span>--}}
                                                  {{--<span class="info-box-number">{{$products->price}}<small>%</small></span>--}}
                                                  {{--<a href="{{url('/add-to-cart/'.$products->productId)}}">--}}
                                                    {{--<i class="ion ion-ios-cart-outline fa-2x" style="color: white;float: right;margin-top: 1%;"></i>--}}
                                                  {{--</a>--}}
                                              {{--</div>--}}
                                          {{--</div>--}}
                                      {{--</div>--}}
                                      <div class="col-lg-2 col-xs-6">
                                          <!-- small box -->
                                          <div class="small-box bg-aqua">
                                              <div class="inner">
                                                  <h4>{{$products->productName}}</h4>

                                                  <p>{{$products->productShortDescription}}</p>
                                                  <a href="{{url('/add-to-cart/'.$products->productId)}}">
                                                      <i class="ion ion-ios-cart-outline fa-2x" style="color: white;float: right;margin-top: -7%;"></i>
                                                  </a>
                                              </div>
                                              {{--<a href="{{url('/add-to-cart/'.$products->productId)}}">--}}
                                              {{--<i class="ion ion-ios-cart-outline fa-2x" style="color: white;float: right;margin-top: 1%;"></i>--}}
                                              {{--</a>--}}

                                          </div>
                                      </div>
                                  @endforeach
                              @endif
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

