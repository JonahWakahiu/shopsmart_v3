<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $parentCategories = Category::whereNotNull("parent_id")->orderBy("name", "asc")->get();
        return view('layouts.guest', compact('parentCategories'));
    }
}
