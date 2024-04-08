@extends('layout')
    @section('content')
        <div class="card shadow-lg">
            <div class="card-body px-3">
                <div class="gx-4 mx-3 d-flex justify-content-between align-items-start">
                    <div class="">
                        <div class="h-100 text-right">
                            <div class="mb-1 d-flex justify-content-between align-items-center" style="grid-gap: 1rem;">
                                <i class="bi bi-person-workspace fa-1x text-dark"></i>
                                <h5 class="mb-1">
                                    {{ $users->nom }} {{ $users->prenom }}
                                </h5>
                            </div>
                            <div class="mb-1 d-flex justify-content-start align-items-center" style="grid-gap: 1rem;">
                                <i class="bi bi-shield-shaded fa-1x text-dark"></i>
                                <p class="mb-0 font-weight-bold text-sm">
                                    {{ $users->role->role }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="h-100 d-flex flex-column justify-content-end align-items-end">
                            <div class="mb-1 d-flex justify-content-between align-items-center" style="grid-gap: 1rem;">
                                <h5>{{ $users->email }}</h5>
                                <i class="bi bi-envelope-fill fa-1x text-dark"></i>
                            </div>
                            <div class="d-flex justify-content-between align-items-center" style="grid-gap: 1rem;">
                                <p class="mb-0 font-weight-bold text-sm text-right">
                                    0{{ $users->telephone }}
                                </p>
                                <i class="bi bi-telephone-fill fa-1x text-dark"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row shadow-lg mx-0 my-4 pb-4">
            <div class="card">
                <form action="{{ action('App\Http\Controllers\ProfileController@update', [$users->id]) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="card-header pb-2">
                        <div class="d-flex align-items-center">
                            <p class="">Modifier Profile</p>
                            <button type="submit" class="btn btn-primary btn-md ms-auto"
                                style="padding: .5rem 2rem">Modifier</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">INFORMATIONS D'UTILISATEUR</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Email adresse</label>
                                    <input class="form-control" type="email" value="{{ $users->email }}" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Télephone</label>
                                    <input class="form-control" type="text" value="0{{ $users->telephone }}"
                                        name="telephone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Prénom</label>
                                    <input class="form-control" type="text" value="{{ $users->prenom }}" name="prenom">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nom</label>
                                    <input class="form-control" type="text" value="{{ $users->nom }}" name="nom">
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Coordonnées d'utilisateur</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Adresse</label>
                                    <input class="form-control" type="text" value="{{ $users->adresse }}"
                                        name="adresse">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Ville</label>
                                    <input class="form-control" type="text" value="{{ $users->ville }}" name="ville">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Pays</label>
                                    <input class="form-control" type="text" value="{{ $users->pays }}" name="pays">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Code postal</label>
                                    <input class="form-control" type="text" value="{{ $users->code_postal }}"
                                        name="code_postal">
                                </div>
                            </div>
                        </div>

                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Changer mot de passe</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Ancien mot de passe</label>
                                    <input class="form-control" type="password" value="" name="old_password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nouveau mot de passe</label>
                                    <input class="form-control validate" name="password" id="new_password" type="password"
                                        value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Confirmer le nouveau mot de
                                        passe</label>
                                    <input class="form-control" name="confirm_password" id="new_password2" type="password"
                                        value="">
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
@endsection
