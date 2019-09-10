@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-lg-8 col-xs-6">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Category</h3>
                        </div>

                        <form role="form" method="post" action="#">

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="categoryName">Category Name</label>
                                    <input type="text" class="form-control" name="categoryName" id="categoryName" placeholder="Enter category name"  >
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="categoryName">Category Name</label>
                                    <input type="text" class="form-control" name="categoryName" id="categoryName" placeholder="Enter category name"  >
                                </div>
                            </div>


                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Cart History</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td>Update software</td>
                                    <td>
                                        BDT 100
                                    </td>

                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Clean database</td>
                                    <td>
                                        BDT 100
                                    </td>

                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Cron job running</td>
                                    <td>
                                        BDT 100
                                    </td>

                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Fix and squish bugs</td>
                                    <td>
                                      BDT 100
                                    </td>

                                </tr>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
