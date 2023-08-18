<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    //
    public function index()
    {
        $orders = Orders::all();
        return view('admin.orders')->with('orders', $orders);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required|min:10',
        //     'discount' => 'required',
        //     'tax' => 'required',
        //     'total' => 'required',
        // ]);

        $order = new Orders;
        $order->name = $request->title;
        $order->discription = $request->description;
        $order->discount = $request->discount;
        $order->tax = $request->tax;
        $order->total = $request->total;
        $order->save();

        return redirect()->back()->with('status', 'Order has been placed successfully');
    }

    public function update(Request $request, $id)
    {
        $order = Orders::findOrfail($id);
        $order->name = $request->title;
        $order->discription = $request->description;
        $order->discount = $request->discount;
        $order->tax = $request->tax;
        $order->total = $request->total;
        $order->save();

        return redirect()->back()->with('status', 'Order has been updated successfully');
    }

    public function edit($id)
    {
        $order = Orders::findOrfail($id);
        return view('admin.editorder')->with('order', $order);
    }

    public function destroy($id)
    {
        $order = Orders::findOrfail($id);
        $order->delete();
        return redirect()->back()->with('status', 'Order has been deleted successfully');
    }
    
}
