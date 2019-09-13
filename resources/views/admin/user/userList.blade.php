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
                                        <table id="userTable" class="table table-bordered table-striped dataTable" role="grid" ></table>
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
            $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax:{
                    "url": "{!! route('user.table')!!}",
                    "type": "POST",
                    data:function (d){
                        d._token="{{csrf_token()}}";
                    },
                },
                columns: [

                    { data: 'userId',title:'User ID', name: 'userId',"orderable": false, "searchable":true },
                    { data: 'name',title:'User Name', name: 'name',"orderable": true, "searchable":true },
                    { data: 'email',title:'Email', name: 'email',"orderable": true, "searchable":true },
                    { data: 'created_at',title:'created_at', name: 'created_at',"orderable": true, "searchable":true },



                ],
            });
        });


    </script>
@endsection
