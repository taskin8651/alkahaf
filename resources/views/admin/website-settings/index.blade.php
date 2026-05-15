@extends('layouts.admin')

@section('page-title', 'Website Settings')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Website Settings</h2>

        <p class="admin-page-subtitle">
            Manage website name, logo, SEO, contact details and social media links
        </p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="POST"
      action="{{ route('admin.website-settings.update') }}"
      enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        {{-- BASIC SETTINGS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-globe"></i>
                </div>

                <div>
                    <p class="form-card-title">Basic Settings</p>
                    <p class="form-card-subtitle">Website identity and footer credits</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="website_name">
                        Website Name
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-signature icon"></i>

                        <input type="text"
                               name="website_name"
                               id="website_name"
                               value="{{ old('website_name', $setting->website_name ?? '') }}"
                               placeholder="The Real Fragrance World"
                               class="field-input {{ $errors->has('website_name') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('website_name'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('website_name') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="website_tagline">
                        Website Tagline
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-quote-left icon"></i>

                        <input type="text"
                               name="website_tagline"
                               id="website_tagline"
                               value="{{ old('website_tagline', $setting->website_tagline ?? '') }}"
                               placeholder="Luxury Fragrances, Made Accessible"
                               class="field-input {{ $errors->has('website_tagline') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('website_tagline'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('website_tagline') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="copyright_text">
                        Copyright Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-copyright icon"></i>

                        <input type="text"
                               name="copyright_text"
                               id="copyright_text"
                               value="{{ old('copyright_text', $setting->copyright_text ?? '') }}"
                               placeholder="© 2025 The Real Fragrance World. All Rights Reserved."
                               class="field-input {{ $errors->has('copyright_text') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('copyright_text'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('copyright_text') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="developer_credit">
                        Developer Credit
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-code icon"></i>

                        <input type="text"
                               name="developer_credit"
                               id="developer_credit"
                               value="{{ old('developer_credit', $setting->developer_credit ?? '') }}"
                               placeholder="Website designed by 24siteshop"
                               class="field-input {{ $errors->has('developer_credit') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('developer_credit'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('developer_credit') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        {{-- MEDIA SETTINGS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-images"></i>
                </div>

                <div>
                    <p class="form-card-title">Logo & Media</p>
                    <p class="form-card-subtitle">Upload logo, favicon, footer logo and OG image</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="logo">Logo</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-upload icon"></i>

                        <input type="file"
                               name="logo"
                               id="logo"
                               accept="image/*"
                               class="field-input {{ $errors->has('logo') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('logo'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('logo') }}
                        </p>
                    @endif

                    @if(!empty($setting) && $setting->logo_url)
                        <div class="form-info-box mt-2">
                            <p class="meta-label">Current Logo</p>
                            <img src="{{ $setting->logo_url }}"
                                 alt="Logo"
                                 style="width:120px;height:120px;object-fit:contain;border-radius:16px;background:#fff;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="favicon">Favicon</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-star icon"></i>

                        <input type="file"
                               name="favicon"
                               id="favicon"
                               accept="image/*,.ico"
                               class="field-input {{ $errors->has('favicon') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('favicon'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('favicon') }}
                        </p>
                    @endif

                    @if(!empty($setting) && $setting->favicon_url)
                        <div class="form-info-box mt-2">
                            <p class="meta-label">Current Favicon</p>
                            <img src="{{ $setting->favicon_url }}"
                                 alt="Favicon"
                                 style="width:70px;height:70px;object-fit:contain;border-radius:14px;background:#fff;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="footer_logo">Footer Logo</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>

                        <input type="file"
                               name="footer_logo"
                               id="footer_logo"
                               accept="image/*"
                               class="field-input {{ $errors->has('footer_logo') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('footer_logo'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('footer_logo') }}
                        </p>
                    @endif

                    @if(!empty($setting) && $setting->footer_logo_url)
                        <div class="form-info-box mt-2">
                            <p class="meta-label">Current Footer Logo</p>
                            <img src="{{ $setting->footer_logo_url }}"
                                 alt="Footer Logo"
                                 style="width:120px;height:120px;object-fit:contain;border-radius:16px;background:#fff;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="og_image">OG Image</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-share-alt icon"></i>

                        <input type="file"
                               name="og_image"
                               id="og_image"
                               accept="image/*"
                               class="field-input {{ $errors->has('og_image') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('og_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('og_image') }}
                        </p>
                    @endif

                    @if(!empty($setting) && $setting->og_image_url)
                        <div class="form-info-box mt-2">
                            <p class="meta-label">Current OG Image</p>
                            <img src="{{ $setting->og_image_url }}"
                                 alt="OG Image"
                                 style="width:100%;height:160px;object-fit:cover;border-radius:16px;background:#fff;">
                        </div>
                    @endif
                </div>

            </div>
        </div>

        {{-- SEO SETTINGS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-search"></i>
                </div>

                <div>
                    <p class="form-card-title">SEO Settings</p>
                    <p class="form-card-subtitle">Homepage meta title, description and keywords</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="meta_title">Meta Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="meta_title"
                               id="meta_title"
                               value="{{ old('meta_title', $setting->meta_title ?? '') }}"
                               class="field-input {{ $errors->has('meta_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('meta_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('meta_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="meta_description">Meta Description</label>

                    <textarea name="meta_description"
                              id="meta_description"
                              rows="4"
                              class="field-input {{ $errors->has('meta_description') ? 'error' : '' }}">{{ old('meta_description', $setting->meta_description ?? '') }}</textarea>

                    @if($errors->has('meta_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('meta_description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="meta_keywords">Meta Keywords</label>

                    <textarea name="meta_keywords"
                              id="meta_keywords"
                              rows="3"
                              class="field-input {{ $errors->has('meta_keywords') ? 'error' : '' }}">{{ old('meta_keywords', $setting->meta_keywords ?? '') }}</textarea>

                    @if($errors->has('meta_keywords'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('meta_keywords') }}
                        </p>
                    @else
                        <p class="field-hint">Example: perfume, attar, oud, luxury fragrance</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="canonical_url">Canonical URL</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="canonical_url"
                               id="canonical_url"
                               value="{{ old('canonical_url', $setting->canonical_url ?? '') }}"
                               class="field-input {{ $errors->has('canonical_url') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('canonical_url'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('canonical_url') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        {{-- CONTACT SETTINGS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>

                <div>
                    <p class="form-card-title">Contact Settings</p>
                    <p class="form-card-subtitle">Phone, WhatsApp, email, address and map</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="primary_phone">Primary Phone</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-phone icon"></i>

                        <input type="text"
                               name="primary_phone"
                               id="primary_phone"
                               value="{{ old('primary_phone', $setting->primary_phone ?? '') }}"
                               class="field-input {{ $errors->has('primary_phone') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="secondary_phone">Secondary Phone</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-phone-volume icon"></i>

                        <input type="text"
                               name="secondary_phone"
                               id="secondary_phone"
                               value="{{ old('secondary_phone', $setting->secondary_phone ?? '') }}"
                               class="field-input {{ $errors->has('secondary_phone') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="whatsapp_number">WhatsApp Number</label>

                    <div class="input-icon-wrap">
                        <i class="fab fa-whatsapp icon"></i>

                        <input type="text"
                               name="whatsapp_number"
                               id="whatsapp_number"
                               value="{{ old('whatsapp_number', $setting->whatsapp_number ?? '') }}"
                               placeholder="918591114751"
                               class="field-input {{ $errors->has('whatsapp_number') ? 'error' : '' }}">
                    </div>

                    <p class="field-hint">Use country code without + sign for WhatsApp link.</p>
                </div>

                <div class="field-group">
                    <label class="field-label" for="email_address">Email Address</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-envelope icon"></i>

                        <input type="email"
                               name="email_address"
                               id="email_address"
                               value="{{ old('email_address', $setting->email_address ?? '') }}"
                               class="field-input {{ $errors->has('email_address') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="business_hours">Business Hours</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-clock icon"></i>

                        <input type="text"
                               name="business_hours"
                               id="business_hours"
                               value="{{ old('business_hours', $setting->business_hours ?? '') }}"
                               class="field-input {{ $errors->has('business_hours') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="office_address">Office Address</label>

                    <textarea name="office_address"
                              id="office_address"
                              rows="3"
                              class="field-input {{ $errors->has('office_address') ? 'error' : '' }}">{{ old('office_address', $setting->office_address ?? '') }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="store_address">Store Address</label>

                    <textarea name="store_address"
                              id="store_address"
                              rows="3"
                              class="field-input {{ $errors->has('store_address') ? 'error' : '' }}">{{ old('store_address', $setting->store_address ?? '') }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="google_map_embed">Google Map Embed</label>

                    <textarea name="google_map_embed"
                              id="google_map_embed"
                              rows="4"
                              placeholder="<iframe ...></iframe>"
                              class="field-input {{ $errors->has('google_map_embed') ? 'error' : '' }}">{{ old('google_map_embed', $setting->google_map_embed ?? '') }}</textarea>
                </div>

            </div>
        </div>

        {{-- SOCIAL SETTINGS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-share-alt"></i>
                </div>

                <div>
                    <p class="form-card-title">Social Media</p>
                    <p class="form-card-subtitle">Facebook, Instagram and YouTube profile links</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="facebook_url">Facebook URL</label>

                    <div class="input-icon-wrap">
                        <i class="fab fa-facebook-f icon"></i>

                        <input type="text"
                               name="facebook_url"
                               id="facebook_url"
                               value="{{ old('facebook_url', $setting->facebook_url ?? '') }}"
                               class="field-input {{ $errors->has('facebook_url') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="instagram_url">Instagram URL</label>

                    <div class="input-icon-wrap">
                        <i class="fab fa-instagram icon"></i>

                        <input type="text"
                               name="instagram_url"
                               id="instagram_url"
                               value="{{ old('instagram_url', $setting->instagram_url ?? '') }}"
                               class="field-input {{ $errors->has('instagram_url') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="youtube_url">YouTube URL</label>

                    <div class="input-icon-wrap">
                        <i class="fab fa-youtube icon"></i>

                        <input type="text"
                               name="youtube_url"
                               id="youtube_url"
                               value="{{ old('youtube_url', $setting->youtube_url ?? '') }}"
                               class="field-input {{ $errors->has('youtube_url') ? 'error' : '' }}">
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        @can('setting_edit')
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i>
                Save Settings
            </button>
        @endcan

        <a href="{{ route('admin.home') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection