@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-lg-6 col-xs-6">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Product</h3>
                        </div>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">{{$error}}</div>
                            @endforeach
                        @endif
                        <form role="form" method="post" action="{{route('product.submit')}}">
                            @csrf
                            <div class="box-body">
                                @if($data)
                                    <input type="hidden" name="productId" value="{{$data->productId}}">
                                @endif
                                <div class="form-group">
                                    <label for="categoryName">Product Name</label>
                                    <input type="text" class="form-control" name="productName" id="productName" placeholder="Enter product name" @if($data)value="{{$data->productName}}" @endif >
                                </div>
                                    <div class="form-group">
                                        <label for="categoryName">Product Price</label>
                                        <input type="text" class="form-control" name="price" id="price" placeholder="Enter product price" @if($data)value="{{$data->price}}" @endif >
                                    </div>
                                <div class="form-group">
                                    <label for="status">Category</label>
                                    <select class="form-control" id="status" name="fkcategoryId" >
                                        <option value="">Select Category</option>
                                        @foreach($categoryInfo as $aC)
                                            <option @if($data && $data->fkcategoryId==$aC->id) selected @endif value="{{$aC->id}}">{{$aC->categoryName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
