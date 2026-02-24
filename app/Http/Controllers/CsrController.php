<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class CsrController extends Controller
{
    public function index()
    {
        $activities = News::where('category', 'csr')
            ->where('is_active', true)
            ->orderBy('date', 'desc')
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        return view('csrPage', compact('activities'));
    }
}
