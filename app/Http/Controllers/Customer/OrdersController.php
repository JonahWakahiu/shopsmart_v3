<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrdersController extends Controller
{
    public function index(Request $request): View
    {

        $userId = $request->user()->id;


        $ongoingOrderItems = OrderItem::whereNot('status', 'cancelled')
            ->whereHas('order', function (Builder $query) use ($userId) {
                $query->where('user_id', $userId)
                    ->whereHas('payment', function (Builder $query) {
                        $query->whereNotIn('status', ['failed', 'refunded']);
                    });
            })
            ->with('product', 'variation', 'order.payment')
            ->get();


        $cancelledOrderItems = OrderItem::where(function (Builder $query) use ($userId) {
            $query->where('status', 'cancelled')
                ->whereHas('order', function (Builder $query) use ($userId) {
                    $query->where('user_id', $userId);
                });
        })
            ->orWhere(function ($query) use ($userId) {
                $query->whereHas('order', function (Builder $query) use ($userId) {
                    $query->where('user_id', $userId)
                        ->whereHas('payment', function (Builder $query) {
                            $query->whereIn('status', ['failed', 'refunded']);
                        });
                });
            })
            ->with('product', 'variation', 'order.payment')
            ->get();

        $ongoingOrderItems->map(function (OrderItem $item) {
            $item->order->formatted_created_at = Carbon::parse($item->order->created_at)->toFormattedDateString();
            return $item;
        });

        $cancelledOrderItems->map(function (OrderItem $item) {
            $item->order->formatted_created_at = Carbon::parse($item->order->created_at)->toFormattedDateString();
            return $item;
        });


        return view('frontend.orders.index', compact(
            'ongoingOrderItems',
            'cancelledOrderItems'
        ));
    }
}
