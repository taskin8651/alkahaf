@extends('layouts.admin')

@section('page-title', 'Add Testimonial')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.testimonials.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Testimonial</h2>

        <p class="admin-page-subtitle">
            Add a customer review with rating and optional customer image
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.testimonials.store') }}"
      enctype="multipart/form-data">
    @csrf

    @include('admin.testimonials.form')

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.testimonials.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection