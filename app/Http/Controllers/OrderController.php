<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderDetailCreateRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $orderDetails = OrderDetail::all();

        return view('admin.order.index', compact('orders', 'orderDetails'));
    }

    public function create()
    {
        $users = User::all();
        $products = Product::all();

        return view('admin.order.create', compact('users', 'products'));
    }

    public function store(OrderDetailCreateRequest $request)
    {
        $request->except('_token', 'method');

        $order = new Order();
        $order->order_date = now();
        $order->save();

        // foreach ($items as $item) {
        //     OrderDetail::insert([
        //         'order_id' =>  $order->id,
        //         'user_name' => $request->user_name,
        //         'email' => $request->email,
        //         'phone_number' => $request->phone_number,
        //         'address' => $request->address,
        //         'description' => $request->description,
        //         'payment' => $request->payment,
        //         'product_id' => $cart['product_id'],
        //         'quantity' => $cart['quantity'],
        //         'price' => $cart['price'],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
    }

    public function show($id)
    {
        $order = Order::find($id);
        $orderDetails = OrderDetail::where('order_id', $order->id)->get();
        $products = Product::all();

        return view('admin.order.detail', compact('order', 'products', 'orderDetails'));

    }

    public function update($id)
    {

    }

    public function delete($id)
    {
        $order =  Order::find($id);
        $orderDetail = OrderDetail::find($order->id);
        // dd($orderDetail);

        $orderDetail->delete();
        $order->delete();


        return redirect()->route('admin.order.index')->with('status', 'Xóa đơn hàng thành công!');

    }
}
