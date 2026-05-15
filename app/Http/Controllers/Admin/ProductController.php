<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(20);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'category'          => 'nullable|string|max:255',
            'size'              => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'old_price'         => 'nullable|numeric|min:0',
            'sale_price'        => 'nullable|numeric|min:0',
            'sort_order'        => 'nullable|integer',
            'status'            => 'nullable|boolean',

            'product_image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'product_video'     => 'nullable|mimes:mp4,mov,webm|max:51200',
        ]);

        $product = Product::create([
            'name'              => $request->name,
            'slug'              => Str::slug($request->name),
            'category'          => $request->category,
            'size'              => $request->size,
            'short_description' => $request->short_description,
            'old_price'         => $request->old_price,
            'sale_price'        => $request->sale_price,
            'sort_order'        => $request->sort_order ?? 0,
            'status'            => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('product_image')) {
            $product
                ->addMediaFromRequest('product_image')
                ->toMediaCollection('product_image');
        }

        if ($request->hasFile('product_video')) {
            $product
                ->addMediaFromRequest('product_video')
                ->toMediaCollection('product_video');
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'category'          => 'nullable|string|max:255',
            'size'              => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'old_price'         => 'nullable|numeric|min:0',
            'sale_price'        => 'nullable|numeric|min:0',
            'sort_order'        => 'nullable|integer',
            'status'            => 'nullable|boolean',

            'product_image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'product_video'     => 'nullable|mimes:mp4,mov,webm|max:51200',
        ]);

        $product->update([
            'name'              => $request->name,
            'slug'              => Str::slug($request->name),
            'category'          => $request->category,
            'size'              => $request->size,
            'short_description' => $request->short_description,
            'old_price'         => $request->old_price,
            'sale_price'        => $request->sale_price,
            'sort_order'        => $request->sort_order ?? 0,
            'status'            => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('product_image')) {
            $product
                ->clearMediaCollection('product_image');

            $product
                ->addMediaFromRequest('product_image')
                ->toMediaCollection('product_image');
        }

        if ($request->hasFile('product_video')) {
            $product
                ->clearMediaCollection('product_video');

            $product
                ->addMediaFromRequest('product_video')
                ->toMediaCollection('product_video');
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}