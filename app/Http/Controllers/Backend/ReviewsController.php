<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Carbon\Carbon;
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
        $search = $request->query('q', '');
        $reviews = $this->getReviews($rowsPerPage, $search);

        return response()->json($reviews);
    }

    protected function getReviews($rowsPerPage = 10, $search = '')
    {
        $reviews = Review::with('product', 'user')
            ->when($search, function ($query) use ($search) {
                $query->where('review_id', 'like', '%' . $search . '%');
            })
            ->paginate($rowsPerPage);
        $reviews->through(function (Review $review) {
            $review->date = Carbon::parse($review->created_at)->toFormattedDayDateString();
            return $review;
        });
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
        $validated = $request->validate([
            'status' => 'required|in:pending,publish,cancel',
        ]);

        try {
            $review->status = $validated['status'];
            $review->save();

            return response()->json(['status' => 'success'], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['status' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
