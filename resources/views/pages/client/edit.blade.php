@extends('layout')

@section('content')
    <div class="row  mb-3">
        <div class="col-12 col-sm-0 mb-xl-0 mb-3">
            <div class="card">
                <div class="card-body p-0 pt-2 pb-1">
                    <div class="px-4 d-flex justify-content-between align-items-center">
                        <h6>Modifier Les Informations des Client</h6>
                        <a href="/Client" class="btn btn-dark mt-2 px-5">Retour</a>
                    </div>
                    <form action="{{ action('App\Http\Controllers\ClientsController@update', [$client->id])  }}" method="POST"
                        id="edit_client" class="px-4 pt-4">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mb-3">
                                <label for="inputNom" class="col-sm-3 mt-2 text-sm form-label">Nom</label>
                                <div class="col-sm-12 d-flex align-items-center" id="nomRow">
                                    <input type="text" class="h-100 form-control mr-3 mb-3" id="inputNom"
                                        placeholder="Nom de Client/Société (Required)" name="nom" value="{{$client->nom}}">
                                </div>
                            </div>
                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mb-3">
                                <label for="inputCode" class="col-sm-3 mt-2 text-sm form-label">Code Externe</label>
                                <div class="col-sm-12 d-flex align-items-center" id="codeRow">
                                    <input type="text" class="h-100 form-control mr-3 mb-3" id="inputCode"
                                        placeholder="Code Externe (Required)" name="code_externe" value="{{$client->code_externe}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xl-8 col-sm-0 mb-xl-0 mb-3">
                                <label for="inputEmail" class="col-sm-3 mt-2 text-sm form-label">E-mail</label>
                                <div class="col-sm-12 d-flex align-items-center" id="emailRow">
                                    <input type="text" class="h-100 form-control mr-3 mb-3" id="inputEmail"
                                        placeholder="E-mail" name="email" value="{{$client->email}}">
                                </div>
                            </div>
                            <div class="form-group col-xl-4 col-sm-0 mb-xl-0 mb-3">
                                <label for="inputCode" class="col-sm-3 mt-2 text-sm form-label">Type</label>
                                <select name="type_list" id="select_type" class="form-select">
                                    <option selected>Which type of clients (Required)</option>
                                    <option value="Marché Local" {{ $client->type === 'Marché Local' ? 'selected' : '' }} >Marché Local</option>
                                    <option value="Société" {{ $client->type === 'Société' ? 'selected' : '' }}>Société</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xl-4 col-sm-0 mb-xl-0 mb-3">
                                <label for="inputTelephone" class="col-sm-3 mt-2 text-sm form-label">Télephone</label>
                                <div class="col-sm-12 d-flex align-items-center" id="telephoneRow">
                                    <input type="text" class="h-100 form-control mr-3 mb-3" id="inputTelephone"
                                        placeholder="Télephone (Required)" name="telephone" value="{{$client->telephone}}">
                                </div>
                            </div>
                            <div class="form-group col-xl-4 col-sm-0 mb-xl-0 mb-3">
                                <label for="inputFax" class="col-sm-3 mt-2 text-sm form-label">Fax</label>
                                <div class="col-sm-12 d-flex align-items-center" id="faxRow">
                                    <input type="text" class="h-100 form-control mr-3 mb-3" id="inputFax" placeholder="Fax"
                                        name="fax" value="{{$client->fax}}">
                                </div>
                            </div>
                            <div class="form-group col-xl-4 col-sm-0 mb-xl-0 mb-3">
                                <label for="inputGSM" class="col-sm-3 mt-2 text-sm form-label">GSM</label>
                                <div class="col-sm-12 d-flex align-items-center" id="GSMRow">
                                    <input type="text" class="h-100 form-control mr-3 mb-3" id="inputGSM" placeholder="GSM"
                                        name="gsm" value="{{$client->gsm}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xl-2 col-sm-0 mb-xl-0 mb-3">
                                <label for="inputPays" class="col-sm-3 mt-2 text-sm form-label">Pays</label>
                                <div class="col-sm-12 d-flex align-items-center" id="paysRow">
                                    <input type="text" class="h-100 form-control mr-3 mb-3" id="inputPays"
                                        placeholder="Pays" name="pays" value="{{$client->pays}}">
                                </div>
                            </div>
                            <div class="form-group col-xl-2 col-sm-0 mb-xl-0 mb-3">
                                <label for="inputVille" class="col-sm-3 mt-2 text-sm form-label">Ville</label>
                                <div class="col-sm-12 d-flex align-items-center" id="villeRow">
                                    <input type="text" class="h-100 form-control mr-3 mb-3" id="inputVille"
                                        placeholder="Ville (Required)" name="ville" value="{{$client->ville}}">
                                </div>
                            </div>
                            <div class="form-group col-xl-8 col-sm-0 mb-xl-0 mb-3">
                                <label for="adresseRow" class="col-sm-3 mt-2 text-sm form-label">Adresse</label>
                                <div class="col-sm-12 d-flex align-items-center" id="adresseRow">
                                    <input type="text" class="h-100 form-control mr-3 mb-3" id="inputAdresse"
                                        placeholder="Adresse (Required)" name="adresse" value="{{$client->adresse}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mb-3">
                                <label for="inputIf" class="col-sm-3 mt-2 text-sm form-label">IF</label>
                                <div class="col-sm-12 d-flex align-items-center" id="ifRow">
                                    <input type="text" class="h-100 form-control mr-3 mb-3" id="inputIf" placeholder="If"
                                        name="if" value="{{$client->if}}">
                                </div>
                            </div>
                            <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mb-3">
                                <label for="inputObservation" class="col-sm-3 mt-2 text-sm form-label">Observation</label>
                                <div class="col-sm-12 d-flex align-items-center" id="observationRow">
                                    <input type="text" class="h-100 form-control mr-3 mb-3" id="inputObservation"
                                        placeholder="Observation" name="observation" value="{{$client->observation}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label for="inputIce" class="col-sm-3 mt-2 text-sm form-label">ICE</label>
                            <div class="col-sm-12 d-flex align-items-center" id="iceRow">
                                <textarea name="ice" value="" class="form-control" id="inputIce" placeholder="ICE ..." rows="4">{{$client->ice}}</textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-9 mt-5">
                                <button type="submit" class="btn btn-primary float-end px-4 ">Modifier</button>
                                <button type="button" id="clear_client"
                                    class="btn btn-danger float-end px-4 mx-1">Supprimer</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
