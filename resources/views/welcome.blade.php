<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ trans('panel.site_title') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <main class="auth-page">
        <div class="auth-bg-glow"></div>

        <section class="auth-shell auth-shell-single">
            <div class="auth-card">
                <div class="auth-card-head">
                    <span>Welcome</span>
                    <h2>{{ trans('panel.site_title') }}</h2>
                    <p>Continue to your account.</p>
                </div>

                @auth
                    <a href="{{ url('/home') }}" class="btn btn-dark auth-submit">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-dark auth-submit">Login</a>
                @endauth
            </div>
        </section>
    </main>
</body>
</html>
