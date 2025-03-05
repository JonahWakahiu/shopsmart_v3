<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        $items = $request->user()->cart->items;
        if (!$items) {
            abort(500);
        }

        $lineItems = [];

        foreach ($items as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'kes',
                    'product_data' => [
                        'name' => $item->product->name,
                        'images' => [$item->product->image],
                    ],
                    'unit_amount' => ($item->price - $item->discount) * 100,
                ],
                'quantity' => $item->quantity,
            ];
        }

        $session = $stripe->checkout->sessions->create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('customer.checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('customer.checkout.cancel', [], true),
        ]);

        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => $request->user()->id
            ]);

            foreach ($items as $item) {
                $order->items()->create([
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'discount' => $item->discount,
                    'total' => $item->total,
                    'product_id' => $item->product_id,
                    'variation' => $item->variation_id,
                ]);
            }

            $order->payment()->create([
                'status' => 'unpaid',
                'transaction_id' => $session->id,
            ]);

            DB::commit();

            return redirect($session->url);
            //code...
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }
    }

    public function success(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        $sessionId = $request->session_id;

        try {
            $session = $stripe->checkout->sessions->retrieve($sessionId);
            if (!$session) {
                throw new NotFoundHttpException;
            }

            $customer = $session->customer_details;
            $payment = Payment::where('transaction_id', $session->id)->where('status', 'unpaid')->first();

            if (!$payment) {
                throw new NotFoundHttpException();
            }

            $payment->update([
                'status' => 'completed',
                'amount' => $session->amount_total / 100,
                'payment_method' => 'card',
            ]);

            $request->user()->cart->items()->delete();

            $details = [
                'name' => $customer->name,
                'created_at' => Carbon::parse($session->created)->toFormattedDateString(),
                'amount' => Number::currency($session->amount_total / 100, 'ksh'),
            ];
            return view('frontend.checkout-success', compact('details'));
        } catch (\Throwable $th) {
            throw new NotFoundHttpException();
        }
    }

    public function cancel()
    {
        return view('frontend.checkout-cancel');
    }
}
