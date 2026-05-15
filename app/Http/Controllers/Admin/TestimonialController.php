<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name'     => 'required|string|max:255',
            'product_name'      => 'nullable|string|max:255',
            'rating'            => 'required|integer|min:1|max:5',
            'review_text'       => 'nullable|string',
            'sort_order'        => 'nullable|integer',
            'status'            => 'nullable|boolean',
            'testimonial_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $testimonial = Testimonial::create([
            'customer_name' => $request->customer_name,
            'product_name'  => $request->product_name,
            'rating'        => $request->rating,
            'review_text'   => $request->review_text,
            'sort_order'    => $request->sort_order ?? 0,
            'status'        => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('testimonial_image')) {
            $testimonial
                ->addMediaFromRequest('testimonial_image')
                ->toMediaCollection('testimonial_image');
        }

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'customer_name'     => 'required|string|max:255',
            'product_name'      => 'nullable|string|max:255',
            'rating'            => 'required|integer|min:1|max:5',
            'review_text'       => 'nullable|string',
            'sort_order'        => 'nullable|integer',
            'status'            => 'nullable|boolean',
            'testimonial_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $testimonial->update([
            'customer_name' => $request->customer_name,
            'product_name'  => $request->product_name,
            'rating'        => $request->rating,
            'review_text'   => $request->review_text,
            'sort_order'    => $request->sort_order ?? 0,
            'status'        => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('testimonial_image')) {
            $testimonial->clearMediaCollection('testimonial_image');

            $testimonial
                ->addMediaFromRequest('testimonial_image')
                ->toMediaCollection('testimonial_image');
        }

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:testimonials,id',
        ]);

        Testimonial::whereIn('id', $request->ids)->delete();

        return response(null, 204);
    }
}