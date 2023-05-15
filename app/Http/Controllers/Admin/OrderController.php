<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Receivership;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderList = Order::orderBy('id', 'DESC')->paginate(5);
        return view('admin.order.index', compact('orderList'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Order::find($id);
        $order = Order::with('orderDetails')->find($id);
        return view('admin.order.show', compact('order', 'item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Order::find($id);
        $order = Order::with('orderDetails')->find($id);
        return view('admin.order.edit', compact('order', 'item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();
        if ($order) {
            alert()->success('Order Update', 'Successfully'); // hoặc có thể dùng alert('Post Update','Successfully', 'success');
        } else {
            alert()->error('Order Update', 'Something went wrong!'); // hoặc có thể dùng alert('Post Created','Something went wrong!', 'error');
        }
        return redirect()->route('order.show',compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
