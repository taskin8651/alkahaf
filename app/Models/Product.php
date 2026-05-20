<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'size',
        'short_description',
        'old_price',
        'sale_price',
        'sort_order',
        'status',
        'click_count',
    ];

    protected $casts = [
        'old_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'status' => 'boolean',
        'click_count' => 'integer',
    ];

    protected static function booted(): void
    {
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('product_image')
            ->singleFile();

        $this
            ->addMediaCollection('product_video')
            ->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->width(500)
            ->height(500)
            ->sharpen(8)
            ->nonQueued();
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('product_image');
    }

    public function getThumbUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('product_image', 'thumb')
            ?: $this->getFirstMediaUrl('product_image');
    }

    public function getVideoUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('product_video');
    }

    public function getWhatsappOrderLinkAttribute(): string
    {
        $defaultNumber = '918591114751';

        $message = "Hello, I want to order: " . $this->name;

        return 'https://wa.me/' . $defaultNumber . '?text=' . urlencode($message);
    }
}
