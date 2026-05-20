<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;

class HomeController
{
    public function index()
    {
        $totalProducts = Product::count();
        $activeProducts = Product::where('status', 1)->count();
        $inactiveProducts = Product::where('status', 0)->count();
        $totalClicks = Product::sum('click_count');

        $topProducts = Product::orderByDesc('click_count')
            ->orderBy('name')
            ->get();

        $latestProducts = Product::latest()
            ->take(5)
            ->get();

        return view('home', compact(
            'totalProducts',
            'activeProducts',
            'inactiveProducts',
            'totalClicks',
            'topProducts',
            'latestProducts'
        ));
    }
}
