<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrdersController extends Controller
{
    public function index(Request $request): View
    {
        $items = Order::where("user_id", auth()->user()->id)->items;
        return view('frontend.orders.index', compact('items'));
    }
}
