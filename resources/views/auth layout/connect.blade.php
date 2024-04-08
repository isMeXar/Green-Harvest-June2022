@extends('auth_layout')

@section('content')
<form class="login">
    <div class="login__field">
        <i class="login__icon fas fa-user"></i>
        <input type="text" class="login__input" placeholder="E-mail">
    </div>
    <div class="login__field">
        <i class="login__icon fas fa-lock"></i>
        <input type="password" class="login__input" placeholder="Mot de Passe">
    </div>
    <button class="button login__submit">
        <span class="button__text">Se Connecter</span>
        <i class="button__icon fas fa-chevron-right"></i>
    </button>	
    <a href="/Forgot-Password" class="forgot_pass under_btn">Mot de Passe Oublié ?</a>			
</form>
@endsection