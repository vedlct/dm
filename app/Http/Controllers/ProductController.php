<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.product.productList');
    }

    public function create($id=false)
    {
        $categoryInfo=Category::all();
        if ($id){
            $data = Product::where('productId',$id)->first();
        }else{
            $data = false;

        }
        return view('admin.product.addProduct',compact('data','categoryInfo'));
    }

    public function store(Request $data)
    {
        $this->validate($data, [
            'productName' => 'required',

            'price' => 'required'
//            'fkcategoryId'=>'required'


        ]);


        if (!empty($data->productId))
            $product = Product::find($data->productId);
        else
            $product = new Product;

        $product->productName = $data->productName;
        $product->price= $data->price;
        $product->fkcategoryId=$data->fkcategoryId;
        $product->fkAddedBy=Auth::user()->userId;
        $product->createdAt=\Carbon\Carbon::now()->toDateTimeString();
        $product->save();

        return redirect('/product-list');
    }

    public function productTable(Request $data)
    {
        $product_data = Product::all();
        $datatables = DataTables::of($product_data);
        return $datatables->make(true);
    }
}
