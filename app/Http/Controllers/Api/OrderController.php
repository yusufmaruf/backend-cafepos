<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function store(Request $request){
        //validate
        $request->validate([
            'transaction_time' => 'required',
            'kasir_id' => 'required|exists:users,id',
            'total_price' => 'required|numeric',
            'total_item' => 'required|numeric',
            'order_items' => 'required|array',
            'order_items.*.product_id' => 'required|exists:products,id',
            'order_items.*.quantity' => 'required|numeric',
            'order_items.*.total_price' => 'required|numeric',
        ]);

        //create order
        $order = Order::create([
            'transaction_time' => $request->transaction_time,
            'kasir_id' => $request->kasir_id,
            'total_price' => $request->total_price,
            'total_item' => $request->total_item,
            'payment_method' => $request->payment_method,
        ]);

        //create order item
        foreach ($request->order_items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'total_price' => $item['total_price'],
            ]);
        }

        //response
        return response()->json([
            'success' => true,
            'message' => 'Order Created'
        ], 201);
    }

}
