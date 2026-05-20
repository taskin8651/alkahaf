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
                <i class="fas fa-box-open"></i>
            </div>

            <div>
                <p class="form-card-title">Product Information</p>
                <p class="form-card-subtitle">Basic Al-Kahaf product details</p>
            </div>
        </div>

        <div class="form-card-body">

            <div class="field-group">
                <label class="field-label" for="name">
                    Product Name <span class="req">*</span>
                </label>

                <div class="input-icon-wrap">
                    <i class="fas fa-box icon"></i>

                    <input type="text"
                           name="name"
                           id="name"
                           value="{{ old('name', $product->name ?? '') }}"
                           required
                           placeholder="Enter product name"
                           class="field-input {{ $errors->has('name') ? 'error' : '' }}">
                </div>

                @if($errors->has('name'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('name') }}
                    </p>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label" for="category">
                    Category
                </label>

                @php
                    $selectedCategory = old('category', $product->category ?? '');
                @endphp

                <div class="input-icon-wrap">
                    <i class="fas fa-tags icon"></i>

                    <select name="category"
                            id="category"
                            class="field-input {{ $errors->has('category') ? 'error' : '' }}">
                        <option value="">Select Category</option>
                        <option value="Perfume" {{ $selectedCategory == 'Perfume' ? 'selected' : '' }}>Perfume</option>
                        <option value="Attar" {{ $selectedCategory == 'Attar' ? 'selected' : '' }}>Attar</option>
                        <option value="Oud" {{ $selectedCategory == 'Oud' ? 'selected' : '' }}>Oud</option>
                        <option value="Discovery Set" {{ $selectedCategory == 'Discovery Set' ? 'selected' : '' }}>Discovery Set</option>
                        <option value="Wholesale" {{ $selectedCategory == 'Wholesale' ? 'selected' : '' }}>Wholesale</option>
                    </select>
                </div>

                @if($errors->has('category'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('category') }}
                    </p>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label" for="size">
                    Size
                </label>

                <div class="input-icon-wrap">
                    <i class="fas fa-ruler-combined icon"></i>

                    <input type="text"
                           name="size"
                           id="size"
                           value="{{ old('size', $product->size ?? '') }}"
                           placeholder="Example: 50ml / 6ml / 2ml x 6 Vials"
                           class="field-input {{ $errors->has('size') ? 'error' : '' }}">
                </div>

                @if($errors->has('size'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('size') }}
                    </p>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label" for="short_description">
                    Short Description
                </label>

                <textarea name="short_description"
                          id="short_description"
                          rows="4"
                          placeholder="Enter short product description"
                          class="field-input {{ $errors->has('short_description') ? 'error' : '' }}">{{ old('short_description', $product->short_description ?? '') }}</textarea>

                @if($errors->has('short_description'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('short_description') }}
                    </p>
                @else
                    <p class="field-hint">
                        This description will show on product card.
                    </p>
                @endif
            </div>

        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-rupee-sign"></i>
            </div>

            <div>
                <p class="form-card-title">Pricing & Visibility</p>
                <p class="form-card-subtitle">Sale price, old price and display status</p>
            </div>
        </div>

        <div class="form-card-body">

            <div class="field-group">
                <label class="field-label" for="old_price">
                    Old Price
                </label>

                <div class="input-icon-wrap">
                    <i class="fas fa-tag icon"></i>

                    <input type="number"
                           step="0.01"
                           name="old_price"
                           id="old_price"
                           value="{{ old('old_price', $product->old_price ?? '') }}"
                           placeholder="Example: 6500"
                           class="field-input {{ $errors->has('old_price') ? 'error' : '' }}">
                </div>

                @if($errors->has('old_price'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('old_price') }}
                    </p>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label" for="sale_price">
                    Sale Price
                </label>

                <div class="input-icon-wrap">
                    <i class="fas fa-percent icon"></i>

                    <input type="number"
                           step="0.01"
                           name="sale_price"
                           id="sale_price"
                           value="{{ old('sale_price', $product->sale_price ?? '') }}"
                           placeholder="Example: 3000"
                           class="field-input {{ $errors->has('sale_price') ? 'error' : '' }}">
                </div>

                @if($errors->has('sale_price'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('sale_price') }}
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
                           value="{{ old('sort_order', $product->sort_order ?? 0) }}"
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
                <p class="meta-label">Product Status</p>

                <label class="role-checkbox-item {{ old('status', $product->status ?? 1) ? 'checked' : '' }}">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           class="role-checkbox"
                           {{ old('status', $product->status ?? 1) ? 'checked' : '' }}>

                    <div class="check-icon"></div>

                    <span class="checkbox-text">Active / Show on Website</span>
                </label>
            </div>

        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-image"></i>
            </div>

            <div>
                <p class="form-card-title">Product Image</p>
                <p class="form-card-subtitle">Upload product image using MediaLibrary</p>
            </div>
        </div>

        <div class="form-card-body">

            <div class="field-group">
                <label class="field-label" for="product_image">
                    Product Image
                </label>

                <div class="input-icon-wrap">
                    <i class="fas fa-upload icon"></i>

                    <input type="file"
                           name="product_image"
                           id="product_image"
                           accept="image/*"
                           class="field-input {{ $errors->has('product_image') ? 'error' : '' }}">
                </div>

                @if($errors->has('product_image'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('product_image') }}
                    </p>
                @else
                    <p class="field-hint">
                        Allowed: jpg, jpeg, png, webp. Recommended square image.
                    </p>
                @endif
            </div>

            @if(!empty($product) && $product->thumb_url)
                <div class="form-info-box">
                    <p class="meta-label">Current Image</p>

                    <img src="{{ $product->thumb_url }}"
                         alt="{{ $product->name }}"
                         style="width:140px;height:140px;object-fit:cover;border-radius:18px;">
                </div>
            @endif

        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-play-circle"></i>
            </div>

            <div>
                <p class="form-card-title">Product Video</p>
                <p class="form-card-subtitle">Upload optional product video</p>
            </div>
        </div>

        <div class="form-card-body">

            <div class="field-group">
                <label class="field-label" for="product_video">
                    Product Video
                </label>

                <div class="input-icon-wrap">
                    <i class="fas fa-video icon"></i>

                    <input type="file"
                           name="product_video"
                           id="product_video"
                           accept="video/mp4,video/webm,video/quicktime"
                           class="field-input {{ $errors->has('product_video') ? 'error' : '' }}">
                </div>

                @if($errors->has('product_video'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('product_video') }}
                    </p>
                @else
                    <p class="field-hint">
                        Allowed: mp4, mov, webm. Max size depends on controller validation.
                    </p>
                @endif
            </div>

            @if(!empty($product) && $product->video_url)
                <div class="form-info-box">
                    <p class="meta-label">Current Video</p>

                    <video width="100%"
                           height="220"
                           controls
                           style="border-radius:18px;object-fit:cover;background:#111;">
                        <source src="{{ $product->video_url }}">
                    </video>
                </div>
            @endif

        </div>
    </div>

</div>