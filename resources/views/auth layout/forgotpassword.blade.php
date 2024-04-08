@extends('auth_layout')

@section('content')
<form class="login">
    <div class="login__field">
        <i class="login__icon fas fa-user"></i>
        <input type="text" class="login__input w-100" placeholder="Entrer votre E-mail">
    </div>
    <button class="button login__submit">
        <span class="button__text">Envoyer</span>
        <i class="button__icon fas fa-chevron-right"></i>
    </button>	
    <a href="/Login" class="retour under_btn"><p>Retour</p></a>			
</form>
@endsection