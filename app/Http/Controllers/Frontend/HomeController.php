<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->get();

        $videoProducts = Product::where('status', 1)
            ->whereHas('media', function ($query) {
                $query->where('collection_name', 'product_video');
            })
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->get();

        return view('frontend.index', compact('products', 'videoProducts'));
    }
}