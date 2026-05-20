<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\WebsiteSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

        $testimonials = Testimonial::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->get();

        $setting = WebsiteSetting::first();

        return view('frontend.index', compact(
            'products',
            'videoProducts',
            'testimonials',
            'setting'
        ));
    }

    public function trackProductClick(Request $request, Product $product): JsonResponse
    {
        $product->increment('click_count');

        return response()->json([
            'success' => true,
            'click_count' => $product->fresh()->click_count,
        ]);
    }
}
