<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = $this->getOrders();
        return view('backend.orders.index', compact('orders'));
    }

    public function list(Request $request)
    {
        $rowsPerPage = $request->query('rowsPerPage', 10);
        $search = $request->query('q', '');

        $orders = $this->getOrders($rowsPerPage, $search);

        return response()->json($orders);
    }

    protected function getOrders($rowsPerPage = 10, $search = '')
    {
        $orders = Order::with('user', 'payment')
            ->when($search, function ($query) use ($search) {
                $query->where('order_id', 'like', '%' . $search . '%');
            })
            ->paginate(10);
        $orders->through(function (Order $order) {
            $order->total = Number::currency($order->total, 'ksh');
            $order->date = Carbon::parse($order->created_at)->toFormattedDateString();
            return $order;
        });

        return $orders;
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
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
