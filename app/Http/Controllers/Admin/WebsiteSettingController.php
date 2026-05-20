<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class WebsiteSettingController extends Controller
{
    public function index()
    {
        $setting = WebsiteSetting::firstOrCreate(
            ['id' => 1],
            [
                'website_name'     => 'Al-Kahaf',
                'website_tagline'  => 'Al-Kahaf, Made Accessible',
                'copyright_text'   => '© 2025 Al-Kahaf. All Rights Reserved.',
                'developer_credit' => 'Website designed by 24siteshop',
                'meta_title'       => 'Al-Kahaf | Luxury Attars & Perfumes',
                'meta_description' => 'Discover premium attars, perfumes and luxury Al-Kahaf collections.',
                'meta_keywords'    => 'perfume, attar, oud, luxury Al-Kahaf',
                'canonical_url'    => 'https://alkahaf.com/',
                'primary_phone'    => '+91 85911 14751',
                'whatsapp_number'  => '918591114751',
                'email_address'    => 'sales@alkahaf.com',
                'office_address'   => 'Borivali West, Mumbai',
                'store_address'    => 'Al-Kahaf, Surat',
                'business_hours'   => 'Mon - Sat, 10 AM - 8 PM',
            ]
        );

        return view('admin.website-settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'website_name'     => 'nullable|string|max:255',
            'website_tagline'  => 'nullable|string|max:255',
            'copyright_text'   => 'nullable|string|max:255',
            'developer_credit' => 'nullable|string|max:255',

            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords'    => 'nullable|string',
            'canonical_url'    => 'nullable|string|max:255',

            'primary_phone'    => 'nullable|string|max:50',
            'secondary_phone'  => 'nullable|string|max:50',
            'whatsapp_number'  => 'nullable|string|max:50',
            'email_address'    => 'nullable|email|max:255',
            'office_address'   => 'nullable|string',
            'store_address'    => 'nullable|string',
            'business_hours'   => 'nullable|string|max:255',
            'google_map_embed' => 'nullable|string',

            'facebook_url'     => 'nullable|string|max:255',
            'instagram_url'    => 'nullable|string|max:255',
            'youtube_url'      => 'nullable|string|max:255',

            'logo'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'favicon'          => 'nullable|image|mimes:jpg,jpeg,png,webp,ico|max:2048',
            'footer_logo'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'og_image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $setting = WebsiteSetting::firstOrCreate(['id' => 1]);

        $setting->update($request->only([
            'website_name',
            'website_tagline',
            'copyright_text',
            'developer_credit',

            'meta_title',
            'meta_description',
            'meta_keywords',
            'canonical_url',

            'primary_phone',
            'secondary_phone',
            'whatsapp_number',
            'email_address',
            'office_address',
            'store_address',
            'business_hours',
            'google_map_embed',

            'facebook_url',
            'instagram_url',
            'youtube_url',
        ]));

        if ($request->hasFile('logo')) {
            $setting->clearMediaCollection('logo');

            $setting
                ->addMediaFromRequest('logo')
                ->toMediaCollection('logo');
        }

        if ($request->hasFile('favicon')) {
            $setting->clearMediaCollection('favicon');

            $setting
                ->addMediaFromRequest('favicon')
                ->toMediaCollection('favicon');
        }

        if ($request->hasFile('footer_logo')) {
            $setting->clearMediaCollection('footer_logo');

            $setting
                ->addMediaFromRequest('footer_logo')
                ->toMediaCollection('footer_logo');
        }

        if ($request->hasFile('og_image')) {
            $setting->clearMediaCollection('og_image');

            $setting
                ->addMediaFromRequest('og_image')
                ->toMediaCollection('og_image');
        }

        return redirect()
            ->route('admin.website-settings.index')
            ->with('success', 'Website settings updated successfully.');
    }
}
