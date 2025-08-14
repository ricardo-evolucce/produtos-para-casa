<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Listar todos os produtos
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    // Exibir formulário para criar novo produto
    public function create()
    {
        return view('admin.products.create');
    }

    // Salvar novo produto no banco
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|string|max:255',  // pode adaptar se for upload
            'url' => 'required|url|max:255',
            'category' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'alt' => 'nullable|string|max:255',
        ]);

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    // Exibir formulário para editar um produto existente
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Atualizar um produto existente no banco
  public function update(Request $request, Product $product)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'url' => 'required|url|max:255',
        'category' => 'required|string|max:100',
        'alt' => 'nullable|string|max:255',
    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        if (!$file->move(public_path('img'), $filename)) {
            return back()->withErrors(['image' => 'The image failed to upload.']);
        }

        $data['image'] = 'img/'.$filename;
    }

    $product->update($data);

    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
}


    // Excluir um produto
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
}
