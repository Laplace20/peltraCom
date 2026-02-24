<?php
use App\Http\Controllers\PublicController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CsrController;
use App\Models\News;
use App\Models\Facility;
use App\Models\CsrActivity;
use Illuminate\Support\Facades\Route;
use App\Models\Legality;

Route::get('/', function () {
    return view('landingPage', [
        'facilities' => Facility::all(),
        'news' => News::where('category', '!=', 'csr')->latestPublished()->take(6)->get(),
        'csrActivities' => News::where('category', 'csr')->where('is_active', true)->orderBy('date', 'desc')->take(3)->get(),
    ]);
})->name('LandingPage');

Route::get('/csr', [CsrController::class, 'index'])->name('csr.index');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/legalitas', function () {

    $legalities = Legality::where('is_visible', true)->latest()->get();

    return view('legalitasPage', compact('legalities'));
});

Route::get('/visi-misi', function () {
    return view('visiMisiPage');
})->name('visiMisi');




