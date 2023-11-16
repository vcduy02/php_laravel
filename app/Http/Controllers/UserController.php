<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function order()
    {
        $id = Auth::user()->id;

        $orders = Order::where('user_id', $id)->get();

        return view('user.order.index', compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::find($id);
        $detail = OrderDetail::where('order_id', $order->id)->first();
        $products = Product::find($detail->product_id);

        return view('user.order.detail', compact('order', 'detail', 'products'));
    }
}
