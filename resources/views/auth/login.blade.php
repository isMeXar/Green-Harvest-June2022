@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('login') }}" class="login">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus> --}}
                <div class="login__field">
                    <i class="login__icon fas fa-user"></i>
                    <input type="email" class="login__input form-control @error('email') is-invalid @enderror" name="email"
                        id="email" placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email"
                        autofocus>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                {{-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password"> --}}
                <div class="login__field">
                    <i class="login__icon fas fa-lock"></i>
                    <input id="password" type="password" class="login__input form-control @error('password') is-invalid @enderror"
                     placeholder="Mot de Passe" name="password" required autocomplete="current-password">
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- <div class="row mb-3">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div> --}}

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                {{-- <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button> --}}
                <button class="button login__submit" type="submit">
                    <span class="button__text">Se Connecter</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>
                @if (Route::has('password.request'))
                    {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a> --}}
                    <a href="{{ route('password.request') }}" class="forgot_pass under_btn">Mot de Passe Oublié ?</a>
                @endif
            </div>
        </div>
    </form>
@endsection
