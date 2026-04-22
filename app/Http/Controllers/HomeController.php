<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Legality;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the landing page with news, facilities, and CSR activities.
     */
    public function index()
    {
        return view('landingPage', [
            // Optimize by selecting only needed columns if possible, but keeping 'all' for safety
            // 'facilities' => Facility::select(['id', 'name', 'image'])->get()
            'facilities' => Facility::select(['id', 'name', 'image', 'description'])->get(),
            'news' => News::where('category', '!=', 'csr')
                ->latestPublished()
                ->take(6)
                ->get(),
            'csrActivities' => News::where('category', 'csr')
                ->where('is_active', true)
                ->orderBy('date', 'desc')
                ->take(3)
                ->get(),
        ]);
    }

    /**
     * Display the legalitas page.
     */
    public function legalitas()
    {
        $legalities = Legality::where('is_visible', true)->latest()->get();
        return view('legalitasPage', compact('legalities'));
    }

    /**
     * Display the Visi Misi page.
     */
    public function visiMisi()
    {
        return view('visiMisiPage');
    }
}
