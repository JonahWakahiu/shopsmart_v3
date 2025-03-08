<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attributes = $this->getAttributes();

        return view("backend.attributes.index", compact("attributes"));
    }

    public function list(Request $request)
    {
        $rowsPerPage = $request->query('rowsPerPage', 10);
        $search = $request->query('q', '');

        $attributes = $this->getAttributes($rowsPerPage, $search);
        return response()->json($attributes);
    }

    protected function getAttributes($rowsPerPage = 10, $search = '')
    {
        $attributes = Attribute::with('values')
            ->when($search, function (Builder $query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate($rowsPerPage);

        return $attributes;
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
        $validated = $request->validate([
            'name' => 'required|string|unique:attributes,name',
            'slug' => 'nullable|string',
            'watch_type' => 'nullable|string|in:label,color,image',
            'watch_shape' => 'nullable|string|in:square,rounded_corners,circle',
            'watch_size' => 'nullable',
        ]);

        try {
            $attribute = Attribute::create($validated);
            return response()->json(['success' => true], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Attribute $attribute)
    {

        $values = $attribute->values()->paginate(10);
        return view('backend.attributes.edit', compact('attribute', 'values'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attribute $attribute)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attribute $attribute)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'slug' => 'nullable|string',
            'watch_type' => 'nullable|string|in:label,color,image',
            'watch_shape' => 'nullable|string|in:square,rounded_corners,circle',
            'watch_size' => 'nullable',
        ]);

        try {
            $attribute = $attribute->update($validated);
            return response()->json(['success' => true], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return response()->json(['success' => true], 200);
    }
}
