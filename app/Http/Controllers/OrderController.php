<?php

namespace App\Http\Controllers;

use App\Models\Order_detail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('serve');
    }
    public function index()
    {
        $rawStatus = config('status.order');
        $status = array_flip($rawStatus);   
        $orders = Order_detail::whereIn('status',[1,2,4])->get();
        return view('kitchen.order',compact('orders','status'));
    }
    public function approve(order_detail $order_detail)
    {
        $order_detail->status = config('status.order.processing');
        $order_detail->save();
        return redirect('/order')->with('message','Order is approved');
    }
    public function cancel(order_detail $order_detail)
    {
        $order_detail->status = config('status.order.cancel');
        $order_detail->save();
        return redirect('/order')->with('message','Order is Canceled');
    }
    public function done(order_detail $order_detail)
    {
        $order_detail->status = config('status.order.ready');
        $order_detail->save();
        return redirect('/order')->with('message','Order is Ready');
    }

    public function serve(order_detail $order_detail)
    {
        $order_detail->status = config('status.order.done');
        $order_detail->save();
        return redirect('/')->with('message','Order is Served');
    }

}
