<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()
            ->with(['children', 'parent'])
            ->where('active', true)
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->paginate();

        return CategoryResource::collection($categories);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getCategories()
    {
        $categories = Category::query()
            ->with(['children', 'parent'])
            ->where('active', true)
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();

        return CategoryResource::collection($categories);
    }
}
