@extends('layouts.app')

@section('content')

    <div class="content-wrapper">
        <section class="content">
            <!-- Small boxes (Stat box) -->
            {{--<div class="row">--}}
                {{--@if(!empty($category))--}}
                    {{--@foreach($category as $categories)--}}
                    {{--<div class="col-md-1 col-sm-6 col-xs-12">--}}
                        {{--<a href="{{url('/product-list/'.$categories->id)}}" >--}}
                            {{--<div class="box-footer" style="background-color: #3C8DBC;">--}}
                                {{--<button type="submit" class="btn btn-primary btn-xs" style="border: none;text-align: center;background-color:#3C8DBC;">{{$categories->categoryName}}</button>--}}

                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--@endforeach--}}
                {{--@endif--}}
            {{--</div>--}}
            <div class="row" style="margin-left: 1%;">
                <div class="timeline-footer">
                    @if(!empty($category))
                        @foreach($category as $categories)
                    <a href="{{url('/product-list/'.$categories->id)}}" class="btn btn-primary btn-lg">{{$categories->categoryName}}</a>
                        @endforeach
                    @endif
                </div>

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

