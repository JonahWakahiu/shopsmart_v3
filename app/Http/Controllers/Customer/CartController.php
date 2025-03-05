<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = Cart::firstOrCreate(['user_id' => $request->user()->id]);
        $cart = $this->getCart($cart);

        return view('frontend.cart', compact('cart'));
    }

    public function items(Request $request)
    {
        $cart = Cart::firstOrCreate(['user_id' => $request->user()->id]);
        $cart = $this->getCart($cart);

        return response()->json($cart);
    }

    protected function getCart($cart)
    {
        $cart->load([
            'items' => [
                'product',
                'variation'
            ]
        ])->loadCount('items');

        $cart->items->map(function (CartItem $item) {
            $item->price = Number::currency($item->price ?? 0, 'ksh');
            $item->discount = Number::currency($item->discount ?? 0, 'ksh');
            $item->total = Number::currency($item->total ?? 0, 'ksh');

            return $item;
        });

        $cart->subtotal = Number::currency($cart->subtotal ?? 0, 'ksh');
        $cart->discount = Number::currency($cart->discount ?? 0, 'ksh');
        $cart->delivery_charge = Number::currency($cart->delivery_charge ?? 0, 'ksh');
        $cart->tax = Number::currency($cart->tax ?? 0, 'ksh');
        $cart->total = Number::currency($cart->total ?? 0, 'ksh');

        return $cart;
    }

    public function store(Request $request)
    {

        $cart = $request->user()->cart;

        if (!$cart) {
            $cart = Cart::firstOrCreate(['user_id' => $request->user()->id]);
        }

        $productId = $request->input('product_id');
        $attributes = $request->input('attributes');
        $quantity = $request->input('quantity');


        try {
            //code...
            $product = Product::find($productId);
            $variation = $product->variations()->whereJsonContains('attributes', $attributes)->first();

            $cart->items()->firstOrCreate(
                [
                    'product_id' => $product->id,
                    'variation_id' => $variation?->id
                ],
                [
                    'quantity' => $quantity,
                ]
            );

            return response()->json(['message' => 'added successfully!'], 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
    public function update(Request $request)
    {
        $cart = $request->user()->cart;

        $productId = $request->input('product_id');
        $variationId = $request->input('variation_id');
        $quantity = $request->input('quantity');

        try {
            $item = $cart->items()->where('product_id', $productId)->where('variation_id', $variationId)->first();

            $item->quantity = $quantity;
            $item->save();

            $cart = $this->getCart($cart);

            return response()->json(['message' => 'successfully updated', 'cart' => $cart], 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function destroyItem(Request $request)
    {
        $itemId = $request->query('item_id');

        $cart = $request->user()->cart;

        try {
            $cart->items()->find($itemId)->delete();

            return response()->json(['message' => 'successfully delete'], 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function clear(Request $request)
    {
        $cart = $request->user()->cart;

        try {
            //code...
            $cart->items()->delete();

            return response()->json(['message' => 'successfully cleared'], 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
}
