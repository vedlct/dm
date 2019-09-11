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
    <script>
        $(document).ready(function() {
            $('#orderTable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax:{
                    "url": "{!! route('allOrders')!!}",
                    "type": "POST",
                    data:function (d){
                        d._token="{{csrf_token()}}";
                    },
                },
                columns: [

                    { data: 'orderId',title:'Order ID', name: 'orderId',"orderable": true, "searchable":true },
                    { data: 'name',title:'Order BY', name: 'name',"orderable": true, "searchable":true },
                    { data: 'orderStatus',title:'Status', name: 'orderStatus',"orderable": true, "searchable":true },
                    { data: 'paymentMethod',title:'Payment Method', name: 'paymentMethod',"orderable": true, "searchable":true },
                    { data: 'paymentStatus',title:'Payment Status', name: 'paymentStatus',"orderable": true, "searchable":true },
                    { data: 'orderAt',title:'Order At', name: 'orderAt',"orderable": false, "searchable":true },

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
    </script>
@endsection
