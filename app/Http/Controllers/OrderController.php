<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetails;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public  function index(){
        return view('admin.order.checkout');
    }

    public function orderConfirm(Request $data)
    {
        $this->validate($data, [
            'paymentMethod' => 'required',
            'paymentStatus' => 'required'
        ]);

        $Order = new Order;
        $Order->fkOrderBy = Auth::user()->userId;
        $Order->subTotal = \Cart::session(Auth::user()->userId)->getSubTotal();
        $Order->orderStatus = 'Confirm';
        $Order->paymentMethod = $data->paymentMethod;
        $Order->paymentStatus = $data->paymentStatus;
        $Order->orderAt = \Carbon\Carbon::now()->toDateTimeString();
        $Order->save();

        if(!\Cart::session(Auth::user()->userId)->isEmpty()){
            foreach (\Cart::session(Auth::user()->userId)->getContent() as $cartData){
                $OrderDetails = new OrderDetails;
                $OrderDetails->fkOrderId = $Order->orderId;
                $OrderDetails->fkproductId = $cartData->id;
                $OrderDetails->save();
            }
            \Cart::session(Auth::user()->userId)->clear();
        }

        return redirect('/home');
    }

    public function orders()
    {
        return view('admin.order.allOrders');
    }

    public function allorders(Request $data)
    {
        $order_data = Order::leftjoin('user','user.userId', '=', 'order.fkOrderBy')->get();
        $datatables = DataTables::of($order_data);
        return $datatables->make(true);
    }

    public function orderDetails(Request $data)
    {
        $details = OrderDetails::where('fkOrderId',$data->orderId)->leftjoin('product','product.productId', '=', 'orderdetails.fkproductId')->get();
        return view('admin.order.orderDetailsModal',compact('details'));
    }
}
