<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Models\Page;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\SitemapController;


// Rotas auth fornecidas pelo Breeze
require __DIR__.'/auth.php';

Route::get('/sitemap.xml', [SitemapController::class, 'index']);

// Rotas admin protegidas
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('pages', [AdminPageController::class, 'index'])->name('pages.index');
    Route::get('pages/create', [AdminPageController::class, 'create'])->name('pages.create');
    Route::post('pages', [AdminPageController::class, 'store'])->name('pages.store');
    Route::get('pages/{page}/edit', [AdminPageController::class, 'edit'])->name('pages.edit');
    Route::put('pages/{page}', [AdminPageController::class, 'update'])->name('pages.update');
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)->except(['show']);
    
    Route::resource('menus', MenuController::class);

    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    

});

// Rotas para dashboard e profile
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    

});

Route::get('/', function () {
    // Aqui você pode carregar a página com slug "inicio" e retornar a view
    $page = Page::where('slug', 'inicio')->firstOrFail();
    return app(\App\Http\Controllers\PageController::class)->show($page->slug);
})->name('home');

// Rota dinâmica DEVE ficar por último para NÃO sobrescrever outras rotas fixas
Route::get('{slug}', [PageController::class, 'show'])->name('page.show');
Route::get('/categoria/{slug}', [CategoriaController::class, 'show'])->name('categoria');

Route::get('/produtos-para-deixar-a-casa-cheirosa', function () {
    return view('produtos-para-deixar-a-casa-cheirosa');
})->name('produtos-para-deixar-a-casa-cheirosa');

Route::get('/produtos-para-casa-inteligente', function () {
    return view('produtos-para-casa-inteligente');
})->name('produtos-para-casa-inteligente');

Route::get('/coisas-uteis-para-casa', function () {
    return view('coisas-uteis-para-casa');
})->name('coisas-uteis-para-casa');




