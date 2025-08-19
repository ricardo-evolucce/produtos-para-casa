<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::all(); // pega todas as páginas

        return view('admin.pages.index', compact('pages'));
    }

   public function show($slug)
{
    $page = Page::with(['products' => function ($query) {
    $query->orderBy('id', 'desc'); // mais novo (id maior) primeiro
}])->where('slug', $slug)->firstOrFail();


    // Pega até 3 produtos para o schema (ajuste conforme desejar)
    $schemaProducts = $page->products->take(3);

    return view('page', compact('page', 'schemaProducts'));
}






}
