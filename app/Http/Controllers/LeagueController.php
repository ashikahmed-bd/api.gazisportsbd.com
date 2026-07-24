<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeagueRequest;
use App\Http\Resources\LeagueResource;
use App\Models\League;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $leagues = League::query()
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate($request->limit ?? 10);

        return LeagueResource::collection($leagues);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeagueRequest $request)
    {
        $league = League::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'country' => $request->country,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'sort_order'  => League::max('sort_order') + 1,
            'active' => (bool) $request->active,
        ]);

        return (new LeagueResource($league->fresh()))
            ->additional([
                'message' => 'League created successfully.'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(League $league)
    {
        return LeagueResource::make($league);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeagueRequest $request, League $league)
    {
        $league->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'country' => $request->country,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'active' => (bool) $request->active,
        ]);

        return (new LeagueResource($league->fresh()))
            ->additional([
                'message' => 'League updated successfully.'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(League $league)
    {
        $league->delete($league->id);

        return response()->json([
            'success' => true,
            'message' => 'League deleted successfully.'
        ]);
    }

    public function logo(Request $request, League $league)
    {
        $request->validate([
            'logo' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($league->logo && Storage::disk(config('app.disk'))->exists($league->logo)) {
            Storage::disk(config('app.disk'))->delete($league->logo);
        }

        $path = $request->file('logo')->store('leagues', config('app.disk'));

        Image::decode($request->file('logo'))
            ->cover(200, 200)
            ->save(Storage::disk(config('app.disk'))->path($path));

        $league->update([
            'logo' => $path,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Logo updated successfully.',
        ], Response::HTTP_OK);
    }

    public function search(Request $request)
    {
        return League::query()
            ->select('id', 'name')
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->q . '%');
            })
            ->orderBy('name')
            ->get();
    }
}
