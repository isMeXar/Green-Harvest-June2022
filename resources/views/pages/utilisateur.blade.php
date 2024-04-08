@extends('layout')


@section('content')

    <div class="row  mb-3">
        <div class="col-12 col-sm-0 mb-xl-0 mb-3">
            <div class="card shadow-lg">
                <div class="card-body p-0 pt-2">
                    <div class="px-4 d-flex justify-content-between align-items-center">
                        <h6>Ajouter Un Nouveau Rôle</h6>
                        <button class="btn p-0 mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#add_role"
                            aria-expanded="false" aria-controls="add_role">
                            <input type="checkbox" class="hidden openach" id="s_checkbox" name="pages[]" hidden />
                            <label class="text-center" style="cursor: pointer;" for="s_checkbox"><i
                                    class="bi bi-plus-circle-fill fa-2x"></i></label>
                        </button>
                    </div>
                    <form action="{{ action('App\Http\Controllers\UsersController@store') }}" method="POST" id="add_role"
                        class="px-4 pt-2 collapse">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="text-sm form-label">Rôle</label>
                                    <input class="form-control inputfield" type="text" name="role">
                                </div>
                            </div>
                            <h6 style="position: relative; bottom: -30px; left: 30px;width:115px;"
                                class="bg-white text-sm form-label">Autorisation</h6>
                            <div class="d-flex align-items-center justify-content-between border border-dark rounded-3 pt-2 pb-4 px-4 mt-3 mx-3"
                                style="grid-gap: 1rem;width: 97%;">
                                <div class="col-xl-5 col-sm-0 mb-xl-0 mt-4">

                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="text-sm form-label">Statistique d'acceuil :</h6>
                                        <fieldset class="radio-switch">
                                            <legend>
                                                Settings
                                            </legend>
                                            <input type="radio" name="home_statistics" id="home_statistics_true" value="1">
                                            <label for="home_statistics_true">
                                                on
                                            </label>

                                            <input type="radio" name="home_statistics" id="home_statistics_false" value="0"
                                                checked>
                                            <label for="home_statistics_false">
                                                off
                                            </label>
                                        </fieldset>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="text-sm form-label">Parcelle :</h6>
                                        <fieldset class="radio-switch">
                                            <legend>
                                                Settings
                                            </legend>
                                            <input type="radio" name="isparcelle" id="isparcelle_true" value="1">
                                            <label for="isparcelle_true">
                                                on
                                            </label>

                                            <input type="radio" name="isparcelle" id="isparcelle_false" value="0" checked>
                                            <label for="isparcelle_false">
                                                off
                                            </label>
                                        </fieldset>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="text-sm form-label">Produit :</h6>
                                        <fieldset class="radio-switch">
                                            <legend>
                                                Settings
                                            </legend>
                                            <input type="radio" name="isproduit" id="isproduit_true" value="1">
                                            <label for="isproduit_true">
                                                on
                                            </label>

                                            <input type="radio" name="isproduit" id="isproduit_false" value="0" checked>
                                            <label for="isproduit_false">
                                                off
                                            </label>
                                        </fieldset>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="text-sm form-label">Client :</h6>
                                        <fieldset class="radio-switch">
                                            <legend>
                                                Settings
                                            </legend>
                                            <input type="radio" name="isclient" id="isclient_true" value="1">
                                            <label for="isclient_true">
                                                on
                                            </label>

                                            <input type="radio" name="isclient" id="isclient_false" value="0" checked>
                                            <label for="isclient_false">
                                                off
                                            </label>
                                        </fieldset>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="text-sm form-label">Ajouter Récolte :</h6>
                                        <fieldset class="radio-switch">
                                            <legend>
                                                Settings
                                            </legend>
                                            <input type="radio" name="isadd_recolte" id="isadd_recolte_true" value="1">
                                            <label for="isadd_recolte_true">
                                                on
                                            </label>

                                            <input type="radio" name="isadd_recolte" id="isadd_recolte_false" value="0"
                                                checked>
                                            <label for="isadd_recolte_false">
                                                off
                                            </label>
                                        </fieldset>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="text-sm form-label">Modifier Récolte :</h6>
                                        <fieldset class="radio-switch">
                                            <legend>
                                                Settings
                                            </legend>
                                            <input type="radio" name="isedit_recolte" id="isedit_recolte_true" value="1">
                                            <label for="isedit_recolte_true">
                                                on
                                            </label>

                                            <input type="radio" name="isedit_recolte" id="isedit_recolte_false" value="0"
                                                checked>
                                            <label for="isedit_recolte_false">
                                                off
                                            </label>
                                        </fieldset>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="text-sm form-label">Supprimer Récolte :</h6>
                                        <fieldset class="radio-switch">
                                            <legend>
                                                Settings
                                            </legend>
                                            <input type="radio" name="isdelete_recolte" id="isdelete_recolte_true"
                                                value="1">
                                            <label for="isdelete_recolte_true">
                                                on
                                            </label>

                                            <input type="radio" name="isdelete_recolte" id="isdelete_recolte_false"
                                                value="0" checked>
                                            <label for="isdelete_recolte_false">
                                                off
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-sm-0 mb-xl-0 mt-4">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="text-sm form-label">Profile :</h6>
                                        <fieldset class="radio-switch">
                                            <legend>
                                                Settings
                                            </legend>
                                            <input type="radio" name="isprofile" id="isprofile_true" class="switch_input"
                                                value="1">
                                            <label for="isprofile_true">
                                                on
                                            </label>

                                            <input type="radio" name="isprofile" id="isprofile_false" class="switch_input"
                                                value="0" checked>
                                            <label for="isprofile_false">
                                                off
                                            </label>
                                        </fieldset>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="text-sm form-label">Ajouter Utilisateur :</h6>
                                        <fieldset class="radio-switch">
                                            <legend>
                                                Settings
                                            </legend>
                                            <input type="radio" name="isadd_user" id="isadd_user_true" value="1">
                                            <label for="isadd_user_true">
                                                on
                                            </label>

                                            <input type="radio" name="isadd_user" id="isadd_user_false" value="0" checked>
                                            <label for="isadd_user_false">
                                                off
                                            </label>
                                        </fieldset>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="text-sm form-label">Modifier d'Utilisateur :</h6>
                                        <fieldset class="radio-switch">
                                            <legend>
                                                Settings
                                            </legend>
                                            <input type="radio" name="isedit_user" id="isedit_usertrue" value="1">
                                            <label for="isedit_usertrue">
                                                on
                                            </label>

                                            <input type="radio" name="isedit_user" id="isedit_userfalse" value="0" checked>
                                            <label for="isedit_userfalse">
                                                off
                                            </label>
                                        </fieldset>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="text-sm form-label">Supprimer Compte d'Utilisateur :</h6>
                                        <fieldset class="radio-switch">
                                            <legend>
                                                Settings
                                            </legend>
                                            <input type="radio" name="isdelete_user" id="isdelete_usertrue" value="1">
                                            <label for="isdelete_usertrue">
                                                on
                                            </label>

                                            <input type="radio" name="isdelete_user" id="isdelete_userfalse" value="0"
                                                checked>
                                            <label for="isdelete_userfalse">
                                                off
                                            </label>
                                        </fieldset>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="text-sm form-label">Ajouter Rôle :</h6>
                                        <fieldset class="radio-switch">
                                            <legend>
                                                Settings
                                            </legend>
                                            <input type="radio" name="isadd_role" id="isadd_role_true" value="1">
                                            <label for="isadd_role_true">
                                                on
                                            </label>

                                            <input type="radio" name="isadd_role" id="isadd_role_false" value="0" checked>
                                            <label for="isadd_role_false">
                                                off
                                            </label>
                                        </fieldset>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="text-sm form-label">Export :</h6>
                                        <fieldset class="radio-switch">
                                            <legend>
                                                Settings
                                            </legend>
                                            <input type="radio" name="isexport" id="isexport_true" value="1">
                                            <label for="isexport_true">
                                                on
                                            </label>

                                            <input type="radio" name="isexport" id="isexport_false" value="0" checked>
                                            <label for="isexport_false">
                                                off
                                            </label>
                                        </fieldset>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="text-sm form-label">Dechet :</h6>
                                        <fieldset class="radio-switch">
                                            <legend>
                                                Settings
                                            </legend>
                                            <input type="radio" name="isdechet" id="isdechet_true" value="1">
                                            <label for="isdechet_true">
                                                on
                                            </label>

                                            <input type="radio" name="isdechet" id="isdechet_false" value="0" checked>
                                            <label for="isdechet_false">
                                                off
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-5">
                                <div class="col-sm-13">
                                    <button type="submit" name="add_role"
                                        class="btn btn-primary float-end px-6">Ajouter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-sm-0 mb-xl-0 mb-3">
            <div class="card shadow-lg">
                <div class="card-body p-0 pt-2">
                    <div class="px-4 d-flex justify-content-between align-items-center">
                        <h6>Ajouter Un Nouvel Utilisateur</h6>
                        <button class="btn p-0 mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#add_user"
                            aria-expanded="false" aria-controls="add_user">
                            <input type="checkbox" class="hidden chkbox" id="single_checkbox" name="pages[]" hidden />
                            <label class="text-center" style="cursor: pointer;" for="single_checkbox"><i
                                    class="bi bi-plus-circle-fill fa-2x"></i></label>
                        </button>
                    </div>
                    <form action="{{ action('App\Http\Controllers\UsersController@store') }}" method="POST" id="add_user"
                        class="px-4 pt-2 collapse">
                        @csrf
                        <div>
                            <div class="card-body">
                                <p class="text-uppercase text-sm">INFORMATIONS D'UTILISATEUR</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label"><span
                                                    class="text-warning">*</span>Prénom</label>
                                            <input class="form-control inputfield" type="text" name="prenom">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label"><span
                                                    class="text-warning">*</span>Nom</label>
                                            <input class="form-control inputfield" type="text" name="nom">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label"><span
                                                    class="text-warning">*</span>Télephone</label>
                                            <input class="form-control inputfield" type="text" name="telephone">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label"><span
                                                    class="text-warning">*</span>Rôle</label>
                                            <select name="select_role" id="role" class="form-select select_option">
                                                <option value=""></option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label"><span
                                                    class="text-warning">*</span>Adresse Email</label>
                                            <input class="form-control inputfield" type="email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label"><span
                                                    class="text-warning">*</span>Mot de Passe</label>
                                            <input class="form-control inputfield" type="text" name="password"
                                                value="Green_2022">
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Coordonnées d'utilisateur</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Adresse</label>
                                            <input class="form-control inputfield" type="text" name="adresse">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Ville</label>
                                            <input class="form-control inputfield" type="text" name="ville">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Pays</label>
                                            <input class="form-control inputfield" type="text" name="pays">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Code
                                                postal</label>
                                            <input class="form-control inputfield" type="text" name="code_postal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-5">
                                <div class="col-sm-8">
                                    <button type="submit" name="add_user"
                                        class="btn btn-primary float-end px-6">Ajouter</button>
                                    <button type="button" class="clear btn btn-danger float-end px-6 mx-2">Effacer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card shadow-lg mb-4">
                <div class="card-header pb-4 d-flex justify-content-between">
                    <h6>Tableau des Utilisateurs</h6>
                    <input type="text" class="search form-control h-50 w-25" placeholder="Rechercher..">
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">

                        <table class="table align-items-center justify-content-center mb-0 results">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nom</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Rôle</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        E-mail</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Télephone</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Ville</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Date d'adhésion</th>
                                    {{-- @if (Auth::user()->role->supprimer_utilisateur || Auth::user()->role->modifier_utilisateur) --}}
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                            Action</th>
                                    {{-- @endif --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_tbl as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3">
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-sm">{{ $user->prenom }}
                                                        {{ $user->nom }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $user->role }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $user->email }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">0{{ $user->telephone }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $user->ville }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ date('d-m-Y', strtotime($user->created_at)) }}
                                            </p>
                                        </td>
                                        <td class="align-center">
                                            <div class="d-flex  justify-content-start align-items-center">
                                                @if (Auth::user()->role->modifier_utilisateur)
                                                    <a href="{{ route('Utilisateur.edit', $user->id) }}"
                                                        class="btn btn-info px-3 mx-1 text-light" data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $user->id }}"
                                                        data-bs-whatever="@getbootstrap"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                @endif
                                                @if (Auth::user()->role->supprimer_utilisateur)
                                                    <form
                                                        action="{{ action('App\Http\Controllers\UsersController@destroy', [$user->id]) }}"
                                                        method="POST">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-danger px-3"><i
                                                                class="bi bi-person-x"></i></a>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal -->

                                    <div class="modal fade " style="margin-left: 150px;"
                                        id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-xl w-75">
                                            <div class="modal-content">
                                                <div
                                                    class="px-4 modal-header d-flex justify-content-between align-items-center">
                                                    <h6>Modifier Utilisateur</h6>
                                                    <button type="button" class="btn btn-dark mt-2 px-4"
                                                        data-bs-dismiss="modal">Retour</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ action('App\Http\Controllers\UsersController@update', [$user->id]) }}"
                                                        method="POST" id="edit_user" class="px-4 pt-4">
                                                        {{ method_field('PUT') }}
                                                        {{ csrf_field() }}

                                                        <div class="row d-flex justify-content-between align-items-start pb-4"
                                                            style="margin-left: 1.5rem">
                                                            <div class="card-body">
                                                                <p class="text-uppercase text-sm">INFORMATIONS
                                                                    D'UTILISATEUR</p>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="example-text-input"
                                                                                class="form-control-label"><span
                                                                                    class="text-warning">*</span>Prénom</label>
                                                                            <input class="form-control inputfield"
                                                                                type="text" name="prenom"
                                                                                value="{{ $user->prenom }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="example-text-input"
                                                                                class="form-control-label"><span
                                                                                    class="text-warning">*</span>Nom</label>
                                                                            <input class="form-control inputfield"
                                                                                type="text" name="nom"
                                                                                value="{{ $user->nom }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="example-text-input"
                                                                                class="form-control-label"><span
                                                                                    class="text-warning">*</span>Télephone</label>
                                                                            <input class="form-control inputfield"
                                                                                type="text" name="telephone"
                                                                                value="0{{ $user->telephone }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="example-text-input"
                                                                                class="form-control-label"><span
                                                                                    class="text-warning">*</span>Rôle</label>
                                                                            <select name="select_role" id="role"
                                                                                class="form-select select_option">
                                                                                <option value=""></option>
                                                                                @foreach ($roles as $role)
                                                                                    <option value="{{ $role->id }}"
                                                                                        {{ $user->role_id === $role->id ? 'selected' : '' }}>
                                                                                        {{ $role->role }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="example-text-input"
                                                                                class="form-control-label"><span
                                                                                    class="text-warning">*</span>Adresse
                                                                                Email</label>
                                                                            <input class="form-control inputfield"
                                                                                type="email" name="email"
                                                                                value="{{ $user->email }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="example-text-input"
                                                                                class="form-control-label"><span
                                                                                    class="text-warning">*</span>Mot
                                                                                de Passe
                                                                            </label>
                                                                            <input class="form-control inputfield"
                                                                                type="text" name="password"
                                                                                value="{{ $user->password }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr class="horizontal dark">
                                                                <p class="text-uppercase text-sm">Coordonnées
                                                                    d'utilisateur
                                                                </p>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="example-text-input"
                                                                                class="form-control-label">Adresse</label>
                                                                            <input class="form-control inputfield"
                                                                                type="text" name="adresse"
                                                                                value="{{ $user->adresse }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="example-text-input"
                                                                                class="form-control-label">Ville</label>
                                                                            <input class="form-control inputfield"
                                                                                type="text" name="ville"
                                                                                value="{{ $user->ville }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="example-text-input"
                                                                                class="form-control-label">Pays</label>
                                                                            <input class="form-control inputfield"
                                                                                type="text" name="pays"
                                                                                value="{{ $user->pays }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="example-text-input"
                                                                                class="form-control-label">Code
                                                                                postal</label>
                                                                            <input class="form-control inputfield"
                                                                                type="text" name="code_postal"
                                                                                value="{{ $user->code_postal }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-9 mt-5">
                                                                <button type="submit"
                                                                    class="btn btn-primary float-end px-6 ">Modifier</button>
                                                                <button type="button"
                                                                    class="clear btn btn-danger float-end px-6 mx-1">Effacer</button>

                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
