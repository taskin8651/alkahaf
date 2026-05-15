<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Testimonial extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;

    protected $fillable = [
        'customer_name',
        'product_name',
        'rating',
        'review_text',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'rating' => 'integer',
        'sort_order' => 'integer',
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('testimonial_image')
            ->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->width(400)
            ->height(400)
            ->sharpen(8)
            ->nonQueued();
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('testimonial_image');
    }

    public function getThumbUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('testimonial_image', 'thumb')
            ?: $this->getFirstMediaUrl('testimonial_image');
    }
}