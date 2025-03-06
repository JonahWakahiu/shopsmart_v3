<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Number;
use Illuminate\Support\Str;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = $this->getCustomers();
        return view('backend.customers.index', compact('customers'));
    }

    public function list(Request $request)
    {
        $rowsPerPage = $request->query('rowsPerPage', 10);
        $search = $request->query('q', '');

        $customers = $this->getCustomers($rowsPerPage, $search);
        return response()->json($customers);
    }

    protected function getCustomers($rowsPerPage = 10, $search = '')
    {
        $user = Auth::user();
        $customers = User::role('user')
            ->when($search, function (Builder $query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->whereNot('email', $user->email)
            ->with('order')
            ->withCount('orders')
            ->withSum('orders', 'total')
            ->paginate($rowsPerPage);

        $customers->map(function (User $customer) {
            $customer->orders_sum_total = Number::currency($customer->orders_sum_total ?? 0, 'ksh');
            $customer->last_order = $customer->order ? Carbon::parse($customer->order->created_at)->diffForHumans() : null;
        });
        return $customers;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = config('countries');

        return view('backend.customers.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'phone_number' => 'nullable',
            'country' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'zip_code' => 'required',
            'address' => 'nullable',
        ]);

        try {
            $validated['password'] = Str::password(8);
            $validated['name'] = $validated['first_name'] . ' ' . $validated['last_name'];

            $user = User::create($validated)->assignRole('user');

            return response()->json(200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $customer)
    {
        return view('backend.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $customer)
    {
        $countries = config('countries');
        return view('backend.customers.edit', compact('customer', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $customer)
    {
        $customer->delete();
        return response()->json(['message' => 'success'], 200);
    }
}
