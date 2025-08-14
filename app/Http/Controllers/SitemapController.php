<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Page;
use App\Models\Menu;

class SitemapController extends Controller
{
    public function index()
    {
        $pages = Page::all(); // todas as páginas
        $menuItems = Menu::with('page')->get(); // itens de menu que linkam para páginas

        $urls = [];

        // Adiciona URLs das páginas
        foreach ($pages as $page) {
            $urls[] = [
                'loc' => url($page->slug),
                'lastmod' => $page->updated_at->toAtomString(),
            ];
        }

        // Adiciona URLs de menus (evita duplicatas)
        foreach ($menuItems as $item) {
            if ($item->page) {
                $loc = url($item->page->slug);
                if (!in_array($loc, array_column($urls, 'loc'))) {
                    $urls[] = [
                        'loc' => $loc,
                        'lastmod' => $item->page->updated_at->toAtomString(),
                    ];
                }
            }
        }

        $content = view('sitemap', ['urls' => $urls]);

        return response($content, 200)
                ->header('Content-Type', 'application/xml');
    }
}
