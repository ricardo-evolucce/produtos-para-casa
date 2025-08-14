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
    $page = Page::with('products')->where('slug', $slug)->firstOrFail();

    // Pega até 3 produtos para o schema (ajuste conforme desejar)
    $schemaProducts = $page->products->take(3);

    return view('page', compact('page', 'schemaProducts'));
}

public function update(Request $request, Page $page)
{

    
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'products' => 'nullable|array',
        'products.*' => 'exists:products,id',
        'hero_image' => 'nullable|image|mimes:jfif,jpg,jpeg,png,webp|max:2048',
    ]);

    if ($request->hasFile('hero_image')) {
        $file = $request->file('hero_image');
        $filename = time() . '.webp';

        // Criar a imagem, converter para webp e comprimir
        $image = Image::make($file)
            ->encode('webp', 80); // 80 = qualidade da compressão

        // Salvar em public/img
        $image->save(public_path('img/' . $filename));

        $data['hero_image'] = $filename;
    }

    $page->update($data);

    // Sincroniza produtos
    $page->products()->sync($request->input('products', []));

    return redirect()->route('admin.pages.index')->with('success', 'Page updated successfully!');
}



        public function edit(Page $page)
{
    $products = Product::all(); // pega todos os produtos do banco
    return view('admin.pages.edit', compact('page', 'products'));
}




}
