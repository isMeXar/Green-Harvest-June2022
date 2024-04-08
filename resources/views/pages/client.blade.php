@extends('layout')

{{-- @if (Auth::user()->role->gerer_client) --}}

    @section('content')
        <div class="row  mb-3 content">
            <div class="col-12 col-sm-0 mb-xl-0 mb-3">
                <div class="card shadow-lg">
                    <div class="card-body p-0 pt-2 pb-1">
                        <div class="px-4 d-flex justify-content-between align-items-center">
                            <h6>Client</h6>
                            <button class="btn p-0 mt-0" type="button" data-bs-toggle="collapse"
                                data-bs-target="#add_client" aria-expanded="false" aria-controls="add_client">
                                <input type="checkbox" class="hidden chkbox" id="single_checkbox" name="pages[]" hidden />
                                <label class="text-center  pt-3" style="cursor: pointer;" for="single_checkbox"><i
                                        class="bi bi-plus-circle-fill fa-2x"></i></label>
                            </button>
                        </div>
                        <form action="{{ action('App\Http\Controllers\ClientsController@store') }}" method="POST"
                            id="add_client" class="px-4 pt-4 collapse">
                            @csrf
                            <div class="row">
                                <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mb-3">
                                    <label for="inputNom" class="col-sm-3 mt-2 text-sm form-label"><span
                                            class="text-warning">*</span>Nom</label>
                                    <div class="col-sm-12 d-flex align-items-center" id="nomRow">
                                        <input type="text" class="h-100 form-control mr-3 mb-3 inputfield" id="inputNom"
                                            placeholder="Nom de Client/Société" name="nom">
                                    </div>
                                </div>
                                <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mb-3">
                                    <label for="inputCode" class="col-sm-3 mt-2 text-sm form-label"><span
                                            class="text-warning">*</span>Code Externe</label>
                                    <div class="col-sm-12 d-flex align-items-center" id="codeRow">
                                        <input type="text" class="h-100 form-control mr-3 mb-3 inputfield" id="inputCode"
                                            name="code_externe">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-xl-8 col-sm-0 mb-xl-0 mb-3">
                                    <label for="inputEmail" class="col-sm-3 mt-2 text-sm form-label">E-mail</label>
                                    <div class="col-sm-12 d-flex align-items-center" id="emailRow">
                                        <input type="text" class="h-100 form-control mr-3 mb-3 inputfield" id="inputEmail"
                                            placeholder="E-mail" name="email">
                                    </div>
                                </div>
                                <div class="form-group col-xl-4 col-sm-0 mb-xl-0 mb-3">
                                    <label for="inputCode" class="col-sm-3 mt-2 text-sm form-label"><span
                                            class="text-warning">*</span>Type</label>
                                    <select name="type_list" id="select_type" class="form-select select_option">
                                        <option></option>
                                        <option value="Marché Local">Marché Local</option>
                                        <option value="Société">Société</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-xl-4 col-sm-0 mb-xl-0 mb-3">
                                    <label for="inputTelephone" class="col-sm-4 mt-2 text-sm form-label"><span
                                            class="text-warning">*</span>Télephone</label>
                                    <div class="col-sm-12 d-flex align-items-center" id="telephoneRow">
                                        <input type="text" class="h-100 form-control mr-3 mb-3 inputfield"
                                            id="inputTelephone" name="telephone">
                                    </div>
                                </div>
                                <div class="form-group col-xl-4 col-sm-0 mb-xl-0 mb-3">
                                    <label for="inputFax" class="col-sm-3 mt-2 text-sm form-label">Fax</label>
                                    <div class="col-sm-12 d-flex align-items-center" id="faxRow">
                                        <input type="text" class="h-100 form-control mr-3 mb-3 inputfield" id="inputFax"
                                            placeholder="Fax" name="fax">
                                    </div>
                                </div>
                                <div class="form-group col-xl-4 col-sm-0 mb-xl-0 mb-3">
                                    <label for="inputGSM" class="col-sm-3 mt-2 text-sm form-label">GSM</label>
                                    <div class="col-sm-12 d-flex align-items-center" id="GSMRow">
                                        <input type="text" class="h-100 form-control mr-3 mb-3 inputfield" id="inputGSM"
                                            placeholder="GSM" name="gsm">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-xl-2 col-sm-0 mb-xl-0 mb-3">
                                    <label for="inputPays" class="col-sm-3 mt-2 text-sm form-label">Pays</label>
                                    <div class="col-sm-12 d-flex align-items-center" id="paysRow">
                                        <input type="text" class="h-100 form-control mr-3 mb-3 inputfield" id="inputPays"
                                            placeholder="Pays" name="pays">
                                    </div>
                                </div>
                                <div class="form-group col-xl-2 col-sm-0 mb-xl-0 mb-3">
                                    <label for="inputVille" class="col-sm-4 mt-2 text-sm form-label"><span
                                            class="text-warning">*</span>Ville</label>
                                    <div class="col-sm-12 d-flex align-items-center" id="villeRow">
                                        <input type="text" class="h-100 form-control mr-3 mb-3 inputfield" id="inputVille"
                                            name="ville">
                                    </div>
                                </div>
                                <div class="form-group col-xl-8 col-sm-0 mb-xl-0 mb-3">
                                    <label for="adresseRow" class="col-sm-3 mt-2 text-sm form-label"><span
                                            class="text-warning">*</span>Adresse</label>
                                    <div class="col-sm-12 d-flex align-items-center" id="adresseRow">
                                        <input type="text" class="h-100 form-control mr-3 mb-3 inputfield" id="inputAdresse"
                                            name="adresse">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mb-3">
                                    <label for="inputIf" class="col-sm-3 mt-2 text-sm form-label">IF</label>
                                    <div class="col-sm-12 d-flex align-items-center" id="ifRow">
                                        <input type="text" class="h-100 form-control mr-3 mb-3 inputfield" id="inputIf"
                                            placeholder="If" name="if">
                                    </div>
                                </div>
                                <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mb-3">
                                    <label for="inputObservation"
                                        class="col-sm-3 mt-2 text-sm form-label">Observation</label>
                                    <div class="col-sm-12 d-flex align-items-center" id="observationRow">
                                        <input type="text" class="h-100 form-control mr-3 mb-3 inputfield"
                                            id="inputObservation" placeholder="Observation" name="observation">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label for="inputIce" class="col-sm-3 mt-2 text-sm form-label">ICE</label>
                                <div class="col-sm-12 d-flex align-items-center" id="iceRow">
                                    <textarea name="ice" value="" class="form-control inputfield" id="inputIce" placeholder="ICE ..." rows="4"></textarea>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-9 mt-5">
                                    <button type="submit" class="btn btn-primary float-end px-4 ">Ajouter</button>
                                    <button type="button" class="btn btn-danger float-end px-4 mx-1 clear">Effacer</button>
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
                        <h6>Table des Clients</h6>
                        <input type="text" class="search form-control h-50 w-25" placeholder="Rechercher..">
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                        </div>

                        <table class="table align-items-center justify-content-center mb-0 results">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">
                                        Nom</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Code Externe</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        E-mail</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Télephone</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Ville</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Type</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3">
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-sm">{{ $client->nom }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $client->code_externe }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $client->email }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $client->telephone }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $client->ville }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $client->type }}</p>
                                        </td>
                                        <td class="align-center">
                                            <div class="d-flex  justify-content-start align-items-center">
                                                <a href="{{ route('Client.edit', $client->id) }}"
                                                    data-id="{{ $client->id }}"
                                                    class="btn btn-info px-3 mx-1 text-light editClientBtn"
                                                    data-bs-toggle="modal" data-bs-target="#editModal{{ $client->id }}"
                                                    data-bs-whatever="@getbootstrap"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <form
                                                    action="{{ action('App\Http\Controllers\ClientsController@destroy', [$client->id]) }}"
                                                    method="POST">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-danger px-3"><i class="bi bi-person-x"></i></a>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal -->

                                    <div class="modal fade " style="margin-left: 150px;"
                                        id="editModal{{ $client->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-xl w-75">
                                            <div class="modal-content">
                                                <div
                                                    class="px-4 modal-header d-flex justify-content-between align-items-center">
                                                    <h6>Modifier Client</h6>
                                                    <button type="button" class="btn btn-dark mt-2 px-4"
                                                        data-bs-dismiss="modal">Retour</button>
                                                </div>
                                                <div class="modal-body mx-3">
                                                    <form
                                                        action="{{ action('App\Http\Controllers\ClientsController@update', [$client->id]) }}"
                                                        method="POST" id="edit_client" class="px-4 pt-4">
                                                        {{ method_field('PUT') }}
                                                        {{ csrf_field() }}
                                                        <div class="row">
                                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mb-3">
                                                                <label for="inputNom"
                                                                    class="col-sm-3 mt-2 text-sm form-label"><span
                                                                        class="text-warning">*</span>Nom</label>
                                                                <div class="col-sm-12 d-flex align-items-center"
                                                                    id="nomRow">
                                                                    <input type="text"
                                                                        class="edit_field h-100 form-control mr-3 mb-3 inputfield"
                                                                        id="inputNom" placeholder="Nom de Client/Société"
                                                                        name="nom" value="{{ $client->nom }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mb-3">
                                                                <label for="inputCode"
                                                                    class="col-sm-5 mt-2 text-sm form-label inputfield"><span
                                                                        class="text-warning">*</span>Code
                                                                    Externe</label>
                                                                <div class="col-sm-12 d-flex align-items-center"
                                                                    id="codeRow">
                                                                    <input type="text"
                                                                        class="edit_field h-100 form-control mr-3 mb-3 inputfield"
                                                                        id="inputCode" name="code_externe"
                                                                        value="{{ $client->code_externe }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-xl-8 col-sm-0 mb-xl-0 mb-3">
                                                                <label for="inputEmail"
                                                                    class="col-sm-3 mt-2 text-sm form-label">E-mail</label>
                                                                <div class="col-sm-12 d-flex align-items-center"
                                                                    id="emailRow">
                                                                    <input type="text"
                                                                        class="edit_field h-100 form-control mr-3 mb-3 inputfield"
                                                                        id="inputEmail" placeholder="E-mail" name="email"
                                                                        value="{{ $client->email }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-xl-4 col-sm-0 mb-xl-0 mb-3">
                                                                <label for="inputCode"
                                                                    class="col-sm-3 mt-2 text-sm form-label"><span
                                                                        class="text-warning">*</span>Type</label>
                                                                <select name="type_list" id="select_type"
                                                                    class="edit_select form-select select_option">
                                                                    <option></option>
                                                                    <option value="Marché Local"
                                                                        {{ $client->type === 'Marché Local' ? 'selected' : '' }}>
                                                                        Marché Local</option>
                                                                    <option value="Société"
                                                                        {{ $client->type === 'Société' ? 'selected' : '' }}>
                                                                        Société</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-xl-4 col-sm-0 mb-xl-0 mb-3">
                                                                <label for="inputTelephone"
                                                                    class="col-sm-4 mt-2 text-sm form-label"><span
                                                                        class="text-warning">*</span>Télephone</label>
                                                                <div class="col-sm-12 d-flex align-items-center"
                                                                    id="telephoneRow">
                                                                    <input type="text"
                                                                        class="edit_field h-100 form-control mr-3 mb-3 inputfield"
                                                                        id="inputTelephone" name="telephone"
                                                                        value="{{ $client->telephone }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-xl-4 col-sm-0 mb-xl-0 mb-3">
                                                                <label for="inputFax"
                                                                    class="col-sm-3 mt-2 text-sm form-label">Fax</label>
                                                                <div class="col-sm-12 d-flex align-items-center"
                                                                    id="faxRow">
                                                                    <input type="text"
                                                                        class="edit_field h-100 form-control mr-3 mb-3 inputfield"
                                                                        id="inputFax" placeholder="Fax" name="fax"
                                                                        value="{{ $client->fax }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-xl-4 col-sm-0 mb-xl-0 mb-3">
                                                                <label for="inputGSM"
                                                                    class="col-sm-3 mt-2 text-sm form-label">GSM</label>
                                                                <div class="col-sm-12 d-flex align-items-center"
                                                                    id="GSMRow">
                                                                    <input type="text"
                                                                        class="edit_field h-100 form-control mr-3 mb-3 inputfield"
                                                                        id="inputGSM" placeholder="GSM" name="gsm"
                                                                        value="{{ $client->gsm }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-xl-2 col-sm-0 mb-xl-0 mb-3">
                                                                <label for="inputPays"
                                                                    class="col-sm-3 mt-2 text-sm form-label">Pays</label>
                                                                <div class="col-sm-12 d-flex align-items-center"
                                                                    id="paysRow">
                                                                    <input type="text"
                                                                        class="edit_field h-100 form-control mr-3 mb-3 inputfield"
                                                                        id="inputPays" placeholder="Pays" name="pays"
                                                                        value="{{ $client->pays }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-xl-2 col-sm-0 mb-xl-0 mb-3">
                                                                <label for="inputVille"
                                                                    class="col-sm-4 mt-2 text-sm form-label"><span
                                                                        class="text-warning">*</span>Ville</label>
                                                                <div class="col-sm-12 d-flex align-items-center"
                                                                    id="villeRow">
                                                                    <input type="text"
                                                                        class="edit_field h-100 form-control mr-3 mb-3 inputfield"
                                                                        id="inputVille" name="ville"
                                                                        value="{{ $client->ville }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-xl-8 col-sm-0 mb-xl-0 mb-3">
                                                                <label for="adresseRow"
                                                                    class="col-sm-3 mt-2 text-sm form-label"><span
                                                                        class="text-warning">*</span>Adresse</label>
                                                                <div class="col-sm-12 d-flex align-items-center"
                                                                    id="adresseRow">
                                                                    <input type="text"
                                                                        class="edit_field h-100 form-control mr-3 mb-3 inputfield"
                                                                        id="inputAdresse" name="adresse"
                                                                        value="{{ $client->adresse }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mb-3">
                                                                <label for="inputIf"
                                                                    class="col-sm-3 mt-2 text-sm form-label">IF</label>
                                                                <div class="col-sm-12 d-flex align-items-center"
                                                                    id="ifRow">
                                                                    <input type="text"
                                                                        class="edit_field h-100 form-control mr-3 mb-3 inputfield"
                                                                        id="inputIf" placeholder="If" name="if"
                                                                        value="{{ $client->if }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mb-3">
                                                                <label for="inputObservation"
                                                                    class="col-sm-3 mt-2 text-sm form-label">Observation</label>
                                                                <div class="col-sm-12 d-flex align-items-center"
                                                                    id="observationRow">
                                                                    <input type="text"
                                                                        class="edit_field h-100 form-control mr-3 mb-3 inputfield"
                                                                        id="inputObservation" placeholder="Observation"
                                                                        name="observation"
                                                                        value="{{ $client->observation }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label for="inputIce"
                                                                class="col-sm-3 mt-2 text-sm form-label">ICE</label>
                                                            <div class="col-sm-12 d-flex align-items-center" id="iceRow">
                                                                <textarea name="ice" value="" class="edit_field form-control inputfield" id="inputIce" placeholder="ICE ..." rows="4">{{ $client->ice }}</textarea>
                                                            </div>
                                                        </div>


                                                        <div class="form-group row" style="margin-right: 40px">
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
    
{{-- @endif --}}
