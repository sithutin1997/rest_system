<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Table;
use App\Models\Order_detail;
use Illuminate\Http\Request;

class Order_detailController extends Controller
{
    public function index()
    {
        $rawStatus = config('status.order');
        $status = array_flip($rawStatus);   
        $orders = Order_detail::where('status',4)->get();
        $tables = Table::all();
        $dishes = Dish::orderBy('id','desc')->get();
        return view('order_form',[
            'dishes' => $dishes,
            'tables' => $tables,
            'orders' => $orders,
            'status' => $status,
        ]);
        
    }

    public function submit(Request $request)
    {
        $data = $request->all();
        $order=new Order();
        $order->table_id = $request->table;
        $order->save();
        // dd($order);
        foreach($data['item'] as $order_det)
        {
            if(!($order_det['qty'] == 0))
            {
                $order_detail = new Order_detail();
                $order_detail->quantity = $order_det['qty'];
                $order_detail->dish_id = $order_det['dish_id'];
                $order_detail->status = config('status.order.new');
                $order_detail->order_id = $order->id;
                $order_detail->save();
            }
        }
        return redirect('/')->with('message','Order is successfully ordered');
    }
}
