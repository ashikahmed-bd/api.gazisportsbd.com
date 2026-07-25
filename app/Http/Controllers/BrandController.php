<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $brands = Brand::query()
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate($request->limit ?? 10);

        return BrandResource::collection($brands);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $brand = Brand::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'logo' => $request->logo,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'active' => $request->boolean('active'),
        ]);

        return (new BrandResource($brand))->additional([
            'message' => 'Brand created successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return new BrandResource($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $brand->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'logo' => $request->logo,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'active' => $request->boolean('active'),
        ]);

        return (new BrandResource($brand->fresh()))
            ->additional([
                'message' => 'Brand updated successfully.'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete($brand->id);

        return response()->json([
            'success' => true,
            'message' => 'Brand deleted successfully.'
        ]);
    }

    public function logo(Request $request, Brand $brand)
    {
        $request->validate([
            'logo' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($brand->logo && Storage::disk(config('app.disk'))->exists($brand->logo)) {
            Storage::disk(config('app.disk'))->delete($brand->logo);
        }

        $path = $request->file('logo')->store('brands', config('app.disk'));

        Image::decode($request->file('logo'))
            ->cover(200, 200)
            ->save(Storage::disk(config('app.disk'))->path($path));

        $brand->update([
            'logo' => $path,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Logo updated successfully.',
        ], Response::HTTP_OK);
    }

    public function search(Request $request)
    {
        return Brand::query()
            ->select('id', 'name')
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->q . '%');
            })
            ->orderBy('name')
            ->get();
    }
}
