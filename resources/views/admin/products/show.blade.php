@extends('layouts.admin')

@section('page-title', 'Show Product')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.products.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Product Details</h2>

        <p class="admin-page-subtitle">
            Full details for this Al-Kahaf product
        </p>
    </div>

    <div class="show-actions">
        @can('product_edit')
            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Product
            </a>
        @endcan

        @can('product_delete')
            <form action="{{ route('admin.products.destroy', $product->id) }}"
                  method="POST"
                  onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn-danger">
                    <i class="fas fa-trash-alt"></i>
                    Delete
                </button>
            </form>
        @endcan
    </div>
</div>

<div class="show-grid">

    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                @if($product->thumb_url)
                    <img src="{{ $product->thumb_url }}"
                         alt="{{ $product->name }}"
                         class="profile-avatar-lg"
                         style="object-fit:cover;">
                @else
                    <div class="profile-avatar-lg" style="background:#b88718;">
                        {{ strtoupper(substr($product->name, 0, 1)) }}
                    </div>
                @endif

                <p class="profile-title">{{ $product->name }}</p>
                <p class="profile-subtitle">{{ $product->category ?? 'Product' }}</p>

                @if($product->status)
                    <span class="status-pill success">
                        <i class="fas fa-check-circle"></i>
                        Active
                    </span>
                @else
                    <span class="status-pill warning">
                        <i class="fas fa-clock"></i>
                        Inactive
                    </span>
                @endif
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Product ID</p>
                        <p class="stat-mini-value">#{{ $product->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $product->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Sale Price</p>
                        <p class="stat-mini-value-sm">
                            @if($product->sale_price)
                                ₹{{ number_format($product->sale_price, 0) }}
                            @else
                                —
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('product_edit')
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Product
                    </a>
                @endcan

                <a href="{{ route('admin.products.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Products
                </a>

                @can('product_create')
                    <a href="{{ route('admin.products.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Product
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <p class="detail-section-title">Product Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $product->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $product->name }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Slug</span>
                    <span class="detail-value code-pill">{{ $product->slug }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Category</span>
                    <span class="detail-value">{{ $product->category ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Size</span>
                    <span class="detail-value">{{ $product->size ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Old Price</span>
                    <span class="detail-value">
                        @if($product->old_price)
                            ₹{{ number_format($product->old_price, 0) }}
                        @else
                            —
                        @endif
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sale Price</span>
                    <span class="detail-value">
                        @if($product->sale_price)
                            ₹{{ number_format($product->sale_price, 0) }}
                        @else
                            —
                        @endif
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($product->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($product->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <p class="detail-section-title">Description</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($product->short_description)
                    <p style="color:#475569;line-height:1.8;margin:0;">
                        {{ $product->short_description }}
                    </p>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-align-left"></i>
                        </div>

                        <p class="assign-empty-title">No description added</p>
                        <p class="assign-empty-text">This product has no short description yet.</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head between">
                <div class="d-flex align-items-center gap-2">
                    <div class="detail-section-icon">
                        <i class="fas fa-photo-video"></i>
                    </div>

                    <p class="detail-section-title">Product Media</p>
                </div>

                <span class="status-pill success">
                    MediaLibrary
                </span>
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-3" style="grid-template-columns: 1fr 1fr;">
                    <div>
                        <p class="meta-small-label">Product Image</p>

                        @if($product->thumb_url)
                            <img src="{{ $product->thumb_url }}"
                                 alt="{{ $product->name }}"
                                 style="width:100%;height:220px;object-fit:cover;border-radius:18px;">
                        @else
                            <div class="assign-empty">
                                <div class="assign-empty-icon">
                                    <i class="fas fa-image"></i>
                                </div>

                                <p class="assign-empty-title">No image</p>
                            </div>
                        @endif
                    </div>

                    <div>
                        <p class="meta-small-label">Product Video</p>

                        @if($product->video_url)
                            <video width="100%"
                                   height="220"
                                   controls
                                   style="border-radius:18px;object-fit:cover;background:#111;">
                                <source src="{{ $product->video_url }}">
                            </video>
                        @else
                            <div class="assign-empty">
                                <div class="assign-empty-icon">
                                    <i class="fas fa-video"></i>
                                </div>

                                <p class="assign-empty-title">No video</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection