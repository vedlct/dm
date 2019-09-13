@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
@endsection
@section('content')
    @if(Auth::user()->type->userTypeName==='admin')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="productTable" class="table table-bordered table-striped dataTable" role="grid" ></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productTable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax:{
                    "url": "{!! route('product.table')!!}",
                    "type": "POST",
                    data:function (d){
                        d._token="{{csrf_token()}}";
                    },
                },
                columns: [

                    { data: 'productId',title:'Product ID', name: 'productId',"orderable": false, "searchable":true },
                    { data: 'productName',title:'Product Name', name: 'productName',"orderable": true, "searchable":true },
                    { data: 'productShortDescription',title:'Product Description', name: 'productShortDescription',"orderable": true, "searchable":true },

                    { title:'Action',"data": function(data){
                        return '<button class="btn btn-sm btn-info" onclick="productedit('+data.productId+')"><i class="fa fa-edit"></i></button>'
                            ;},
                        "orderable": false, "searchable":false
                    },


                ],
            });
        });

        function productedit(id) {
            {{--            window.open({{url('/category-add')}}+id);--}}
                window.location.href = '{{url('/product-add')}}/'+id;
        }
    </script>
@endsection


    @endif
    <div class="content-wrapper">
        <section class="content">
            <div class="row" style="margin-left: 1%;">
                <div class="timeline-footer">
                    @if(!empty($category))
                        @foreach($category as $categories)
                    <a href="{{url('/product-list/'.$categories->id)}}" class="btn btn-primary btn-lg">{{$categories->categoryName}}</a>
                        @endforeach
                    @endif
                </div>
              <br>

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
                      {{--<div class="box-body no-padding">--}}
                          {{--<div class="row">--}}
                              {{--@if($product)--}}
                                  {{--@foreach($product as $products)--}}
                                      {{--<div class="col-lg-2 col-xs-6">--}}
                                          {{--<!-- small box -->--}}
                                          {{--<div class="small-box bg-aqua">--}}
                                              {{--<div class="inner">--}}
                                                  {{--<h4>{{$products->productName}}</h4>--}}

                                                  {{--<p>{{$products->productShortDescription}}</p>--}}
                                                  {{--<a href="{{url('/add-to-cart/'.$products->productId)}}">--}}
                                                      {{--<i class="ion ion-ios-cart-outline fa-2x" style="color: white;float: right;margin-top: -7%;"></i>--}}
                                                  {{--</a>--}}
                                              {{--</div>--}}

                                          {{--</div>--}}
                                      {{--</div>--}}

                                  {{--@endforeach--}}
                              {{--@endif--}}
                          {{--</div>--}}
                          {{--<!-- /.row -->--}}
                      {{--</div>--}}
                      <!-- /.box-body -->
                      <div class="row">
                          @if($product)
                              @foreach($product as $products)
                          <div class="col-md-2">
                              <div class="box-body">
                                  <div class="alert alert-info alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <h4>{{$products->productName}}</h4>
                                      <span>{{$products->productShortDescription}}</span>
                                      <a href="{{url('/add-to-cart/'.$products->productId)}}"><i class="ion ion-ios-cart-outline fa-2x" style="color: white;float: right;"></i></a>
                                  </div>

                              </div>

                          </div>
                              @endforeach
                              @endif

                      </div>
                  </div>
              </div>
          </div>
        </section>

    </div>

@endsection

