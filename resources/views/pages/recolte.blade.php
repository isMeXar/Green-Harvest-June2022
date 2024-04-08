@extends('layout')

@section('content')
    <div class="row mb-3">
        <div class="col-12 col-sm-0 mb-xl-0 mb-3">
            <div class="card shadow-lg">
                <div class="card-body p-0 pt-2">
                    <div class="px-4 d-flex justify-content-between align-items-center">
                        <h6>Ajouter Récolte</h6>
                        <button class="btn p-0 mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#add_recolte"
                            aria-expanded="false" aria-controls="add_recolte">
                            <input type="checkbox" class="hidden chkbox" id="single_checkbox" name="pages[]" hidden />
                            <label class="text-center" style="cursor: pointer;" for="single_checkbox"><i
                                    class="bi bi-plus-circle-fill fa-2x"></i></label>
                        </button>
                    </div>
                    <form action="{{ action('App\Http\Controllers\RecoltesController@store') }}" method="POST"
                        id="add_recolte" class="px-4 pt-2 collapse">
                        @csrf


                        <div>
                            <div class="row d-flex justify-content-between align-items-start pb-1">
                                <hr>
                                <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mt-2">

                                    <div class="row d-flex mb-4">
                                        <label for="select_ferme" class="col-sm-6 mt-2 text-sm form-label"><span
                                                class="text-warning">*</span>Ferme :</label>
                                        <div class="col-sm-11 d-flex align-items-center mt-1" id="nomRow">
                                            <select name="ferme" id="select_ferme" class="form-select select_option">
                                                <option value=""></option>
                                                @foreach ($fermes as $ferme)
                                                    <option value="{{ $ferme->id }}">{{ $ferme->ferme }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mt-2">

                                    <div class="row d-flex mb-4">
                                        <label for="select_parcelle" class="col-sm-6 mt-2 text-sm form-label"><span
                                                class="text-warning">*</span>Parcelle :</label>
                                        <div class="col-sm-10 d-flex align-items-center mt-1">
                                            <select name="parcelle" id="select_parcelle" class="form-select select_option">
                                                <option value=""></option>
                                                @foreach ($parcelles as $parcelle)
                                                    <option value="{{ $parcelle->id }}">{{ $parcelle->serre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row d-flex justify-content-between align-items-start pb-1">

                                <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mt-2">
                                    <div class="row d-flex mb-4">
                                        <label for="caisse_total" class="col-sm-6 mt-2 text-sm form-label"><span
                                                class="text-warning">*</span>Nombre de Caisse</label>
                                        <div class="col-sm-11 d-flex align-items-center mt-1" id="nomRow">
                                            <input type="number" value="" id="caisse_total" class="form-control inputfield"
                                                name="caisse_net" placeholder="Total">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mt-2">

                                    <div class="row d-flex mb-4">
                                        <label for="unite" class="col-sm-3 mt-2 text-sm form-label"><span
                                                class="text-warning">*</span>Unité :</label>

                                        <div class="col-sm-11 d-flex align-items-center mt-1">
                                            <select name="unite" id="select_unite" class="form-select select_option">
                                                <option value="">Unité par Kg</option>
                                                @foreach ($unites as $unite)
                                                    <option value="{{ $unite->unite_par_kg }}">
                                                        {{ $unite->unite_par_kg }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <select name="conteneur" id="select_conteneur"
                                                class="form-select select_option mx-1">
                                                <option value="">Type de Conteneur</option>
                                                @foreach ($unites as $unite)
                                                    <option value="{{ $unite->conteneur }}">
                                                        {{ $unite->conteneur }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-primary text-light px-2 py-0 mb-0"
                                                data-bs-toggle="modal" data-bs-target="#addUniteModal"
                                                data-bs-whatever="@getbootstrap" style="margin-left: 10px">
                                                <i class="bi bi-plus fa-2x"></i>
                                            </button>
                                        </div>

                                        <div class="form-group col-xl-2 col-sm-0 mb-xl-0">
                                            <div class="modal fade" id="addUniteModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ajouter
                                                                Unité</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="row">
                                                                <div class="mb-3">
                                                                    <label for="new_unite"
                                                                        class="col-sm-5 mt-2 text-sm form-label">Unité par
                                                                        Kilogramme
                                                                        :</label>
                                                                    <input type="text" class="form-control inputfield"
                                                                        id="new_unite">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="new_conteneur"
                                                                        class="col-sm-5 mt-2 text-sm form-label">Conteneur
                                                                        :</label>
                                                                    <input type="text" class="form-control inputfield"
                                                                        id="new_conteneur">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Fermer</button>
                                                            <button type="button" class="btn btn-info"
                                                                onclick="addUnite()"
                                                                data-bs-dismiss="modal">Ajouter</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="row d-flex justify-content-between align-items-start pb-1">

                                <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mt-2">
                                    <div class="row d-flex mb-4">
                                        <label for="caisse_total" class="col-sm-6 mt-2 text-sm form-label"><span
                                                class="text-warning">*</span>Dechet :</label>
                                        <div class="col-sm-11 d-flex align-items-center mt-1">
                                            <input type="number" value="" id="caisse_dechet" class="form-control inputfield"
                                                name="caisse_dechet" placeholder="Nombre de Caisse">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mt-2">
                                    <div class="row d-flex mb-4">
                                        <label for="date_recolte" class="col-sm-6 mt-2 text-sm form-label"><span
                                                class="text-warning">*</span>Date de Récolte :</label>
                                        <div class="col-sm-10 d-flex align-items-center mt-1">
                                            <input type="date" value="" id="date_recolte" class="form-control inputfield"
                                                name="date_recolte">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row border border-dark rounded-3 pb-3 mt-3"
                                style="margin-right: 1.5rem;margin-left: .5rem">
                                <label for="" class="col-sm-3 text-sm form-label bg-gray-200"
                                    style="position: relative; top:-.8rem;left:.5rem;width:70px;">Export</label>
                                <div class="d-flex justify-content-evently align-items-center"
                                    style="padding: 0 3rem;grid-gap: 2rem">

                                    <div class="form-group w-50">
                                        <label for="caisse_export" class="col-sm-12 mt-0 text-sm form-label"><span
                                                class="text-warning">*</span>Nombre de caisse
                                            :</label>
                                        <div class="form-group m-0 p-0">
                                            <input type="number" value="" id="caisse_export" class="form-control inputfield"
                                                name="caisse_com" placeholder="Export">
                                        </div>
                                    </div>

                                    <div class="form-group w-50">
                                        <label for="select_client" class="col-sm-12 mt-2 text-sm form-label">Client
                                            :</label>
                                        <div class="form-group m-0 p-0">
                                            <select name="client" id="select_client" class="form-select inputfield">
                                                <option value="">Choose a Client</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-5">
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary float-end px-6">Ajouter</button>
                                    <button type="button" class="btn btn-danger float-end px-6 mx-2 clear">Effacer</button>
                                </div>
                            </div>
                        </div>

                </div>



                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg mb-4">
                <div class="card-header pb-4 d-flex justify-content-between">
                    <h6>Table des Récolte</h6>
                    <input type="text" class="search form-control h-50 w-25" placeholder="Rechercher..">
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    {{-- <div class="table-responsive p-0">
                        <div class="d-flex justify-content-between align-items-center mx-4 mb-3">

                            <div class="row col-xl-6 col-sm-0 mb-xl-0">
                                <div class="form-group col-xl-6 col-sm-0 mb-xl-0">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <label for="select_culture" class="col-sm-3 text-sm form-label">De :</label>
                                        <input type="date" value="" data-plugin="datepicker" class="form-control fromDate">
                                    </div>
                                </div>
                                <div class="form-group col-xl-6 col-sm-0 mb-xl-0">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <label for="select_culture" class="col-sm-4 text-sm form-label">Jusqu'à :</label>
                                        <input type="date" value="" data-plugin="datepicker" class="form-control toDate">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-0 mb-xl-0 mx-3">
                                <div class="d-flex align-items-center justify-content-end">
                                    <input type="text" class="search form-control w-125" placeholder="Rechercher..">
                                </div>
                            </div>

                        </div>
                    </div> --}}
                    <table class="table align-items-center justify-content-center mb-0 results" id="mytable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Date</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Parcelle</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Variété</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Culture</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Poids Net</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Poids Com</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Dechet</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recoltes as $recolte)
                                <tr>
                                    <td>
                                        <div class="d-flex px-3">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">{{date('d/m/Y', strtotime($recolte->date_recolte)) }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $recolte->serre }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $recolte->variete }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $recolte->culture }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $recolte->poids_net }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $recolte->poids_com }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $recolte->poids_dechet }}
                                        </p>
                                    </td>

                                    <td class="align-center">
                                        <div class="d-flex  justify-content-start align-items-center">
                                            <a href="{{ route('Recolte.edit', $recolte->id) }}"
                                                class="btn btn-info px-3 mx-1 text-light editRecolteBtn"
                                                data-bs-toggle="modal" data-id="{{ $recolte->id }}"
                                                data-bs-target="#editModal{{ $recolte->id }}"
                                                data-bs-whatever="@getbootstrap"><i class="bi bi-pencil-square"></i></a>
                                            <form
                                                action="{{ action('App\Http\Controllers\RecoltesController@destroy', [$recolte->id]) }}"
                                                method="POST">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button class="btn btn-danger px-3"><i class="bi bi-person-x"></i></a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Edit Modal -->

                                <div class="modal fade " style="margin-left: 150px;" id="editModal{{ $recolte->id }}"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    action="{{ action('App\Http\Controllers\RecoltesController@update', [$recolte->id]) }}"
                                                    method="POST" id="edit_recolte" class="px-4 pt-2">
                                                    {{ method_field('PUT') }}
                                                    {{ csrf_field() }}

                                                    <div class="row border border-dark rounded-3 pb-3 mt-3"
                                                        style="margin-right: 1.5rem;margin-left: .5rem">
                                                        <label for="" class="col-sm-3 text-sm form-label bg-gray-200"
                                                            style="position: relative; top:-.8rem;left:.5rem;width:150px;">Parcelle
                                                            Culturale</label>
                                                        <div class="d-flex justify-content-between align-items-center w-100"
                                                            style="padding: 0 3rem;grid-gap: 1rem">

                                                            <div class="row d-flex mb-4 " style="width: 33%">
                                                                <label for="select_parcelle"
                                                                    class="col-sm-8 mt-2 text-sm form-label">Ferme
                                                                    :</label>
                                                                <div
                                                                    class="form-group col-xl-12 col-sm-0 mb-xl-0 m-0 p-0 ">
                                                                    <select name="ferme" id="select_ferme"
                                                                        class="form-select select_option">
                                                                        <option value=""></option>
                                                                        @foreach ($fermes as $ferme)
                                                                            <option value="{{ $ferme->id }}"
                                                                                {{ $recolte->ferme === $ferme->ferme ? 'selected' : '' }}>
                                                                                {{ $ferme->ferme }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row d-flex mb-4" style="width: 33%">
                                                                <label for="select_parcelle"
                                                                    class="col-sm-8 mt-2 text-sm form-label"><span
                                                                        class="text-warning">*</span>Parcelle
                                                                    :</label>
                                                                <div class="form-group col-xl-12 col-sm-0 mb-xl-0 m-0 p-0">
                                                                    <select name="parcelle" id="select_serre"
                                                                        class="form-select select_option">
                                                                        <option value=""></option>
                                                                        @foreach ($parcelles as $parcelle)
                                                                            <option value="{{ $parcelle->id }}"
                                                                                {{ $recolte->serre === $parcelle->serre ? 'selected' : '' }}>
                                                                                {{ $parcelle->serre }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row d-flex mb-4" style="width: 33%">
                                                                <label for="produitInput"
                                                                    class="col-sm-8 mt-2 text-sm form-label"><span
                                                                        class="text-warning">*</span>Unité :</label>
                                                                <div class="form-group col-xl-12 col-sm-0 mb-xl-0 m-0 p-0">
                                                                    <select name="unite"
                                                                        id="edit_select_unite{{ $recolte->id }}"
                                                                        class="form-select select_option">
                                                                        <option value=""></option>
                                                                        @foreach ($unites as $unite)
                                                                            <option value="{{ $unite->unite_par_kg }}"
                                                                                {{ $recolte->unite_par_kg === $unite->unite_par_kg && $recolte->conteneur === $unite->conteneur ? 'selected' : '' }}>
                                                                                {{ $unite->unite_par_kg }} |
                                                                                {{ $unite->conteneur }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row border border-dark rounded-3 pb-3 mt-3"
                                                        style="margin-right: 1.5rem;margin-left: .5rem">
                                                        <label for="" class="col-sm-3 text-sm form-label bg-gray-200"
                                                            style="position: relative; top:-.8rem;left:.5rem;width:120px;">Récolte
                                                            Total</label>
                                                        <div class="d-flex justify-content-evently align-items-center"
                                                            style="padding: 0 3rem;grid-gap: 1rem">

                                                            <div class="form-group w-25">
                                                                <label for="caisse_total"
                                                                    class="col-sm-9 mt-0 text-sm form-label"><span
                                                                        class="text-warning">*</span>Nombre de Caisse
                                                                    :</label>
                                                                <div class="form-group col-xl-12 col-sm-0 mb-xl-0 m-0 p-0">
                                                                    <input type="number"
                                                                        value="{{ $recolte->caisse_net }}"
                                                                        id="edit_caisse_net{{ $recolte->id }}"
                                                                        class="form-control inputfield edit_recolte_field"
                                                                        name="caisse_net" placeholder="Total">
                                                                </div>
                                                            </div>

                                                            <div class="form-group w-25">
                                                                <label for="poids_net"
                                                                    class="col-sm-8 mt-0 text-sm form-label"><span
                                                                        class="text-warning">*</span>Poids Total
                                                                    :</label>
                                                                <div class="form-group col-xl-12 col-sm-0 mb-xl-0 m-0 p-0">
                                                                    <input type="number"
                                                                        value="{{ $recolte->poids_net }}"
                                                                        id="edit_poids_net{{ $recolte->id }}"
                                                                        class="form-control inputfield edit_recolte_field"
                                                                        name="poids_net" placeholder="Par Kilogramme"
                                                                        readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group w-50">
                                                                <label for="date_recolte"
                                                                    class="col-sm-3 mt-0 text-sm form-label"><span
                                                                        class="text-warning">*</span>Date
                                                                    :</label>
                                                                <div class="form-group col-xl-12 col-sm-0 mb-xl-0 m-0 p-0">
                                                                    <input type="date"
                                                                        value="{{ $recolte->date_recolte }}"
                                                                        class="form-control input_date" name="date_recolte">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="row border border-dark rounded-3 pb-3 mt-3"
                                                        style="margin-right: 1.5rem;margin-left: .5rem">
                                                        <label for="" class="col-sm-3 text-sm form-label bg-gray-200"
                                                            style="position: relative; top:-.8rem;left:.5rem;width:80px;">Dechet</label>
                                                        <div class="d-flex justify-content-evently align-items-center"
                                                            style="padding: 0 3rem;grid-gap: 2rem">

                                                            <div class="form-group w-50">
                                                                <label for="caisse_dechet"
                                                                    class="col-sm-8 mt-0 text-sm form-label"><span
                                                                        class="text-warning">*</span>Nombre de Caisse
                                                                    :</label>
                                                                <div class="form-group col-xl-12 col-sm-0 mb-xl-0 m-0 p-0">
                                                                    <input type="number"
                                                                        value="{{ $recolte->caisse_dechet }}"
                                                                        id="edit_caisse_dechet{{ $recolte->id }}"
                                                                        class="form-control inputfield edit_recolte_field"
                                                                        name="caisse_dechet" placeholder="Dechet">
                                                                </div>
                                                            </div>

                                                            <div class="form-group w-50">
                                                                <label for="poids_dechet"
                                                                    class="col-sm-8 mt-0 text-sm form-label"><span
                                                                        class="text-warning">*</span>Poids de Dechet
                                                                    :</label>
                                                                <div class="form-group col-xl-12 col-sm-0 mb-xl-0 m-0 p-0">
                                                                    <input type="number"
                                                                        value="{{ $recolte->poids_dechet }}"
                                                                        id="edit_poids_dechet{{ $recolte->id }}"
                                                                        class="form-control inputfield edit_recolte_field"
                                                                        name="poids_dechet" placeholder="par Kilogramme"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row border border-dark rounded-3 pb-3 mt-3"
                                                        style="margin-right: 1.5rem;margin-left: .5rem">
                                                        <label for="" class="col-sm-3 text-sm form-label bg-gray-200"
                                                            style="position: relative; top:-.8rem;left:.5rem;width:70px;">Export</label>
                                                        <div class="d-flex justify-content-evently align-items-center"
                                                            style="padding: 0 3rem;grid-gap: 2rem">

                                                            <div class="form-group w-25">
                                                                <label for="caisse_export"
                                                                    class="col-sm-12 mt-0 text-sm form-label"><span
                                                                        class="text-warning">*</span>Nombre de caisse
                                                                    :</label>
                                                                <div class="form-group m-0 p-0">
                                                                    <input type="number"
                                                                        value="{{ $recolte->caisse_com }}"
                                                                        id="edit_caisse_export{{ $recolte->id }}"
                                                                        class="form-control inputfield edit_recolte_field"
                                                                        name="caisse_com" placeholder="Export" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group w-25">
                                                                <label for="caisse_export"
                                                                    class="col-sm-12 mt-0 text-sm form-label"><span
                                                                        class="text-warning">*</span>Poids
                                                                    :</label>
                                                                <div class="form-group m-0 p-0">
                                                                    <input type="number"
                                                                        value="{{ $recolte->poids_com }}"
                                                                        id="edit_poids_export{{ $recolte->id }}"
                                                                        class="form-control inputfield edit_recolte_field"
                                                                        name="poids_com" placeholder="Export" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group w-50">
                                                                <label for="select_client"
                                                                    class="col-sm-12 mt-2 text-sm form-label"><span
                                                                        class="text-warning">*</span>Client :</label>
                                                                <div class="form-group m-0 p-0">
                                                                    <select name="client"
                                                                        class="form-select inputfield">
                                                                        <option value="">Choose a Client</option>
                                                                        @foreach ($clients as $client)
                                                                            <option value="{{ $client->id }}"
                                                                                {{ $recolte->nom === $client->nom ? 'selected' : '' }}>
                                                                                {{ $client->nom }}</option>
                                                                        @endforeach
                                                                    </select>
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
@endsection
