<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{
    public function index() {
        return Order::with('car')->get();
    }

    public function store(Request $request) {
        return Order::create($request->all());
    }

    public function show($id) {
        return Order::with('car')->findOrFail($id);
    }

    public function update(Request $request, $id) {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return $order;
    }

    public function destroy($id) {
        Order::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
