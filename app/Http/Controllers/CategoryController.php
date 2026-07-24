<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()
            ->with(['children', 'parent'])
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
        Category::create([
            'parent_id' => $request->post('parent_id'),
            'name' => $request->post('name'),
            'slug' => Str::slug($request->post('slug')),
            'meta_title' => $request->post('meta_title'),
            'meta_description' => $request->post('meta_description'),
            'meta_keywords' => $request->post('meta_keywords'),
            'sort_order' => Category::max('sort_order') + 1,
            'active' => $request->post('active'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Category created successfully.',
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category->load('parent');
        return CategoryResource::make($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'sort_order' => $request->filled('sort_order') ? (int) $request->sort_order : (Category::max('sort_order') ?? 0) + 1,
            'active' => $request->active,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully.',
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image && Storage::disk(config('app.disk'))->exists($category->image)) {
            Storage::disk(config('app.disk'))->delete($category->image);
        }

        $category->delete($category->id);

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully.',
        ], Response::HTTP_OK);
    }

    public function media(Request $request, Category $category)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($category->image && Storage::disk(config('app.disk'))->exists($category->image)) {
            Storage::disk(config('app.disk'))->delete($category->image);
        }

        $path = $request->file('image')->store('categories', config('app.disk'));

        Image::decode($request->file('image'))
            ->cover(600, 800)
            ->save(Storage::disk(config('app.disk'))->path($path));

        $category->update([
            'image' => $path,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Image updated successfully.',
        ], Response::HTTP_OK);
    }

    public function search(Request $request)
    {
        return Category::query()
            ->select('id', 'name')
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->q . '%');
            })
            ->orderBy('name')
            ->get();
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
