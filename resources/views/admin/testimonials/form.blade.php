@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="admin-form-grid">

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-user"></i>
            </div>

            <div>
                <p class="form-card-title">Customer Information</p>
                <p class="form-card-subtitle">Customer name and purchased product</p>
            </div>
        </div>

        <div class="form-card-body">

            <div class="field-group">
                <label class="field-label" for="customer_name">
                    Customer Name <span class="req">*</span>
                </label>

                <div class="input-icon-wrap">
                    <i class="fas fa-user icon"></i>

                    <input type="text"
                           name="customer_name"
                           id="customer_name"
                           value="{{ old('customer_name', $testimonial->customer_name ?? '') }}"
                           required
                           placeholder="Enter customer name"
                           class="field-input {{ $errors->has('customer_name') ? 'error' : '' }}">
                </div>

                @if($errors->has('customer_name'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('customer_name') }}
                    </p>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label" for="product_name">
                    Product Name
                </label>

                <div class="input-icon-wrap">
                    <i class="fas fa-box icon"></i>

                    <input type="text"
                           name="product_name"
                           id="product_name"
                           value="{{ old('product_name', $testimonial->product_name ?? '') }}"
                           placeholder="Example: Oud Perfume"
                           class="field-input {{ $errors->has('product_name') ? 'error' : '' }}">
                </div>

                @if($errors->has('product_name'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('product_name') }}
                    </p>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label" for="customer_image">
                    Customer Image
                </label>

                <div class="input-icon-wrap">
                    <i class="fas fa-upload icon"></i>

                    <input type="file"
                           name="customer_image"
                           id="customer_image"
                           accept="image/*"
                           class="field-input {{ $errors->has('customer_image') ? 'error' : '' }}">
                </div>

                @if($errors->has('customer_image'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('customer_image') }}
                    </p>
                @else
                    <p class="field-hint">
                        Allowed: jpg, jpeg, png, webp. Recommended square image.
                    </p>
                @endif

                @if(!empty($testimonial) && $testimonial->customer_thumb_url)
                    <div class="form-info-box mt-2">
                        <p class="meta-label">Current Image</p>

                        <img src="{{ $testimonial->customer_thumb_url }}"
                             alt="{{ $testimonial->customer_name }}"
                             style="width:120px;height:120px;object-fit:cover;border-radius:50%;">
                    </div>
                @endif
            </div>

        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-star"></i>
            </div>

            <div>
                <p class="form-card-title">Review Details</p>
                <p class="form-card-subtitle">Rating, review text and display status</p>
            </div>
        </div>

        <div class="form-card-body">

            <div class="field-group">
                <label class="field-label" for="rating">
                    Rating <span class="req">*</span>
                </label>

                @php
                    $selectedRating = old('rating', $testimonial->rating ?? 5);
                @endphp

                <div class="input-icon-wrap">
                    <i class="fas fa-star icon"></i>

                    <select name="rating"
                            id="rating"
                            required
                            class="field-input {{ $errors->has('rating') ? 'error' : '' }}">
                        <option value="5" {{ $selectedRating == 5 ? 'selected' : '' }}>5 Star</option>
                        <option value="4" {{ $selectedRating == 4 ? 'selected' : '' }}>4 Star</option>
                        <option value="3" {{ $selectedRating == 3 ? 'selected' : '' }}>3 Star</option>
                        <option value="2" {{ $selectedRating == 2 ? 'selected' : '' }}>2 Star</option>
                        <option value="1" {{ $selectedRating == 1 ? 'selected' : '' }}>1 Star</option>
                    </select>
                </div>

                @if($errors->has('rating'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('rating') }}
                    </p>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label" for="review_text">
                    Review Text
                </label>

                <textarea name="review_text"
                          id="review_text"
                          rows="5"
                          placeholder="Enter customer review"
                          class="field-input {{ $errors->has('review_text') ? 'error' : '' }}">{{ old('review_text', $testimonial->review_text ?? '') }}</textarea>

                @if($errors->has('review_text'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('review_text') }}
                    </p>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label" for="sort_order">
                    Sort Order
                </label>

                <div class="input-icon-wrap">
                    <i class="fas fa-sort-numeric-down icon"></i>

                    <input type="number"
                           name="sort_order"
                           id="sort_order"
                           value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}"
                           class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                </div>

                @if($errors->has('sort_order'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('sort_order') }}
                    </p>
                @endif
            </div>

            <div class="form-info-box">
                <p class="meta-label">Status</p>

                <label class="role-checkbox-item {{ old('status', $testimonial->status ?? 1) ? 'checked' : '' }}">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           class="role-checkbox"
                           {{ old('status', $testimonial->status ?? 1) ? 'checked' : '' }}>

                    <div class="check-icon"></div>

                    <span class="checkbox-text">Active / Show on Website</span>
                </label>
            </div>

        </div>
    </div>

</div>