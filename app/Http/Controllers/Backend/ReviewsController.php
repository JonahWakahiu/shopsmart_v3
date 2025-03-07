<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = $this->getReviews();
        return view('backend.reviews.index', compact('reviews'));
    }

    public function list(Request $request)
    {
        $rowsPerPage = $request->query('rowsPerPage', 10);
        $search = $request->query('search', '');
        $reviews = $this->getReviews($rowsPerPage, $search);

        return response()->json($reviews);
    }

    protected function getReviews($rowsPerPage = 10, $search = '')
    {
        $reviews = Review::with('product', 'user')->paginate($rowsPerPage);
        return $reviews;
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
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
