<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = $this->getCategories();
        $allCategories = Category::orderBy('name', 'asc')->get();
        return view('backend.categories.index', compact('categories', 'allCategories'));
    }

    public function list(Request $request)
    {
        $rowsPerPage = $request->query('rowsPerPage', 10);
        $search = $request->query('q', '');

        $categories = $this->getCategories($rowsPerPage, $search);

        return response()->json($categories);
    }

    public function getCategories($rowsPerPage = 10, $search = '')
    {
        $categories = Category::with('parent')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->withCount('products')->paginate(10);
        $categories->through(function (Category $category) {
            $category->stock = $category->products()->sum('stock');
            $category->active = $category->active ? true : false;
            return $category;
        });
        return $categories;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allCategories = Category::orderBy('name', 'asc')->get();
        return view('backend.categories.create', compact('allCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name',
            'slug' => 'nullable|string',
            'parent_category' => 'nullable|string',
            'image' => 'nullable|image',
            'active' => 'boolean',
        ]);

        try {
            if ($request->hasFile('image')) {
                $path = $request->image->store('categories/images', 'public');
                $validated['image'] = $path;
            }

            $validated['parent_id'] = Category::find($request->parent_id)?->id;

            $category = Category::create($validated);

            return back()->with('success', 'Category Created successfully');
            //code...
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'parent_category' => 'nullable|string',
            'active' => 'nullable|boolean',
        ]);

        try {

            $category->name = $validated['name'];
            $category->slug = $validated['slug'];
            $category->parent_id = Category::where('name', $validated['parent_category'])->first()?->id;
            $category->active = $validated['active'];
            $category->save();

            return response()->json(['message' => 'Category updated'], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
