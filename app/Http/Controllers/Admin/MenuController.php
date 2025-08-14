<?php
namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('position')->orderBy('sort_order')->get();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $pages = Page::all();
        return view('admin.menus.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'page_id' => 'required|exists:pages,id',
            'position' => 'required|in:principal,secundario,rodape',
            'sort_order' => 'nullable|integer'
        ]);

        Menu::create($request->all());
        return redirect()->route('admin.menus.index')->with('success', 'Menu criado com sucesso.');
    }

    public function edit(Menu $menu)
    {
        $pages = Page::all();
        return view('admin.menus.edit', compact('menu', 'pages'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'page_id' => 'required|exists:pages,id',
            'position' => 'required|in:principal,secundario,rodape',
            'sort_order' => 'nullable|integer'
        ]);

        $menu->update($request->all());
        return redirect()->route('admin.menus.index')->with('success', 'Menu atualizado com sucesso.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menus.index')->with('success', 'Menu removido.');
    }
}
