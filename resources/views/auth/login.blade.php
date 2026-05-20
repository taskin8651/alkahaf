<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ trans('global.login') }} | {{ trans('panel.site_title') }}</title>
    
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
                Welcome Back
            </span>

            <h1>Sign in to your Al-Kahaf dashboard</h1>
            <p>
                Manage products, reviews and website settings with the same luxury feel as the frontend.
            </p>

            <div class="auth-points">
                <span><i class="bi bi-shield-check"></i> Secure access</span>
                <span><i class="bi bi-bag-heart"></i> Product management</span>
                <span><i class="bi bi-gem"></i> Premium brand control</span>
            </div>
        </div>

        <div class="auth-card">
            <div class="auth-card-head">
                <span>{{ trans('global.login') }}</span>
                <h2>{{ trans('panel.site_title') }}</h2>
                <p>Enter your credentials to continue.</p>
            </div>

        {{-- INFO MESSAGE --}}
        @if(session('message'))
            <div class="auth-message">
                {{ session('message') }}
            </div>
        @endif

        {{-- FORM --}}
        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf

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
                           autofocus
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

            {{-- REMEMBER + FORGOT --}}
            <div class="auth-row">
                <label class="auth-check">
                    <input type="checkbox" name="remember">
                    {{ trans('global.remember_me') }}
                </label>

                @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="auth-link">
                        {{ trans('global.forgot_password') }}
                    </a>
                @endif
            </div>

            {{-- LOGIN BUTTON --}}
            <button type="submit" class="btn btn-dark auth-submit">
                <i class="bi bi-box-arrow-in-right"></i>
                {{ trans('global.login') }}
            </button>

            {{-- REGISTER LINK --}}
            <div class="auth-footer-link">
                <a href="{{ route('register') }}"
                   class="auth-link">
                    {{ trans('global.register') }}
                </a>
            </div>

        </form>
    </div>
    </section>
</main>
<script src="{{ asset('assets/js/main.js') }}"></script>

   
</body>
</html>
