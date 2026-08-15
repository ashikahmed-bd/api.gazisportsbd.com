<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Http\Resources\PageResource;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $pages = Page::query()
            ->when($request->search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            })
            ->when($request->has('active'), function ($query) use ($request) {
                $query->where('active', $request->boolean('active'));
            })
            ->latest()
            ->paginate($request->input('limit', 10));

        return PageResource::collection($pages);
    }


    public function show(Page $page)
    {
        return PageResource::make($page);
    }


    public function update(PageRequest $request, Page $page)
    {
        $page->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'active' => $request->boolean('active', false),
        ]);

        return PageResource::make($page->fresh())->additional([
            'message' => 'Page updated successfully.',
        ]);
    }

    public function getPage(Page $page)
    {
        abort_unless($page->active, 404);

        return PageResource::make($page);
    }
}
