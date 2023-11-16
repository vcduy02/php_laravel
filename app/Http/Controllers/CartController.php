<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderDetailCreateRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // $cart = session()->get('cart');
        // if ($cart) {
        //     foreach($cart as $cartProduct) {
        //         $product = Product::find($cartProduct['product_id']);
        //     }

        //     return view('cart', compact('product'));
        // }
        
        return view('cart');
    }

    public function store($id)
    {
        $product = Product::findOrFail($id);
 
        $cart = session()->get('cart', []);
 
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "product_id" => $product->id,
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "category_id" => $product->category_id,
                "brand_id" => $product->brand_id,
                "quantity" => 1
            ];
        }
 
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
 
    public function delete(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function checkout()
    {
        $cart = session()->get('cart');
        foreach($cart as $cartProduct) {
            $product = Product::find($cartProduct['product_id']);
            if ($product->quantity < $cartProduct['quantity']) {
                $messeger = 'Số lượng sản phẩm ' . $cartProduct['name'] .  ' vượt quá trong kho!';

                return redirect()->back()->with('success', $messeger);
            }
        }

        return view('checkout');
    }

    public function order(OrderDetailCreateRequest $request)
    {
        $carts = session()->get('cart');
        $request->except('_token', 'method');

        $order = new Order();
        if (Auth::user()){
            $order->user_id = Auth::user()->id;
        };
        $order->order_date = now();
        $order->save();

        foreach ($carts as $cart) {
            OrderDetail::insert([
                'order_id' =>  $order->id,
                'user_name' => $request->user_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'description' => $request->description,
                'payment' => $request->payment,
                'product_id' => $cart['product_id'],
                'quantity' => $cart['quantity'],
                'price' => $cart['price'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $orderDetails = OrderDetail::where('order_id', $order->id)->get();
        $products = Product::all();

        $request->session()->forget('cart');
        
        return view('ordercomplete', compact('order','orderDetails', 'products'));
        
    }
}
