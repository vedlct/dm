@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-lg-6 col-xs-6">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Category</h3>
                        </div>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">{{$error}}</div>
                            @endforeach
                        @endif
                        <form role="form" method="post" action="{{route('category.submit')}}">
                            @csrf
                            <div class="box-body">
                                @if($data)
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                @endif
                                <div class="form-group">
                                    <label for="categoryName">Category Name</label>
                                    <input type="text" class="form-control" name="categoryName" id="categoryName" placeholder="Enter category name" @if($data)value="{{$data->categoryName}}" @endif >
                                </div>
                                <div class="form-group">
                                    <label for="status">Password</label>
                                    <select class="form-control" id="status" name="status" >
                                        <option value="">Select status</option>
                                        <option value="active" @if($data && $data->status=='active')selected @endif >Active</option>
                                        <option value="deactive" @if($data && $data->status=='deactive')selected @endif >Deactive</option>
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
