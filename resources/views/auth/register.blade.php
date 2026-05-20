<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ trans('global.register') }} | {{ trans('panel.site_title') }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

</head>
<body>

<main class="auth-page">
    <div class="auth-bg-glow"></div>

    <section class="auth-shell">
        <div class="auth-brand-panel">
            <a href="{{ route('home') }}" class="auth-brand">
                <img src="{{ asset('assets/img/logo.png') }}"
                     alt="{{ trans('panel.site_title') }} Logo"
                     class="auth-logo">
                <span>
                    <strong>{{ trans('panel.site_title') }}</strong>
                    <small>Al-Kahaf</small>
                </span>
            </a>

            <span class="eyebrow auth-eyebrow">
                <i class="bi bi-stars"></i>
                Join The Experience
            </span>

            <h1>Create your Al-Kahaf dashboard account</h1>
            <p>
                Start managing products, reviews and brand settings with the same premium feel as the storefront.
            </p>

            <div class="auth-points">
                <span><i class="bi bi-shield-check"></i> Secure registration</span>
                <span><i class="bi bi-bag-heart"></i> Product management</span>
                <span><i class="bi bi-gem"></i> Premium brand control</span>
            </div>
        </div>

        <div class="auth-card">

        {{-- HEADER --}}
        <div class="auth-card-head">
            <span>{{ trans('global.register') }}</span>
            <h2>
                {{ trans('panel.site_title') }}
            </h2>
            <p>Create your account to continue.</p>
        </div>

        {{-- FORM --}}
        <form method="POST" action="{{ route('register') }}" class="auth-form">
            @csrf

            {{-- NAME --}}
            <div class="auth-field">
                <label>
                    {{ trans('global.user_name') }}
                </label>
                <div class="auth-input-wrap">
                    <i class="bi bi-person"></i>
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           autofocus
                           class="{{ $errors->has('name') ? 'is-invalid' : '' }}">
                </div>
                @if($errors->has('name'))
                    <p class="auth-error">
                        {{ $errors->first('name') }}
                    </p>
                @endif
            </div>

            {{-- EMAIL --}}
            <div class="auth-field">
                <label>
                    {{ trans('global.login_email') }}
                </label>
                <div class="auth-input-wrap">
                    <i class="bi bi-envelope"></i>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           class="{{ $errors->has('email') ? 'is-invalid' : '' }}">
                </div>
                @if($errors->has('email'))
                    <p class="auth-error">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>

            {{-- PASSWORD --}}
            <div class="auth-field">
                <label>
                    {{ trans('global.login_password') }}
                </label>
                <div class="auth-input-wrap">
                    <i class="bi bi-lock"></i>
                    <input type="password"
                           name="password"
                           required
                           class="{{ $errors->has('password') ? 'is-invalid' : '' }}">
                </div>
                @if($errors->has('password'))
                    <p class="auth-error">
                        {{ $errors->first('password') }}
                    </p>
                @endif
            </div>

            {{-- CONFIRM PASSWORD --}}
            <div class="auth-field">
                <label>
                    {{ trans('global.login_password_confirmation') }}
                </label>
                <div class="auth-input-wrap">
                    <i class="bi bi-lock"></i>
                    <input type="password"
                           name="password_confirmation"
                           required>
                </div>
            </div>

            {{-- ACTION --}}
            <button type="submit" class="btn btn-dark auth-submit">
                <i class="bi bi-person-plus"></i>
                {{ trans('global.register') }}
            </button>

            {{-- LOGIN LINK --}}
            <div class="auth-footer-link">
                <a href="{{ route('login') }}" class="auth-link">
                    Already have an account? Login
                </a>
            </div>

        </form>
    </div>
    </section>
</main>

<script src="{{ asset('assets/js/main.js') }}"></script>

   
</body>
</html>
