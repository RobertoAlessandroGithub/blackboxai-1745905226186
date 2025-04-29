<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function showMenu()
    {
        $menuItems = MenuItem::all();
        return view('menu', compact('menuItems'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'customer_name' => 'nullable|string|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'items' => 'required|array',
            'items.*.menu_item_id' => 'required|exists:menu_items,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $totalPrice = 0;
            foreach ($request->items as $item) {
                $menuItem = MenuItem::findOrFail($item['menu_item_id']);
                $totalPrice += $menuItem->price * $item['quantity'];
            }

            $order = Order::create([
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'total_price' => $totalPrice,
                'status' => 'pending',
            ]);

            foreach ($request->items as $item) {
                $menuItem = MenuItem::findOrFail($item['menu_item_id']);
                OrderDetail::create([
                    'order_id' => $order->id,
                    'menu_item_id' => $menuItem->id,
                    'quantity' => $item['quantity'],
                    'price' => $menuItem->price,
                ]);
            }

            DB::commit();

            return redirect()->route('order.success', ['order' => $order->id]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Failed to place order. Please try again.');
        }
    }

    public function orderSuccess(Order $order)
    {
        return view('order-success', compact('order'));
    }
}
