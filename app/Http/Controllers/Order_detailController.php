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
        $tables = Table::all();
        $dishes = Dish::orderBy('id','desc')->get();
        //  dd($dishes);
        return view('order_form',[
            'dishes' => $dishes,
            'tables' => $tables,
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
                $order_detail->status = 1;
                $order_detail->order_id = $order->id;
                $order_detail->save();
            }
        }
        return redirect('/')->with('message','Order is successfully ordered');
    }
}
