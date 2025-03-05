<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class ProductsController extends Controller
{
    public function productList(Request $request)
    {
        $products = Product::where('status', '!=', 'inactive')
            ->where('visibility', '=', 'public')
            ->with('variations')
            ->get();

        $prevNumber = $request->query('prevNumber', 24);

        $number = $prevNumber + 24;
        if ($number > $products->count()) {
            $number = $products->count();
        }

        $products->take($number);


        $products->map(function (Product $product) {
            if ($product->type === 'variable') {
                $product->price = Number::currency($product->variations()->min('price'), 'ksh') . '-' . Number::currency($product->variations()->max('price'), 'ksh');

            } else {
                if ($product->sale_price) {
                    $discount = round(($product->sale_price * 100 / $product->price) - 100);

                    $product->price = Number::currency($product->price, 'ksh');
                    $product->sale_price = Number::currency($product->sale_price, 'ksh');
                    $product->discount = Number::percentage($discount);

                } else {
                    $product->price = Number::currency($product->price, 'ksh');
                }
            }
        });

        return response()->json(['products' => $products, 'currNumber' => $number]);
    }
    public function listing(Product $product)
    {
        $product->load('images');
        $variation = $product->defaultVariation();
        if ($variation) {

            if ($variation->sale_price) {
                $discount = round(($variation->sale_price * 100 / $variation->price) - 100);
                $variation->sale_price = Number::currency($variation->sale_price, 'ksh');
                $variation->price = Number::currency($variation->price, 'ksh');
                $variation->discount = Number::percentage($discount);
            } else {
                $variation->price = Number::currency($variation->price, 'ksh');
            }
        } else {
            if ($product->sale_price) {

                $discount = round(($product->sale_price * 100 / $product->price) - 100);
                $product->sale_price = Number::currency($product->sale_price, 'ksh');
                $product->price = Number::currency($product->price, 'ksh');
                $product->discount = Number::percentage($discount);
            } else {
                $product->price = Number::currency($product->price, 'ksh');
            }
        }

        $product_details = [
            'product' => $product,
            'variation' => $variation,
        ];
        return view('frontend.product-details', compact('product_details'));
    }

    public function editVariation(Request $request, Product $product)
    {
        $attributes = $request->query('attributes');
        $product->load('images');
        $variation = $product->variations()->whereJsonContains('attributes', $attributes)->first();

        if ($variation->sale_price) {
            $discount = round(($variation->sale_price * 100 / $variation->price) - 100);
            $variation->sale_price = Number::currency($variation->sale_price, 'ksh');
            $variation->price = Number::currency($variation->price, 'ksh');
            $variation->discount = Number::percentage($discount);
        } else {
            $variation->price = Number::currency($variation->price, 'ksh');
        }

        $product_details = [
            'product' => $product,
            'variation' => $variation,
        ];
        return response()->json($product_details);
    }
}
