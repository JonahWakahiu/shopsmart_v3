<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = $this->getTransactions();
        return view('backend.transactions.index', compact('transactions'));
    }

    public function list(Request $request)
    {

        $rowsPerPage = $request->query('rowsPerPage', 10);
        $search = $request->query('q', '');

        $orders = $this->getTransactions($rowsPerPage, $search);

        return response()->json($orders);
    }

    protected function getTransactions($rowsPerPage = 10, $search = '')
    {
        $transactions = Payment::with('user', 'order')
            ->when($search, function ($query) use ($search) {
                $query->where('transaction_id', 'like', '%' . $search . '%');
            })
            ->paginate($rowsPerPage);

        $transactions->through(function ($transaction) {
            $transaction->amount = Number::currency($transaction->amount ?? 0, 'ksh');
            $transaction->due_date = Carbon::parse($transaction->created_at)->toFormattedDateString();
            return $transaction;
        });

        return $transactions;
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
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
