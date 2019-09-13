<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        if (Auth::user()->type->userTypeName==='admin') {
            $categoryInfo=Category::all();
            if ($id){
                $data = Product::where('productId',$id)->first();
            }else{
                $data = false;
            }
            return view('admin.product.addProduct',compact('data','categoryInfo'));
        }else{
            return redirect('/home');
        }
    }

    public function store(Request $data)
    {
        if (Auth::user()->type->userTypeName==='admin') {
            $this->validate($data, [
                'productName' => 'required',
                'price' => 'required|numeric'
            ]);

            if (!empty($data->productId))
                $product = Product::find($data->productId);
            else
                $product = new Product;

            $product->productName = $data->productName;
            $product->productShortDescription = $data->productShortDescription;
            $product->price = $data->price;
            $product->fkcategoryId = $data->fkcategoryId;
            $product->fkAddedBy = Auth::user()->userId;
            $product->createdAt = Carbon::now()->toDateTimeString();
            $product->save();

            return redirect('/product-list');
        }
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        $c= \Cart::session(Auth::user()->userId)->getContent()->where('id',$product->productId)->toArray();

        if (empty($c)){
            \Cart::session(Auth::user()->userId)->add(array(
                'id' => $product->productId,
                'name' => $product->productName,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => array()
            ));
            return redirect()->back();
        }else{
            return redirect()->back()->with(['message'=>'Product is al ready added to cart.']);
        }
    }
}
