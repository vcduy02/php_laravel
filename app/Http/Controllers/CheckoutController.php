<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
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
}
