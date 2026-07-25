<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubRequest;
use App\Http\Resources\ClubResource;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clubs = Club::query()
            ->with(['league'])
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate($request->limit ?? 10);

        return ClubResource::collection($clubs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClubRequest $request)
    {
        $club = Club::create([
            'league_id' => $request->league_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'country' => $request->country,
            'founded_year' => $request->founded_year,
            'stadium' => $request->stadium,
            'active' => (bool) $request->active,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return (new ClubResource($club->fresh()))
            ->additional([
                'message' => 'Club created successfully.'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Club $club)
    {
        $club->load(['league']);

        return ClubResource::make($club);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClubRequest $request, Club $club)
    {
        $club->update([
            'league_id' => $request->league_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'country' => $request->country,
            'founded_year' => $request->founded_year,
            'stadium' => $request->stadium,
            'active' => (bool) $request->active,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);


        return (new ClubResource($club->fresh()))
            ->additional([
                'message' => 'Club updated successfully.'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
    {
        $club->delete($club->id);

        return response()->json([
            'success' => true,
            'message' => 'Club deleted successfully.'
        ]);
    }


    public function logo(Request $request, Club $club)
    {
        $request->validate([
            'logo' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($club->logo && Storage::disk(config('app.disk'))->exists($club->logo)) {
            Storage::disk(config('app.disk'))->delete($club->logo);
        }

        $path = $request->file('logo')->store('clubs', config('app.disk'));

        Image::decode($request->file('logo'))
            ->cover(200, 200)
            ->save(Storage::disk(config('app.disk'))->path($path));

        $club->update([
            'logo' => $path,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Logo updated successfully.',
        ], Response::HTTP_OK);
    }


    public function search(Request $request)
    {
        $clubs = Club::query()
            ->select('id', 'name')
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->q . '%');
            })
            ->orderBy('name')
            ->limit(20)
            ->get();

        return response()->json($clubs);
    }
}
