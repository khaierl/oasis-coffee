<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::where('is_available', true)->latest()->get();

        return view('menu', compact('menus'));
    }
}
