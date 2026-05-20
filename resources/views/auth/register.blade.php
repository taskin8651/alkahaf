@extends('layouts.app')
@section('content')

<main class="auth-page">
    <div class="auth-bg-glow"></div>

    <section class="auth-shell auth-shell-single">
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
                    <i class="fa fa-user"></i>
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
                    <i class="fa fa-envelope"></i>
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
                    <i class="fa fa-lock"></i>
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
                    <i class="fa fa-lock"></i>
                    <input type="password"
                           name="password_confirmation"
                           required>
                </div>
            </div>

            {{-- ACTION --}}
            <button type="submit" class="btn btn-dark auth-submit">
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

@endsection
