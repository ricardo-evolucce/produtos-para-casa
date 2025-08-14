<?php

use App\Models\Menu;

if (!function_exists('getMenu')) {
    function getMenu(string $position)
    {
        return Menu::with('page')
            ->where('position', $position)
            ->orderBy('sort_order')
            ->get();
    }
}
