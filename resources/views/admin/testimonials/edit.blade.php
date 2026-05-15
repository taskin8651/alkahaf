@extends('layouts.admin')

@section('page-title', 'Edit Testimonial')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.testimonials.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Testimonial</h2>

        <p class="admin-page-subtitle">
            Update customer review, rating, image and visibility
        </p>
    </div>

    <div class="identity-card">
        @if($testimonial->customer_thumb_url)
            <img src="{{ $testimonial->customer_thumb_url }}"
                 alt="{{ $testimonial->customer_name }}"
                 class="identity-avatar"
                 style="object-fit:cover;">
        @else
            <div class="identity-avatar" style="background:#b88718;">
                {{ strtoupper(substr($testimonial->customer_name, 0, 1)) }}
            </div>
        @endif

        <div>
            <p class="identity-title">{{ $testimonial->customer_name }}</p>
            <p class="identity-subtitle">ID #{{ $testimonial->id }}</p>
        </div>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.testimonials.update', $testimonial->id) }}"
      enctype="multipart/form-data">
    @method('PUT')
    @csrf

    @include('admin.testimonials.form')

    <div class="form-actions-between">
        <div class="form-actions-left">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i>
                {{ trans('global.save') }}
            </button>

            <a href="{{ route('admin.testimonials.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>

        @can('testimonial_delete')
            <button type="submit"
                    form="delete-testimonial-form"
                    class="btn-danger">
                <i class="fas fa-trash-alt"></i>
                Delete Testimonial
            </button>
        @endcan
    </div>
</form>

@can('testimonial_delete')
    <form id="delete-testimonial-form"
          action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
          method="POST"
          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
        @method('DELETE')
        @csrf
    </form>
@endcan

@endsection