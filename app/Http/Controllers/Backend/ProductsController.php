<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->getProducts();
        return view('backend.products.index', compact('products'));
    }

    public function list(Request $request)
    {
        $rowsPerPage = $request->query('rowsPerPage', 10);
        $search = $request->query('q', '');
        $products = $this->getProducts($rowsPerPage, $search);
        return response()->json($products);
    }

    protected function getProducts($rowsPerPage = 10, $search = '')
    {
        $products = Product::with('category')
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('sku', 'like', '%' . $search . '%');
            })->paginate($rowsPerPage);

        $products->through(function (Product $product) {
            if ($product->type == 'variable') {
                $product->price = $product->variations->min('price') . '-' . $product->variations->max('price');
            }
            $product->reviews_avg_rating = round($product->reviews_avg_rating, 1);

            $product->published_on = $product->status = 'sheduled' ? Carbon::parse($product->published_on)->toFormattedDayDateString() : Carbon::parse($product->created_at)->toFormattedDayDateString();
            return $product;
        });
        return $products;
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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
