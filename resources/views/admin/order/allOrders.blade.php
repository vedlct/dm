@extends('layouts.app')


@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{url('/public/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class=" col-md-5">
                    <div class="form-group">
                        <label>Date range:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
{{--                            {{\Carbon\Carbon::now()->subMonth()->isoFormat('MM/DD/YYYY').' - '.\Carbon\Carbon::now()->isoFormat('MM/DD/YYYY')}}--}}
                            <input type="text" class="form-control pull-right date" id="reservation" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="orderTable" class="table table-bordered table-striped dataTable" role="grid" ></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="orderDetails-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Order Details</h4>
                </div>
                <div class="modal-body" id="orderDetails"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="{{url('/public/bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{url('/public/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script>

        $(function () {
            $('#reservation').daterangepicker()
        });
        $(document).ready(function() {
            table = $('#orderTable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax:{
                    "url": "{!! route('allOrders')!!}",
                    "type": "POST",
                    "data":function (d){
                        d._token="{{csrf_token()}}";
                        d.dd=$('#reservation').val();
                    },
                },
                columns: [

                    { data: 'orderId',title:'Order ID', name: 'orderId',"orderable": true, "searchable":true },
                    { data: 'name',title:'Order BY', name: 'name',"orderable": true, "searchable":true },
                    { data: 'orderStatus',title:'Status', name: 'orderStatus',"orderable": true, "searchable":true },
                    { data: 'paymentMethod',title:'Payment Method', name: 'paymentMethod',"orderable": true, "searchable":true },
                    { data: 'paymentStatus',title:'Payment Status', name: 'paymentStatus',"orderable": true, "searchable":true },
                    { data: 'orderdate',title:'Order At', name: 'orderdate',"orderable": false, "searchable":true },

                    { title:'Action',"data": function(data){
                            return '<button class="btn btn-sm btn-info" onclick="orderView('+data.orderId+')"><i class="fa fa-eye"></i></button>'
                                ;},
                        "orderable": false, "searchable":false
                    },
                ],
            });
        });

        function orderView(id) {
            $.ajax({
                type: 'POST',
                url: "{{ url('/order-details') }}",
                cache: false,
                data: {_token: "{{csrf_token()}}",orderId:id},
                success: function (data) {
                    $('#orderDetails').html(data);
                    $('#orderDetails-modal').modal();
                }
            });
        }

        $('#reservation').change(function(){
            table.ajax.reload();
        });
    </script>
@endsection
