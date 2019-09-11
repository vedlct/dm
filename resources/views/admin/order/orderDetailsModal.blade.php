<div class="box-body no-padding">
    <table class="table table-striped">
        @if(!empty($details))
        <tr>
            <th style="width: 10px">#</th>
            <th>Product Name</th>
            <th>Price</th>
        </tr>
        @foreach ($details as $data)
        <tr>
            <td style="width: 10px">{{$data->fkproductId}}</td>
            <td>{{$data->productName}}</td>
            <td>{{$data->price}}</td>
        </tr>
        @endforeach
        @endif
    </table>
</div>
