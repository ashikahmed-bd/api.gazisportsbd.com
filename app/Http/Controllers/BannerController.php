<?php

namespace App\Http\Controllers;

use App\Http\Resources\BannerResource;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $banners = Banner::query()
            ->latest()
            ->paginate($request->limit ?? 10);

        return BannerResource::collection($banners);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Banner::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'sort_order' => $request->sort_order,
            'starts_at' => $request->starts_at,
            'ends_at' => $request->ends_at,
            'active' => $request->active,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Banner created successfully.',
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        return BannerResource::make($banner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $banner->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'sort_order' => $request->sort_order,
            'starts_at' => $request->starts_at,
            'ends_at' => $request->ends_at,
            'active' => $request->active,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Banner updated successfully.',
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        if ($banner->image && Storage::disk(config('app.disk'))->exists($banner->image)) {
            Storage::disk(config('app.disk'))->delete($banner->image);
        }

        $banner->delete($banner);

        return response()->json([
            'success' => true,
            'message' => 'Banner deleted successfully.',
        ], Response::HTTP_OK);
    }


    public function image(Request $request, Banner $banner)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($banner->image && Storage::disk(config('app.disk'))->exists($banner->image)) {
            Storage::disk(config('app.disk'))->delete($banner->image);
        }

        $path = $request->file('image')->store('banners', config('app.disk'));


        Image::decode($request->file('image'))
            ->cover(1200, 500)
            ->save(Storage::disk(config('app.disk'))->path($path));

        $banner->update([
            'image' => $path,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Banner updated successfully.',

        ], Response::HTTP_OK);
    }
}
