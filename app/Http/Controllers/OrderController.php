<?php

namespace App\Http\Controllers;
use DB;
use App\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function manageOrders() {
        $orders = DB::table('orders')
            ->join('customers', 'customers.id', '=', 'orders.customerId')
            ->select('orders.*','customers.firstName','customers.lastName')
            ->get();
        return view('admin.order.manageOrders',['orders'=>$orders]);
    }
    public function orderPending($id) {
        $this->checkAuth();
        $orderInfo = Order::find($id);
        $orderInfo->orderStatus = 0;
        $orderInfo->save();
        return redirect()->back();
    }
    public function orderPlaced($id) {
        $this->checkAuth();
        $orderInfo = Order::find($id);
        $orderInfo->orderStatus = '1';
        $orderInfo->save();
        return redirect()->back();
    }
    public function orderView($id) {
        $orderInfoById = DB::table('orders')
                        ->join('customers','orders.customerId','=','customers.id')
                        ->join('payments','orders.id','=','payments.orderId')
                        ->where('orders.id',$id)
                        ->select('orders.*','customers.*','payments.paymentType')
                        ->first();
        
        $shippingInfoById = DB::table('orders')
                        ->join('shippings','orders.shippingId','=','shippings.id')
                        ->where('orders.id',$id)
                        ->select('orders.id','shippings.*')
                        ->first();
        $orderDetails = DB::table('order_details')
                        ->where('orderId',$id)
                        ->get();
        
        return view('admin.order.orderView',['orderInfoById'=>$orderInfoById,'shippingInfoById'=>$shippingInfoById,'orderDetails'=>$orderDetails]);
    }
    public function checkAuth() {
         $admin_id = Session::get('admin_id');
         if($admin_id == NULL){
             return Redirect::to('/admin')->send();
         }
    }
}
