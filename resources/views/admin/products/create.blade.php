@extends('layouts.admin')

@section('page-title', 'Add Product')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.products.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">
            Add Product
        </h2>

        <p class="admin-page-subtitle">
            Create a Al-Kahaf product with image, video, pricing and display order
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.products.store') }}"
      enctype="multipart/form-data">
    @csrf

    @include('admin.products.form')

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.products.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection