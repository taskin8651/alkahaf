@extends('layouts.admin')

@section('page-title', 'Testimonials')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Testimonials</h2>

        <p class="admin-page-subtitle">
            Manage customer reviews, ratings and testimonial images
        </p>
    </div>

    @can('testimonial_create')
        <a href="{{ route('admin.testimonials.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Testimonial
        </a>
    @endcan
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Reviews</p>
        <p class="stat-value">{{ $testimonials->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $testimonials->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $testimonials->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">5 Star</p>
        <p class="stat-value">{{ $testimonials->where('rating', 5)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Testimonials</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Testimonial">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Rating</th>
                    <th>Review</th>
                    <th>Status</th>
                    <th>Sort</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($testimonials as $testimonial)
                    <tr data-entry-id="{{ $testimonial->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $testimonial->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @if($testimonial->customer_thumb_url)
                                    <img src="{{ $testimonial->customer_thumb_url }}"
                                         alt="{{ $testimonial->customer_name }}"
                                         class="avatar-circle"
                                         style="object-fit:cover;">
                                @else
                                    <div class="avatar-circle" style="background:#b88718;">
                                        {{ strtoupper(substr($testimonial->customer_name, 0, 1)) }}
                                    </div>
                                @endif

                                <div>
                                    <p class="table-main-text">{{ $testimonial->customer_name }}</p>
                                    <p class="table-sub-text">Customer Review</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            @if($testimonial->product_name)
                                <span class="role-tag">{{ $testimonial->product_name }}</span>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td>
                            <div style="color:#F59E0B;font-size:13px;letter-spacing:1px;">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $testimonial->rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                        </td>

                        <td style="max-width:280px;">
                            <p class="table-sub-text">
                                {{ Str::limit($testimonial->review_text, 70) }}
                            </p>
                        </td>

                        <td>
                            @if($testimonial->status)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#166534;">Active</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">Inactive</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            <span class="id-text">{{ $testimonial->sort_order }}</span>
                        </td>

                        <td>
                            <div class="action-row">
                                @can('testimonial_show')
                                    <a href="{{ route('admin.testimonials.show', $testimonial->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('testimonial_edit')
                                    <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('testimonial_delete')
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn-outline btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
$(function () {
    initAdminDataTable('.datatable-Testimonial', {
        canDelete: @can('testimonial_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.testimonials.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search testimonials...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ testimonials'
    });
});
</script>
@endsection