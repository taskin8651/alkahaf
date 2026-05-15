@extends('layouts.admin')

@section('page-title', 'Products')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Products</h2>
        <p class="admin-page-subtitle">
            Manage fragrance products, media, pricing and visibility
        </p>
    </div>

    @can('product_create')
        <a href="{{ route('admin.products.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Product
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Products</p>
        <p class="stat-value">{{ $products->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $products->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $products->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">With Video</p>
        <p class="stat-value">
            {{ $products->filter(fn($product) => $product->video_url)->count() }}
        </p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Products</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Product image and video are managed via MediaLibrary
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Product">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Media</th>
                    <th>Status</th>
                    <th>Sort</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                    <tr data-entry-id="{{ $product->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $product->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @if($product->thumb_url)
                                    <img src="{{ $product->thumb_url }}"
                                         alt="{{ $product->name }}"
                                         class="avatar-circle"
                                         style="object-fit:cover;">
                                @else
                                    <div class="avatar-circle" style="background:#b88718;">
                                        <i class="fas fa-box"></i>
                                    </div>
                                @endif

                                <div>
                                    <p class="table-main-text">{{ $product->name }}</p>
                                    <p class="table-sub-text">
                                        {{ Str::limit($product->short_description, 45) }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            @if($product->category)
                                <span class="role-tag">{{ $product->category }}</span>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td style="color:#475569;">
                            {{ $product->size ?? '—' }}
                        </td>

                        <td>
                            @if($product->old_price)
                                <del style="font-size:12px;color:#94A3B8;">
                                    ₹{{ number_format($product->old_price, 0) }}
                                </del>
                            @endif

                            @if($product->sale_price)
                                <p class="table-main-text mb-0">
                                    ₹{{ number_format($product->sale_price, 0) }}
                                </p>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td>
                            <div class="tag-wrap">
                                @if($product->thumb_url)
                                    <span class="role-tag">
                                        <i class="fas fa-image"></i>
                                        Image
                                    </span>
                                @endif

                                @if($product->video_url)
                                    <span class="role-tag">
                                        <i class="fas fa-play-circle"></i>
                                        Video
                                    </span>
                                @endif

                                @if(!$product->thumb_url && !$product->video_url)
                                    <span style="font-size:12px; color:#94A3B8;">No Media</span>
                                @endif
                            </div>
                        </td>

                        <td>
                            @if($product->status)
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
                            <span class="id-text">{{ $product->sort_order }}</span>
                        </td>

                        <td>
                            <div class="action-row">
                                @can('product_show')
                                    <a href="{{ route('admin.products.show', $product->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('product_edit')
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('product_delete')
                                    <form action="{{ route('admin.products.destroy', $product->id) }}"
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
    initAdminDataTable('.datatable-Product', {
        canDelete: false,
        massDeleteUrl: "",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search products...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ products'
    });
});
</script>
@endsection