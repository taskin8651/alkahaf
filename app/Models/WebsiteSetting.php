<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class WebsiteSetting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
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
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')->singleFile();
        $this->addMediaCollection('favicon')->singleFile();
        $this->addMediaCollection('footer_logo')->singleFile();
        $this->addMediaCollection('og_image')->singleFile();
    }

    public function getLogoUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('logo');
    }

    public function getFaviconUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('favicon');
    }

    public function getFooterLogoUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('footer_logo');
    }

    public function getOgImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('og_image');
    }
}