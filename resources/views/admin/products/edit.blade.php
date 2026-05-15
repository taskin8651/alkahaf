@extends('layouts.admin')

@section('page-title', 'Edit Product')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.products.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">
            Edit Product
        </h2>

        <p class="admin-page-subtitle">
            Update fragrance product details, media, price and visibility
        </p>
    </div>

    <div class="identity-card">
        @if($product->thumb_url)
            <img src="{{ $product->thumb_url }}"
                 alt="{{ $product->name }}"
                 class="identity-avatar"
                 style="object-fit:cover;">
        @else
            <div class="identity-avatar" style="background:#b88718;">
                {{ strtoupper(substr($product->name, 0, 1)) }}
            </div>
        @endif

        <div>
            <p class="identity-title">{{ $product->name }}</p>
            <p class="identity-subtitle">ID #{{ $product->id }}</p>
        </div>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.products.update', $product->id) }}"
      enctype="multipart/form-data">
    @method('PUT')
    @csrf

    @include('admin.products.form')

    <div class="form-actions-between">
        <div class="form-actions-left">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i>
                {{ trans('global.save') }}
            </button>

            <a href="{{ route('admin.products.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>

        @can('product_delete')
            <button type="submit"
                    form="delete-product-form"
                    class="btn-danger">
                <i class="fas fa-trash-alt"></i>
                Delete Product
            </button>
        @endcan
    </div>
</form>

@can('product_delete')
    <form id="delete-product-form"
          action="{{ route('admin.products.destroy', $product->id) }}"
          method="POST"
          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
        @method('DELETE')
        @csrf
    </form>
@endcan

@endsection