@extends('layouts.admin')

@section('styles')
<style>
    .dashboard-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .dashboard-title {
        margin: 0;
        color: #0f172a;
        font-size: 24px;
        font-weight: 800;
    }

    .dashboard-subtitle {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 13px;
    }

    .dashboard-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .dashboard-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        min-height: 40px;
        padding: 10px 15px;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        background: #fff;
        color: #334155;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
    }

    .dashboard-btn.primary {
        border-color: var(--accent);
        background: var(--accent);
        color: #fff;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 16px;
        margin-bottom: 16px;
    }

    .stat-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 20px;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
    }

    .stat-label {
        margin: 0 0 8px;
        color: #64748b;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .06em;
    }

    .stat-value {
        margin: 0;
        color: #0f172a;
        font-size: 30px;
        font-weight: 800;
        line-height: 1;
    }

    .stat-hint {
        margin: 10px 0 0;
        color: #94a3b8;
        font-size: 12px;
    }

    .stat-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        color: var(--accent);
        background: var(--accent-light);
        flex: none;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: 1.45fr .9fr;
        gap: 16px;
        align-items: start;
    }

    .dashboard-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        overflow: hidden;
    }

    .dashboard-card-head {
        padding: 18px 20px;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .dashboard-card-title {
        margin: 0;
        color: #0f172a;
        font-size: 15px;
        font-weight: 800;
    }

    .dashboard-card-subtitle {
        margin: 4px 0 0;
        color: #94a3b8;
        font-size: 12px;
    }

    .product-click-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
    }

    .product-click-table th {
        padding: 12px 20px;
        background: #f8fafc;
        border-bottom: 1px solid #eef2f7;
        color: #64748b;
        font-size: 11px;
        font-weight: 800;
        text-align: left;
        text-transform: uppercase;
        letter-spacing: .06em;
    }

    .product-click-table td {
        padding: 14px 20px;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
        vertical-align: middle;
    }

    .product-click-table tr:last-child td {
        border-bottom: 0;
    }

    .product-name {
        margin: 0;
        color: #0f172a;
        font-size: 13px;
        font-weight: 800;
    }

    .product-meta {
        margin: 3px 0 0;
        color: #94a3b8;
        font-size: 12px;
    }

    .status-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 800;
    }

    .status-pill.active {
        background: #dcfce7;
        color: #15803d;
    }

    .status-pill.inactive {
        background: #fee2e2;
        color: #b91c1c;
    }

    .click-badge {
        display: inline-flex;
        min-width: 52px;
        justify-content: center;
        padding: 6px 10px;
        border-radius: 999px;
        background: var(--accent-light);
        color: var(--accent);
        font-weight: 900;
    }

    .bar-list {
        padding: 18px 20px 20px;
        display: grid;
        gap: 16px;
    }

    .bar-row-head {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 8px;
        color: #334155;
        font-size: 13px;
        font-weight: 800;
    }

    .bar-track {
        height: 9px;
        border-radius: 999px;
        background: #eef2f7;
        overflow: hidden;
    }

    .bar-fill {
        height: 100%;
        border-radius: inherit;
        background: linear-gradient(90deg, var(--accent), #0ea5e9);
    }

    .empty-state {
        padding: 36px 20px;
        text-align: center;
        color: #64748b;
    }

    .empty-state i {
        display: block;
        margin-bottom: 10px;
        color: #cbd5e1;
        font-size: 28px;
    }

    @media (max-width: 1100px) {
        .stats-grid,
        .dashboard-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 760px) {
        .stats-grid,
        .dashboard-grid {
            grid-template-columns: 1fr;
        }

        .product-click-table {
            min-width: 640px;
        }

        .table-wrap {
            overflow-x: auto;
        }
    }
</style>
@endsection

@section('content')
<div class="dashboard-head">
    <div>
        <h2 class="dashboard-title">Product Dashboard</h2>
        <p class="dashboard-subtitle">Product count aur product click performance yahan se track hoga.</p>
    </div>

    <div class="dashboard-actions">
        <a href="{{ route('admin.products.index') }}" class="dashboard-btn">
            <i class="fas fa-box"></i>
            Products
        </a>
        <a href="{{ route('admin.products.create') }}" class="dashboard-btn primary">
            <i class="fas fa-plus"></i>
            Add Product
        </a>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div>
            <p class="stat-label">Total Products</p>
            <p class="stat-value">{{ number_format($totalProducts) }}</p>
            <p class="stat-hint">All products in catalog</p>
        </div>
        <div class="stat-icon"><i class="fas fa-box-open"></i></div>
    </div>

    <div class="stat-card">
        <div>
            <p class="stat-label">Active Products</p>
            <p class="stat-value">{{ number_format($activeProducts) }}</p>
            <p class="stat-hint">Visible on frontend</p>
        </div>
        <div class="stat-icon" style="background:#dcfce7; color:#15803d;"><i class="fas fa-check"></i></div>
    </div>

    <div class="stat-card">
        <div>
            <p class="stat-label">Hidden Products</p>
            <p class="stat-value">{{ number_format($inactiveProducts) }}</p>
            <p class="stat-hint">Not visible to customers</p>
        </div>
        <div class="stat-icon" style="background:#fee2e2; color:#b91c1c;"><i class="fas fa-eye-slash"></i></div>
    </div>

    <div class="stat-card">
        <div>
            <p class="stat-label">Total Clicks</p>
            <p class="stat-value">{{ number_format($totalClicks) }}</p>
            <p class="stat-hint">WhatsApp order button clicks</p>
        </div>
        <div class="stat-icon" style="background:#e0f2fe; color:#0284c7;"><i class="fas fa-mouse-pointer"></i></div>
    </div>
</div>

<div class="dashboard-grid">
    <div class="dashboard-card">
        <div class="dashboard-card-head">
            <div>
                <p class="dashboard-card-title">Product Click Report</p>
                <p class="dashboard-card-subtitle">Kaunse product par kitni baar click hua</p>
            </div>
        </div>

        <div class="table-wrap">
            <table class="product-click-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Clicks</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($topProducts as $product)
                        <tr>
                            <td>
                                <p class="product-name">{{ $product->name }}</p>
                                <p class="product-meta">{{ $product->size ?: 'No size added' }}</p>
                            </td>
                            <td>{{ $product->category ?: 'Product' }}</td>
                            <td>
                                <span class="status-pill {{ $product->status ? 'active' : 'inactive' }}">
                                    <i class="fas fa-circle" style="font-size:7px;"></i>
                                    {{ $product->status ? 'Active' : 'Hidden' }}
                                </span>
                            </td>
                            <td><span class="click-badge">{{ number_format($product->click_count) }}</span></td>
                            <td>
                                @if($product->sale_price)
                                    Rs {{ number_format($product->sale_price, 0) }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <i class="fas fa-box-open"></i>
                                    No products found.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="dashboard-card-head">
            <div>
                <p class="dashboard-card-title">Top Clicked Products</p>
                <p class="dashboard-card-subtitle">Visual ranking by clicks</p>
            </div>
        </div>

        @php
            $maxClicks = max(1, (int) $topProducts->max('click_count'));
        @endphp

        @if($topProducts->count())
            <div class="bar-list">
                @foreach($topProducts->take(6) as $product)
                    @php
                        $percent = max(4, round(($product->click_count / $maxClicks) * 100));
                    @endphp
                    <div>
                        <div class="bar-row-head">
                            <span>{{ $product->name }}</span>
                            <span>{{ number_format($product->click_count) }}</span>
                        </div>
                        <div class="bar-track">
                            <div class="bar-fill" style="width: {{ $percent }}%;"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-chart-bar"></i>
                Click data will show after product clicks.
            </div>
        @endif
    </div>
</div>

<div class="dashboard-card" style="margin-top:16px;">
    <div class="dashboard-card-head">
        <div>
            <p class="dashboard-card-title">Latest Products</p>
            <p class="dashboard-card-subtitle">Recently added products</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="dashboard-btn">View All</a>
    </div>

    <div class="table-wrap">
        <table class="product-click-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Clicks</th>
                    <th>Added</th>
                </tr>
            </thead>
            <tbody>
                @forelse($latestProducts as $product)
                    <tr>
                        <td>
                            <p class="product-name">{{ $product->name }}</p>
                            <p class="product-meta">{{ $product->short_description ? \Illuminate\Support\Str::limit($product->short_description, 54) : 'No description' }}</p>
                        </td>
                        <td>{{ $product->category ?: 'Product' }}</td>
                        <td>
                            <span class="status-pill {{ $product->status ? 'active' : 'inactive' }}">
                                {{ $product->status ? 'Active' : 'Hidden' }}
                            </span>
                        </td>
                        <td><span class="click-badge">{{ number_format($product->click_count) }}</span></td>
                        <td>{{ $product->created_at?->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <i class="fas fa-box-open"></i>
                                No products found.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
