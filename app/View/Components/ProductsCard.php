<?php

namespace App\View\Components;

use App\Models\Product;
use App\Models\Variation;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Number;
use Illuminate\View\Component;

class ProductsCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $products = Product::where('status', '!=', 'inactive')
            ->where('visibility', '=', 'public')
            ->with('variations')
            ->take(24)
            ->get();

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
        return view('components.products-card', compact('products'));
    }
}
