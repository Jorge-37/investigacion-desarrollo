<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\VisitController;

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'admin'])->name('admin.dashboard');


Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/visitas', [VisitController::class, 'publicIndex'])
    ->name('visitas.index');
    

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/contents', [SiteContentController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.contents.index');

Route::get('/admin/contents/create', [SiteContentController::class, 'create'])
    ->middleware(['auth', 'admin'])
    ->name('admin.contents.create');

Route::post('/admin/contents', [SiteContentController::class, 'store'])
    ->middleware(['auth', 'admin'])
    ->name('admin.contents.store');

Route::get('/admin/contents/{content}/edit', [SiteContentController::class, 'edit'])
    ->middleware(['auth', 'admin'])
    ->name('admin.contents.edit');

Route::put('/admin/contents/{content}', [SiteContentController::class, 'update'])
    ->middleware(['auth', 'admin'])
    ->name('admin.contents.update');

Route::delete('/admin/contents/{content}', [SiteContentController::class, 'destroy'])
    ->middleware(['auth', 'admin'])
    ->name('admin.contents.destroy');



Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/gallery', [GalleryController::class, 'index'])
        ->name('admin.gallery.index');

    Route::get('/admin/gallery/create', [GalleryController::class, 'create'])
        ->name('admin.gallery.create');

    Route::post('/admin/gallery', [GalleryController::class, 'store'])
        ->name('admin.gallery.store');

    Route::get('/admin/gallery/{gallery}/edit', [GalleryController::class, 'edit'])
        ->name('admin.gallery.edit');

    Route::put('/admin/gallery/{gallery}', [GalleryController::class, 'update'])
        ->name('admin.gallery.update');

    Route::delete('/admin/gallery/{gallery}', [GalleryController::class, 'destroy'])
        ->name('admin.gallery.destroy');



        
    Route::get('/admin/visits', [VisitController::class, 'index'])
        ->middleware(['auth', 'admin'])
        ->name('admin.visits.index');

    Route::get('/admin/visits/create', [VisitController::class, 'create'])
        ->middleware(['auth', 'admin'])
        ->name('admin.visits.create');

    Route::post('/admin/visits', [VisitController::class, 'store'])
        ->middleware(['auth', 'admin'])
        ->name('admin.visits.store');

    Route::get('/admin/visits/{visit}/edit', [VisitController::class, 'edit'])
        ->middleware(['auth', 'admin'])
        ->name('admin.visits.edit');

    Route::put('/admin/visits/{visit}', [VisitController::class, 'update'])
        ->middleware(['auth', 'admin'])
        ->name('admin.visits.update');

    Route::delete('/admin/visits/{visit}', [VisitController::class, 'destroy'])
        ->middleware(['auth', 'admin'])
        ->name('admin.visits.destroy');

    Route::delete('/admin/visit-images/{image}', [VisitController::class, 'destroyImage'])
        ->middleware(['auth', 'admin'])
        ->name('admin.visit-images.destroy');
});



require __DIR__ . '/auth.php';
