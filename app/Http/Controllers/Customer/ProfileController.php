<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $user->loadCount('orders')->loadSum('orders', 'total')->load('order');
        $user->orders_sum_total = Number::currency($user->orders_sum_total ?? 0, 'ksh');
        return view('frontend.profile.index', compact('user'));
    }

    public function account()
    {
        return view('frontend.profile.account-management');
    }
}
