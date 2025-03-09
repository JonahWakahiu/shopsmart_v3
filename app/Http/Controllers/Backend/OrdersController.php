<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
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
        $order->load([
            'payment',
            'user',
            'items' => [
                'product',
                'variation',
                'latestStatus',
            ],
            'latestStatus'
        ]);

        $order->items->map(function (OrderItem $item) {
            $item->price = Number::currency($item->price, 'ksh');
            $item->discount = Number::currency($item->discount ?? 0, 'ksh');
            $item->total = Number::currency($item->total, 'ksh');
            return $item;
        });
        $order->placed_on = Carbon::parse($order->created_at)->format('F j, Y \a\t g:i a');

        $order->subtotal = Number::currency($order->subtotal, 'ksh');
        $order->discount = Number::currency($order->discount ?? 0, 'ksh');
        $order->delivery_charge = Number::currency($order->delivery_charge ?? 0, 'ksh');
        $order->tax = Number::currency($order->tax ?? 0, 'ksh');
        $order->total = Number::currency($order->total, 'ksh');

        return view('backend.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,processing,delivered,cancelled',
            'notes' => 'nullable|string',
        ]);

        try {
            $order->statuses()->create([
                'status' => $validated['status'],
                'notes' => $validated['notes'],
                'changed_by' => $request->user()->id,
                'order_id' => $order->id,
            ]);

            return response()->json(['success' => true], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);

        }
    }

    public function updateItem(Request $request, OrderItem $item)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,shipped,delivered,cancelled',
            'notes' => 'nullable|string',
        ]);

        try {
            $item->statuses()->create([
                'status' => $validated['status'],
                'notes' => $validated['notes'],
                'changed_by' => $request->user()->id,
                'item_id' => $item->id,
            ]);
            return response()->json(['success' => true], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
