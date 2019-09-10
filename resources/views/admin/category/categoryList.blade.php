@extends('layouts.app')


@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
@endsection

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
                                        <table id="categoryTable" class="table table-bordered table-striped dataTable" role="grid" ></table>
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
            $('#categoryTable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax:{
                    "url": "{!! route('category.table')!!}",
                    "type": "POST",
                    data:function (d){
                        d._token="{{csrf_token()}}";
                    },
                },
                columns: [

                    { data: 'id',title:'Category ID', name: 'id',"orderable": false, "searchable":true },
                    { data: 'categoryName',title:'Category Name', name: 'categoryName',"orderable": true, "searchable":true },
                    { data: 'status',title:'Category Status', name: 'status',"orderable": true, "searchable":true },

                    { title:'Action',"data": function(data){
                            return '<button class="btn btn-sm btn-info" onclick="categoryedit('+data.id+')"><i class="fa fa-edit"></i></button>'
                                ;},
                        "orderable": false, "searchable":false
                    },


                ],
            });
        });

        function categoryedit(id) {
{{--            window.open({{url('/category-add')}}+id);--}}
            window.location.href = '{{url('/category-add')}}/'+id;
        }
    </script>
@endsection
