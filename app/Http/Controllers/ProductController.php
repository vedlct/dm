<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id=false)
    {
        $category = Category::where('status','active')->get();
        if ($id){
            $product = Product::where('fkcategoryId',$id)->get();
        }else{
            $product = false;
        }
        return view('admin.product.productList',compact('category','product'));
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
            'price' => 'required|numeric'
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

    public function addToCart($id)
    {
        $product = Product::find($id);
        \Cart::session(Auth::user()->userId)->add(array(
            'id' => $product->productId,
            'name' => $product->productName,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array()
        ));
        return redirect('/product-list');
    }
}
