@extends('layout')

@section('content')
    {{-- @if (Auth::user()->role->gerer_parcelle) --}}

        <div class="row  mb-3">
            <div class="col-12 col-sm-0 mb-xl-0 mb-3">
                <div class="card shadow-lg">
                    <div class="card-body p-0 pt-2">
                        <div class="px-4 d-flex justify-content-between align-items-center">
                            <h6>Parcelle</h6>
                            <button class="btn p-0 mt-2" type="button" data-bs-toggle="collapse"
                                data-bs-target="#add_parcelle" aria-expanded="false" aria-controls="add_parcelle">
                                <input type="checkbox" class="hidden chkbox" id="single_checkbox" name="pages[]" hidden />
                                <label class="text-center" style="cursor: pointer;" for="single_checkbox"><i
                                        class="bi bi-plus-circle-fill fa-2x"></i></label>
                            </button>
                        </div>
                        <form action="{{ action('App\Http\Controllers\ParcellesController@store') }}" method="POST"
                            id="add_parcelle" class="px-4 pt-2 collapse">
                            @csrf

                            <div class="row d-flex justify-content-between align-items-start pb-4">
                                <hr>
                                <div class="row mt-3">
                                    <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mt-1">

                                        <div class="row d-flex mb-4">
                                            <label for="select_domaine" class="col-sm-3 mt-2 text-sm form-label"><span
                                                    class="text-warning">*</span>Domaine
                                                :</label>
                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                <select name="domaine" id="select_domaine" class="form-select select_option">
                                                    <option value=""></option>
                                                    @foreach ($domaines as $domaine)
                                                        <option value="{{ $domaine->domaine }}">{{ $domaine->domaine }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-sm-0 mb-xl-0">
                                                <button type="button" class="btn btn-primary text-light px-2 py-0 mb-0"
                                                    data-bs-toggle="modal" data-bs-target="#addDomaineModal"
                                                    data-bs-whatever="@getbootstrap">
                                                    <i class="bi bi-plus fa-2x"></i>
                                                </button>
                                                <div class="modal fade" id="addDomaineModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ajouter
                                                                    Domaine</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="mb-3">
                                                                        <label for="new_domaine"
                                                                            class="col-sm-5 mt-2 text-sm form-label">Domaine
                                                                            :</label>
                                                                        <input type="text" class="form-control inputfield"
                                                                            id="new_domaine">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Fermer</button>
                                                                <button type="button" class="btn btn-info"
                                                                    onclick="addDomaine()"
                                                                    data-bs-dismiss="modal">Ajouter</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row d-flex mb-4">
                                            <label for="select_ferme" class="col-sm-3 mt-2 text-sm form-label"><span
                                                    class="text-warning">*</span>Ferme :</label>
                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                <select name="ferme" id="select_ferme" class="form-select select_option">
                                                    <option value=""></option>
                                                    @foreach ($fermes as $ferme)
                                                        <option value="{{ $ferme->ferme }}">{{ $ferme->ferme }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-sm-0 mb-xl-0">
                                                <button type="button" class="btn btn-primary text-light px-2 py-0 mb-0"
                                                    data-bs-toggle="modal" data-bs-target="#addFermeModal"
                                                    data-bs-whatever="@getbootstrap">
                                                    <i class="bi bi-plus fa-2x"></i>
                                                </button>
                                                <div class="modal fade" id="addFermeModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ajouter
                                                                    Ferme
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="mb-3">
                                                                        <label for="new_ferme"
                                                                            class="col-sm-5 mt-2 text-sm form-label">Ferme
                                                                            :</label>
                                                                        <input type="text" class="form-control inputfield"
                                                                            id="new_ferme">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Fermer</button>
                                                                <button type="button" class="btn btn-info"
                                                                    onclick="addFerme()"
                                                                    data-bs-dismiss="modal">Ajouter</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row d-flex mb-4">

                                            <label for="select_parcelle" class="col-sm-3 mt-2 text-sm form-label"><span
                                                    class="text-warning">*</span>Serre
                                                :</label>
                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                <select name="serre" id="select_parcelle" class="form-select select_option">
                                                    <option value=""></option>
                                                    @foreach ($serres as $serre)
                                                        <option value="{{ $serre->serre }}">{{ $serre->serre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-sm-0 mb-xl-0">
                                                <button type="button" class="btn btn-primary text-light px-2 py-0 mb-0"
                                                    data-bs-toggle="modal" data-bs-target="#addParcelleModal"
                                                    data-bs-whatever="@getbootstrap">
                                                    <i class="bi bi-plus fa-2x"></i>
                                                </button>
                                                <div class="modal fade" id="addParcelleModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ajouter
                                                                    Parcelle
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="mb-3">
                                                                        <label for="new_parcelle"
                                                                            class="col-sm-5 mt-2 text-sm form-label">Parcelle
                                                                            :</label>
                                                                        <input type="text" class="form-control inputfield"
                                                                            id="new_parcelle">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Fermer</button>
                                                                <button type="button" class="btn btn-info"
                                                                    onclick="addParcelle()"
                                                                    data-bs-dismiss="modal">Ajouter</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row d-flex mb-4">
                                            <label for="select_variete" class="col-sm-3 mt-2 text-sm form-label"><span
                                                    class="text-warning">*</span>Variété
                                                :</label>
                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                <select name="variete" id="select_variete" class="form-select select_option">
                                                    <option value=""></option>
                                                    @foreach ($varietes as $variete)
                                                        <option value="{{ $variete->variete }}">{{ $variete->variete }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row d-flex mb-4">
                                            <label for="produitInput" class="col-sm-3 mt-2 text-sm form-label"><span
                                                    class="text-warning">*</span>Culture :</label>
                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                <select name="culture" id="select_produit" class="form-select select_option">
                                                    <option value=""></option>
                                                    @foreach ($cultures as $culture)
                                                        <option value="{{ $culture->id }}">{{ $culture->culture }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row d-flex">
                                            <label for="refInput" class="col-sm-3 mt-0 text-sm form-label">Réference
                                                technique
                                                :</label>
                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                <input type="text" value="" id="refInput"
                                                    class="form-control inputfield" name="reference_technique">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xl-6 col-sm-0 mb-xl-0">

                                        <div class="row border border-dark rounded-3 pb-3 mt-3"
                                            style="margin-right: 1.5rem">
                                            <label for="status" class="col-sm-2 text-sm form-label bg-gray-200"
                                                style="position: relative; top:-.8rem;left:2rem;width:80px;"><span
                                                    class="text-warning">*</span>Status</label>
                                            <div class="row">
                                                <div class="form-group col-xl-10 col-sm-0 mb-xl-0 d-flex align-items-center justify-content-between"
                                                    style="grid-gap: 6rem;margin-left:2rem;margin-left:2rem;">
                                                    <div>
                                                        <input type="radio" id="en_cours" name="status" value="En cours"
                                                            class="input_radio">
                                                        <label for="en_cours">En cours</label><br>
                                                    </div>
                                                    <div>
                                                        <input type="radio" id="arrachee" name="status" value="Arrachée"
                                                            class="input_radio">
                                                        <label for="arrachee">Arrachée</label><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row border border-dark rounded-3 pb-3 mt-4"
                                            style="margin-right: 1.5rem">
                                            <label for="status" class="col-sm-4 text-sm form-label bg-gray-200"
                                                style="position: relative; top:-.8rem;left:2rem;width:171px;"><span
                                                    class="text-warning">*</span>Mode de
                                                plantation</label>
                                            <div class="row">
                                                <div class="form-group col-xl-10 col-sm-0 mb-xl-0 d-flex align-items-center justify-content-between"
                                                    style="grid-gap: 3rem;margin-left:2rem;margin-left:2rem;">
                                                    <div>
                                                        <input type="radio" id="plants" name="mode_plantation"
                                                            value="Plants" class="input_radio">
                                                        <label for="plants">Plants</label><br>
                                                    </div>
                                                    <div>
                                                        <input type="radio" id="semence" name="mode_plantation"
                                                            value="Semence" class="input_radio">
                                                        <label for="semence">Semence</label><br>
                                                    </div>
                                                    <div>
                                                        <input type="radio" id="commun" name="mode_plantation"
                                                            value="Commun" class="input_radio">
                                                        <label for="commun">Commun</label><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="row mt-6">
                                    <div class="form-group col-xl-6 col-sm-0 mb-xl-0">

                                        <div class="row d-flex mb-3">
                                            <label for="nombrePlantsInput" class="col-sm-3 mt-0 text-sm form-label">Nombre
                                                Plants
                                                :</label>
                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                <input type="number" step="any" value="" id="nombrePlantsInput"
                                                    class="form-control inputfield" name="nombre_plants">
                                            </div>
                                        </div>

                                        <div class="row d-flex mb-4">
                                            <label for="densiteInput" class="col-sm-3 mt-2 text-sm form-label">Densité/(ha)
                                                :</label>
                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                <input type="number" step="any" value="" id="densiteInput"
                                                    class="form-control inputfield" name="densite">
                                            </div>
                                        </div>

                                        <div class="row d-flex mb-4">
                                            <label for="ecartementInput"
                                                class="col-sm-3 mt-2 text-sm form-label">Ecartement
                                                :</label>
                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                <input type="number" step="any" value="" id="ecartementInput"
                                                    class="form-control inputfield" name="ecartement">
                                            </div>
                                        </div>

                                        <div class="row d-flex mb-4">
                                            <label for="superficieInput" class="col-sm-3 mt-2 text-sm form-label"><span
                                                    class="text-warning">*</span>Superficie
                                                :</label>
                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                <input type="number" step="any" value="" id="superficieInput"
                                                    class="form-control inputfield" name="superficie">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group col-xl-6 col-sm-0 mb-xl-0">

                                        <div class="row d-flex mb-3">
                                            <label for="dateTravauxInput" class="col-sm-3 text-sm form-label"><span
                                                    class="text-warning">*</span>Date début
                                                travaux
                                                :</label>
                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                <input type="date" value="" id="dateTravauxInput"
                                                    class="form-control input_date" name="date_debut_travaux">
                                            </div>
                                        </div>

                                        <div class="row d-flex mb-3">
                                            <label for="dateSurgreffagesInput" class="col-sm-3 text-sm form-label">Date
                                                surgreffages :</label>
                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                <input type="date" value="" id="dateSurgreffagesInput"
                                                    class="form-control input_date" name="date_surgreffages">
                                            </div>
                                        </div>

                                        <div class="row d-flex mb-3">
                                            <label for="dateArrachageInput" class="col-sm-3 text-sm form-label">Date
                                                d'arrachage
                                                :</label>
                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                <input type="date" value="" id="dateArrachageInput"
                                                    class="form-control input_date" name="date_arrachage">
                                            </div>
                                        </div>

                                        <div class="row d-flex mb-3">
                                            <label for="dateFinRecolteInput" class="col-sm-3 text-sm form-label">Date Fin
                                                Récolte
                                                :</label>
                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                <input type="date" value="" id="dateFinRecolteInput"
                                                    class="form-control input_date" name="date_fin_recolte">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-11 mt-5">
                                        <button type="submit" class="btn btn-primary float-end px-6 ">Ajouter</button>
                                        <button type="button"
                                            class="btn btn-danger float-end px-6 mx-2 clear">Effacer</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg mb-4">
                    <div class="card-header pb-4 d-flex justify-content-between">
                        <h6>Table des Parcelles</h6>
                        <input type="text" class="search form-control h-50 w-25" placeholder="Rechercher..">
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">

                            <table class="table align-items-center justify-content-center mb-0 results">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Domaine</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Ferme</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Parcelle</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            variété</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Produit</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Reference</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Date début travaux</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Date fin Récolte</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($parcelles as $parcelle)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-3">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $parcelle->domaine }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $parcelle->ferme }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $parcelle->serre }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $parcelle->variete }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $parcelle->culture }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $parcelle->reference_technique }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ date('d/m/Y', strtotime($parcelle->date_debut_travaux)) }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ date('d/m/Y', strtotime($parcelle->date_fin_recolte)) }}
                                                </p>
                                            </td>
                                            <td class="align-center">
                                                <div class="d-flex  justify-content-start align-items-center">
                                                    <a href="{{ route('Parcelle.edit', $parcelle->id) }}"
                                                        class="btn btn-info px-3 mx-1 text-light" data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $parcelle->id }}"
                                                        data-bs-whatever="@getbootstrap"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    <form
                                                        action="{{ action('App\Http\Controllers\ParcellesController@destroy', [$parcelle->id]) }}"
                                                        method="POST">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-danger px-3"><i
                                                                class="bi bi-person-x"></i></a>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal -->

                                        <div class="modal fade " style="margin-left: 150px;"
                                            id="editModal{{ $parcelle->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl w-75">
                                                <div class="modal-content">
                                                    <div
                                                        class="px-4 modal-header d-flex justify-content-between align-items-center">
                                                        <h6>Modifier Parcelle</h6>
                                                        <button type="button" class="btn btn-dark mt-2 px-4"
                                                            data-bs-dismiss="modal">Retour</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ action('App\Http\Controllers\ParcellesController@update', [$parcelle->id]) }}"
                                                            method="POST" id="edit_parcelle" class="px-4 pt-4">
                                                            {{ method_field('PUT') }}
                                                            {{ csrf_field() }}

                                                            <div class="row d-flex justify-content-between align-items-start pb-4"
                                                                style="margin-left: 1.5rem">
                                                                <div class="row">

                                                                    <div class="form-group col-xl-6 col-sm-0 mb-xl-0">

                                                                        <div class="row d-flex mb-4">
                                                                            <label for="select_domaine"
                                                                                class="col-sm-3 mt-2 text-sm form-label">Domaine
                                                                                :</label>
                                                                            <div
                                                                                class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                                                <select name="domaine" id="select_domaine"
                                                                                    class="form-select select_option">
                                                                                    <option value=""></option>
                                                                                    @foreach ($domaines as $domaine)
                                                                                        <option
                                                                                            value="{{ $domaine->id }}"
                                                                                            {{ $parcelle->domaine === $domaine->domaine ? 'selected' : '' }}>
                                                                                            {{ $domaine->domaine }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex mb-4">
                                                                            <label for="select_ferme"
                                                                                class="col-sm-3 mt-2 text-sm form-label">Ferme
                                                                                :</label>
                                                                            <div
                                                                                class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                                                <select name="ferme" id="select_ferme"
                                                                                    class="form-select select_option">
                                                                                    <option value=""></option>
                                                                                    @foreach ($fermes as $ferme)
                                                                                        <option
                                                                                            value="{{ $ferme->id }}"
                                                                                            {{ $parcelle->ferme === $ferme->ferme ? 'selected' : '' }}>
                                                                                            {{ $ferme->ferme }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex mb-4">

                                                                            <label for="select_parcelle"
                                                                                class="col-sm-3 mt-2 text-sm form-label"><span
                                                                                    class="text-warning">*</span>Serre
                                                                                :</label>
                                                                            <div
                                                                                class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                                                <select name="serre" id="select_parcelle"
                                                                                    class="form-select select_option">
                                                                                    <option value=""></option>
                                                                                    @foreach ($serres as $serre)
                                                                                        <option
                                                                                            value="{{ $serre->id }}"
                                                                                            {{ $parcelle->serre === $serre->serre ? 'selected' : '' }}>
                                                                                            {{ $serre->serre }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex mb-4">
                                                                            <label for="select_variete"
                                                                                class="col-sm-3 mt-2 text-sm form-label"><span
                                                                                    class="text-warning">*</span>Variété
                                                                                :</label>
                                                                            <div
                                                                                class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                                                <select name="variete" id="select_parcelle"
                                                                                    class="form-select select_option">
                                                                                    <option value=""></option>
                                                                                    @foreach ($varietes as $variete)
                                                                                        <option
                                                                                            value="{{ $variete->id }}"
                                                                                            {{ $parcelle->variete === $variete->variete ? 'selected' : '' }}>
                                                                                            {{ $variete->variete }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex mb-4">
                                                                            <label for="select_variete"
                                                                                class="col-sm-3 mt-2 text-sm form-label"><span
                                                                                    class="text-warning">*</span>Culture
                                                                                :</label>
                                                                            <div
                                                                                class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                                                <select name="culture" id="select_parcelle"
                                                                                    class="form-select select_option">
                                                                                    <option value=""></option>
                                                                                    @foreach ($cultures as $culture)
                                                                                        <option
                                                                                            value="{{ $culture->id }}"
                                                                                            {{-- {{ $parcelle->culture_id === $culture->id ? 'selected' : '' }} --}}
                                                                                            {{ $parcelle->culture_id === $culture->id ? 'selected' : '' }}
                                                                                            >{{ $culture->culture }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex">
                                                                            <label for="refInput"
                                                                                class="col-sm-3 mt-0 text-sm form-label">Réference
                                                                                technique
                                                                                :</label>
                                                                            <div
                                                                                class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                                                <input type="text" id="refInput"
                                                                                    class="form-control inputfield"
                                                                                    name="reference_technique"
                                                                                    value="{{ $parcelle->reference_technique }}">
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="form-group col-xl-6 col-sm-0 mb-xl-0">

                                                                        <div class="row border border-dark rounded-3 pb-3 mt-2"
                                                                            style="margin-right: 1.5rem">
                                                                            <label for="status"
                                                                                class="col-sm-2 text-sm form-label bg-gray-200"
                                                                                style="position: relative; top:-.8rem;left:2rem;width:80px;"><span
                                                                                    class="text-warning">*</span>Status</label>
                                                                            <div class="row">
                                                                                <div class="form-group col-xl-10 col-sm-0 mb-xl-0 d-flex align-items-center justify-content-between"
                                                                                    style="grid-gap: 6rem;margin-left:2rem;margin-left:2rem;">
                                                                                    <div>
                                                                                        <input type="radio" id="en_cours"
                                                                                            name="status" value="En cours"
                                                                                            class="input_radio"
                                                                                            {{ $parcelle->status === 'En cours' ? 'checked' : '' }}>
                                                                                        <label for="en_cours">En
                                                                                            cours</label><br>
                                                                                    </div>
                                                                                    <div>
                                                                                        <input type="radio" id="arrachee"
                                                                                            name="status" value="Arrachée"
                                                                                            class="input_radio"
                                                                                            {{ $parcelle->status === 'Arrachée' ? 'checked' : '' }}>
                                                                                        <label
                                                                                            for="arrachee">Arrachée</label><br>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row border border-dark rounded-3 pb-3 mt-4"
                                                                            style="margin-right: 1.5rem">
                                                                            <label for="status"
                                                                                class="col-sm-4 text-sm form-label bg-gray-200"
                                                                                style="position: relative; top:-.8rem;left:2rem;width:170px;"><span
                                                                                    class="text-warning">*</span>Mode
                                                                                de
                                                                                plantation</label>
                                                                            <div class="row">
                                                                                <div class="form-group col-xl-10 col-sm-0 mb-xl-0 d-flex align-items-center justify-content-between"
                                                                                    style="grid-gap: 3rem;margin-left:2rem;margin-left:2rem;">
                                                                                    <div>
                                                                                        <input type="radio" id="plants"
                                                                                            name="mode_plantation"
                                                                                            value="Plants"
                                                                                            class="input_radio"
                                                                                            {{ $parcelle->mode_plantation === 'Plants' ? 'checked' : '' }}>
                                                                                        <label
                                                                                            for="plants">Plants</label><br>
                                                                                    </div>
                                                                                    <div>
                                                                                        <input type="radio" id="semence"
                                                                                            name="mode_plantation"
                                                                                            value="Semence"
                                                                                            class="input_radio"
                                                                                            {{ $parcelle->mode_plantation === 'Semence' ? 'checked' : '' }}>
                                                                                        <label
                                                                                            for="semence">Semence</label><br>
                                                                                    </div>
                                                                                    <div>
                                                                                        <input type="radio" id="commun"
                                                                                            name="mode_plantation"
                                                                                            value="Commun"
                                                                                            class="input_radio"
                                                                                            {{ $parcelle->mode_plantation === 'Commun' ? 'checked' : '' }}>
                                                                                        <label
                                                                                            for="commun">Commun</label><br>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <div class="row mt-6">
                                                                    <div class="form-group col-xl-6 col-sm-0 mb-xl-0">

                                                                        <div class="row d-flex mb-3">
                                                                            <label for="nombrePlantsInput"
                                                                                class="col-sm-3 mt-0 text-sm form-label">Nombre
                                                                                Plants
                                                                                :</label>
                                                                            <div
                                                                                class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                                                <input type="number" step="any"
                                                                                    id="nombrePlantsInput"
                                                                                    class="form-control inputfield"
                                                                                    name="nombre_plants"
                                                                                    value="{{ $parcelle->nombre_plants }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex mb-4">
                                                                            <label for="densiteInput"
                                                                                class="col-sm-3 mt-2 text-sm form-label">Densité/(ha)
                                                                                :</label>
                                                                            <div
                                                                                class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                                                <input type="number" step="any"
                                                                                    id="densiteInput"
                                                                                    class="form-control inputfield"
                                                                                    name="densite"
                                                                                    value="{{ $parcelle->densite }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex mb-4">
                                                                            <label for="ecartementInput"
                                                                                class="col-sm-3 mt-2 text-sm form-label">Ecartement
                                                                                :</label>
                                                                            <div
                                                                                class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                                                <input type="number" step="any"
                                                                                    id="ecartementInput"
                                                                                    class="form-control inputfield"
                                                                                    name="ecartement"
                                                                                    value="{{ $parcelle->ecartement }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex mb-4">
                                                                            <label for="superficieInput"
                                                                                class="col-sm-3 mt-2 text-sm form-label"><span
                                                                                    class="text-warning">*</span>Superficie
                                                                                :</label>
                                                                            <div
                                                                                class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                                                <input type="number" step="any"
                                                                                    id="superficieInput"
                                                                                    class="form-control inputfield"
                                                                                    name="superficie"
                                                                                    value="{{ $parcelle->superficie }}">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group col-xl-6 col-sm-0 mb-xl-0">

                                                                        <div class="row d-flex mb-3">
                                                                            <label for="dateTravauxInput"
                                                                                class="col-sm-3 text-sm form-label"><span
                                                                                    class="text-warning">*</span>Date
                                                                                début
                                                                                travaux
                                                                                :</label>
                                                                            <div
                                                                                class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                                                <input type="date" id="dateTravauxInput"
                                                                                    class="form-control input_date"
                                                                                    name="date_debut_travaux"
                                                                                    value="{{ $parcelle->date_debut_travaux }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex mb-3">
                                                                            <label for="dateSurgreffagesInput"
                                                                                class="col-sm-3 text-sm form-label">Date
                                                                                surgreffages :</label>
                                                                            <div
                                                                                class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                                                <input type="date"
                                                                                    id="dateSurgreffagesInput"
                                                                                    class="form-control input_date"
                                                                                    name="date_surgreffage"
                                                                                    value="{{ $parcelle->date_surgreffage }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex mb-3">
                                                                            <label for="dateArrachageInput"
                                                                                class="col-sm-3 text-sm form-label">Date
                                                                                d'arrachage
                                                                                :</label>
                                                                            <div
                                                                                class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                                                <input type="date" id="dateArrachageInput"
                                                                                    class="form-control input_date"
                                                                                    name="date_arrachage"
                                                                                    value="{{ $parcelle->date_arrachage }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row d-flex mb-3">
                                                                            <label for="dateFinRecolteInput"
                                                                                class="col-sm-3 text-sm form-label">Date
                                                                                Fin
                                                                                Récolte
                                                                                :</label>
                                                                            <div
                                                                                class="form-group col-xl-6 col-sm-0 mb-xl-0 m-0 p-0">
                                                                                <input type="date" id="dateFinRecolteInput"
                                                                                    class="form-control input_date"
                                                                                    name="date_fin_recolte"
                                                                                    value="{{ $parcelle->date_fin_recolte }}">
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
                                                                        class="btn btn-danger float-end px-6 mx-1 clear">Effacer</button>

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

    {{-- @endif --}}
@endsection
