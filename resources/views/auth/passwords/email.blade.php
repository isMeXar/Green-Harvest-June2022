@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('password.email') }}" class="login">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus> --}}
                <div class="login__field">
                    <i class="login__icon fas fa-user"></i>
                    <input id="email" type="email"
                        class="login__input w-100 form-control @error('email') is-invalid @enderror" name="email"
                        placeholder="Entrer votre E-mail" value="{{ old('email') }}" required autocomplete="email"
                        autofocus>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        {{-- <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button> --}}
        <button class="button login__submit">
            <span class="button__text">Envoyer le Lien</span>
            <i class="button__icon fas fa-chevron-right"></i>
        </button>
        <a href="/login" class="retour under_btn">
            <p>Retour</p>
        </a>
    </form>
@endsection
