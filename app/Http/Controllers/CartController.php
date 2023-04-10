<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 'order')->first();
        if ($order == null) {
            $order = Order::create(
                array(
                    'code' => 'test',
                    'user_id' => Auth::user()->id,
                    'status' => 'order',
                    'receivership_id' => '1'
                )
            );
        }
        $orderDetail = $order->orderDetails()->where('product_id', $request->input('product_id'))->first();
        if ($orderDetail == null) {
            $orderDetail = new OrderDetail();
            $orderDetail->product_id = $request->input('product_id');
            $orderDetail->quantity = $request->input('quantity');
            $order->orderDetails()->save($orderDetail);
        } else {
            $orderDetail->quantity += $request->input('quantity');
            $orderDetail->save();
        }
        return redirect()->route('cart');
    }
    // tínht ổng tiền
    public function total_price(Order $order)
    {
        $total = 0;
        foreach ($order->orderDetails as $orderDetail) {
            $total += $orderDetail->product->price * $orderDetail->quantity;
        }
        return $total;
    }
    public function viewCart()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (Auth::check()) {
            $user = Auth::user();
            $order = Order::where('user_id', $user->id)->where('status', 'order')->first();
            if ($order) {
                $total = 0;
                foreach ($order->orderDetails as $orderDetail) {
                    $total += $orderDetail->product->price * $orderDetail->quantity;
                }
                // tổng tiền của order
                $total_price_order = $this->total_price($order);

                return view('cart', ['order' => $order, 'total' => $total, 'total_price_order' => $total_price_order, 'user' => $user]);
            } else {
                return view('cart-empty');
            }
        } else {
            return redirect()->route('login');
        }
         
    }
    public function remoteCart(Request $request)
    {
        
    }
    public function updateCart(Request $request)
    {
        $cart = OrderDetail::content()->where('rowId', $request->id);
        //update quantity
        //dd($cart);
        return view('cart')->with('cart-success', 'Cart updated');
    }
    
}
