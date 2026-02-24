<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     */
    public function index()
    {
        // Pagination dibatasi 6 item per halaman agar tidak terlalu panjang
        $news = News::latestPublished()->paginate(6);

        return view('newsIndex', compact('news'));
    }

    /**
     * Display the specified news.
     */
    public function show($slug)
    {
        $news = News::where('slug', $slug)->published()->firstOrFail();

        // Get related news (same category, excluding current)
        $relatedNews = News::where('category', $news->category)
            ->where('id', '!=', $news->id)
            ->published()
            ->latest('published_at')
            ->take(3)
            ->get();

        // Get next news for navigation
        $nextNews = News::published()
            ->where('published_at', '>', $news->published_at)
            ->orderBy('published_at', 'asc')
            ->first();

        return view('newsDetail', compact('news', 'relatedNews', 'nextNews'));
    }
}