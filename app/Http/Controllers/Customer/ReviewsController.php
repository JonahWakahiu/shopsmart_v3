<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewsController extends Controller
{

    public function index(Request $request): View
    {
        $userId = $request->user()->id;
        $items = OrderItem::doesntHave('review')
            ->whereHas('order', function (Builder $query) use ($userId) {
                $query->where('user_id', $userId)
                    ->whereHas('payment', function (Builder $query) {
                        $query->where('status', 'completed');
                    });
            })
            ->where('status', 'delivered')
            ->with('product', 'variation', 'order.payment')
            ->get();

        $items->map(function (OrderItem $item) {
            $item->order->formatted_created_at = Carbon::parse($item->order->created_at)->toFormattedDateString();
            return $item;
        });

        return view('frontend.reviews.index', compact('items'));
    }

    public function items(Request $request)
    {
        $userId = $request->user()->id;
        $items = OrderItem::doesntHave('review')
            ->whereHas('order', function (Builder $query) use ($userId) {
                $query->where('user_id', $userId)
                    ->whereHas('payment', function (Builder $query) {
                        $query->where('status', 'completed');
                    });
            })
            ->where('status', 'delivered')
            ->with('product', 'variation', 'order.payment')
            ->get();

        $items->map(function (OrderItem $item) {
            $item->order->formatted_created_at = Carbon::parse($item->order->created_at)->toFormattedDateString();
            return $item;
        });

        return response()->json($items);
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'title' => 'required|string',
            'message' => 'required|string|min:2'
        ]);

        $anonymous = $request->boolean('anonymous');

        $item = OrderItem::with('product')->find($request->item_id);

        try {
            $review = Review::create([
                'title' => $request->title,
                'message' => $request->message,
                'rating' => $request->rating,
                'anonyomous' => $anonymous,
                'user_id' => $request->user()->id,
                'product_id' => $item->product->id,
                'order_item_id' => $item->id,
            ]);

            return response()->json(['message' => 'Created successfully'], 200);
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage()], 500);
        }
    }
}
