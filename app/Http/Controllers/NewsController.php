<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();

        if (Schema::hasColumn('news', 'is_published')) {
            $query->where('is_published', true);
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if (Schema::hasColumn('news', 'published_at')) {
            $query->latest('published_at');
        } else {
            $query->latest();
        }

        $newsList = $query->paginate(6);
        $categories = Schema::hasColumn('news', 'category') ? News::select('category')->distinct()->pluck('category') : collect();

        return view('news.index', compact('newsList', 'categories'));
    }

    public function show($slug)
    {
        $query = News::where('slug', $slug);
        if (Schema::hasColumn('news', 'is_published')) {
            $query->where('is_published', true);
        }
        $news = $query->first();

        if (!$news) {
            $news = News::firstOrFail();
        }

        $recentQuery = News::where('id', '!=', $news->id);
        if (Schema::hasColumn('news', 'is_published')) {
            $recentQuery->where('is_published', true);
        }
        if (Schema::hasColumn('news', 'published_at')) {
            $recentQuery->latest('published_at');
        } else {
            $recentQuery->latest();
        }
        $recentNews = $recentQuery->take(4)->get();

        return view('news.show', compact('news', 'recentNews'));
    }
}
