@extends('layouts.admin')

@section('page-title', 'Show Testimonial')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.testimonials.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Testimonial Details</h2>

        <p class="admin-page-subtitle">
            Full details for this customer review
        </p>
    </div>

    <div class="show-actions">
        @can('testimonial_edit')
            <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Testimonial
            </a>
        @endcan

        @can('testimonial_delete')
            <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
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
                @if($testimonial->customer_thumb_url)
                    <img src="{{ $testimonial->customer_thumb_url }}"
                         alt="{{ $testimonial->customer_name }}"
                         class="profile-avatar-lg"
                         style="object-fit:cover;">
                @else
                    <div class="profile-avatar-lg" style="background:#b88718;">
                        {{ strtoupper(substr($testimonial->customer_name, 0, 1)) }}
                    </div>
                @endif

                <p class="profile-title">{{ $testimonial->customer_name }}</p>
                <p class="profile-subtitle">{{ $testimonial->product_name ?? 'Customer Review' }}</p>

                @if($testimonial->status)
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
                        <p class="stat-mini-label">Review ID</p>
                        <p class="stat-mini-value">#{{ $testimonial->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $testimonial->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Rating</p>
                        <p class="stat-mini-value-sm" style="color:#F59E0B;">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $testimonial->rating)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('testimonial_edit')
                    <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Testimonial
                    </a>
                @endcan

                <a href="{{ route('admin.testimonials.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Testimonials
                </a>

                @can('testimonial_create')
                    <a href="{{ route('admin.testimonials.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Testimonial
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

                <p class="detail-section-title">Review Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $testimonial->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Customer Name</span>
                    <span class="detail-value">{{ $testimonial->customer_name }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Product Name</span>
                    <span class="detail-value">{{ $testimonial->product_name ?? '—' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Rating</span>
                    <span class="detail-value">
                        {{ $testimonial->rating }} Star
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($testimonial->status)
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

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($testimonial->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($testimonial->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-comment-dots"></i>
                </div>

                <p class="detail-section-title">Review Text</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($testimonial->review_text)
                    <p style="color:#475569;line-height:1.8;margin:0;">
                        {{ $testimonial->review_text }}
                    </p>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-comment-dots"></i>
                        </div>

                        <p class="assign-empty-title">No review text added</p>
                        <p class="assign-empty-text">This testimonial has no review content yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection