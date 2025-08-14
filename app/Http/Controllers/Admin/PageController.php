<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Support\Str; // importe no topo do controller


class PageController extends Controller
{
    // Listar todas as páginas
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }



    public function create()
{
    $products = Product::all(); // busca todos os produtos para escolher
    return view('admin.pages.create', compact('products'));
}


public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'products' => 'nullable|array',
        'products.*' => 'exists:products,id',
    ]);

    $data['slug'] = Str::slug($data['title']);

    $page = Page::create($data);

    if (!empty($data['products'])) {
        $page->products()->sync($data['products']);
    }

    return redirect()->route('admin.pages.index')->with('success', 'Page created successfully!');
}



    public function edit(Page $page)
{
    $products = Product::all(); // busca todos os produtos
    return view('admin.pages.edit', compact('page', 'products'));
}


    // Atualizar os dados da página
   public function update(Request $request, Page $page)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'products' => 'nullable|array',
        'products.*' => 'exists:products,id',
        'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Upload simples da hero image
    if ($request->hasFile('hero_image')) {
        $file = $request->file('hero_image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img'), $filename);
        $data['hero_image'] = $filename;
    }

    $page->update($data);
    $page->products()->sync($request->input('products', []));

    return redirect()->route('admin.pages.index')->with('success', 'Page updated successfully!');
}

}
