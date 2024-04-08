@extends('layout')

{{-- @if (Auth::user()->role->gerer_client) --}}

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg mb-4">
                <div class="card-header pb-4 d-flex justify-content-between align-items-center">
                    <h6>Chiffre d'affaires</h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <input type="text" class=" form-control h-50 w-75 mx-1" placeholder="Rechercher..">
                        <button class="btn mt-3 bg-gradient-success px-4 py-2 text-light addRecord" data-bs-toggle="modal"
                            data-bs-target="#addModal" data-bs-whatever="@getbootstrap" style="font-weight: 500">Ajouter
                        </button>

                        <!-- Edit Modal -->

                        <div class="modal fade " style="margin-left: 150px;" id="addModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl w-75">
                                <div class="modal-content">
                                    <div class="px-4 modal-header d-flex justify-content-between align-items-center">
                                        <h6>Ajouter facturation</h6>
                                        <button type="button" class="btn btn-dark mt-2 px-4"
                                            data-bs-dismiss="modal">Retour</button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="col-12">
                                            <div class="card mb-4">
                                                <div
                                                    class="card-header pb-3 d-flex justify-content-between align-items-center">
                                                    <h6>Export</h6>
                                                    <input type="text" class="search form-control h-50 w-25"
                                                        placeholder="Rechercher..">
                                                </div>
                                                <div class="card-body px-4 pt-0 pb-3">
                                                    <table
                                                        class="table align-items-center justify-content-center mb-0 results">
                                                        <thead class="bg-gradient-success rounded">
                                                            <tr class="text-light">
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    <div class="check__item">
                                                                        <label>
                                                                            <input type="checkbox"
                                                                                class="default__check mt-3" name="checkAll"
                                                                                id="checkAll">
                                                                            <span class="custom__check"></span>
                                                                        </label>
                                                                    </div>
                                                                </th>
                                                                <th
                                                                    class="text-uppercase text-light text-xs font-weight-bolder">
                                                                    Date</th>
                                                                <th
                                                                    class="text-uppercase text-light text-xs font-weight-bolder ps-2">
                                                                    Parcelle</th>
                                                                <th
                                                                    class="text-uppercase text-light text-xs font-weight-bolder ps-2">
                                                                    Variété</th>
                                                                <th
                                                                    class="text-uppercase text-light text-xs font-weight-bolder ps-2">
                                                                    Poids</th>
                                                                <th
                                                                    class="text-uppercase text-light text-xs font-weight-bolder ps-2">
                                                                    Client</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="tbody-dark">
                                                            @foreach ($exports as $export)
                                                                <tr style="border-bottom: 1px solid rgba(0, 0, 0, 0.162); border-left: 1px solid rgba(0, 0, 0, 0.162); border-right: 1px solid rgba(0, 0, 0, 0.162);"
                                                                    {{-- class="border-bottom-1 border-secondary " --}}>
                                                                    <td>
                                                                        <div class="d-flex px-3 mt-2">
                                                                            <div class="my-auto">
                                                                                <div class="check__item">
                                                                                    <label>
                                                                                        <input type="checkbox"
                                                                                            class="default__check"
                                                                                            name="export_id" id="checka"
                                                                                            value="{{ $export->id }}">
                                                                                        <span class="custom__check"></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex px-3">
                                                                            <div class="my-auto">
                                                                                <p class="text-sm font-weight-bold mb-0">
                                                                                    {{ $export->date_recolte }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0">
                                                                            {{ $export->serre }}</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0">
                                                                            {{ $export->variete }}</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0">
                                                                            {{ $export->poids_net }}</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0">
                                                                            {{ $export->nom }}</p>
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="card mb-4">
                                                <div class="row mt-2 px-4">

                                                    <div class="form-group col-xl-6 col-sm-0 mb-xl-0">
                
                                                        <div class="row d-flex mb-3">
                                                            <label for="nombrePlantsInput" class="col-sm-3 mt-1 text-sm form-label">Poids Net
                                                                :</label>
                                                            <div class="form-group col-xl-7 col-sm-0 mb-xl-0 m-0 p-0">
                                                                <input type="number" step="any" value="" id="nombrePlantsInput"
                                                                    class="form-control inputfield" name="nombre_plants">
                                                            </div>
                                                        </div>
                
                                                        <div class="row d-flex mb-4">
                                                            <label for="densiteInput" class="col-sm-3 mt-2 text-sm form-label">Poids Com
                                                                :</label>
                                                            <div class="form-group col-xl-7 col-sm-0 mb-xl-0 m-0 p-0">
                                                                <input type="number" step="any" value="" id="densiteInput"
                                                                    class="form-control inputfield" name="densite">
                                                            </div>
                                                        </div>
                
                                                        <div class="row d-flex mb-4">
                                                            <label for="ecartementInput"
                                                                class="col-sm-3 mt-2 text-sm form-label">Prix
                                                                :</label>
                                                            <div class="form-group col-xl-7 col-sm-0 mb-xl-0 m-0 p-0">
                                                                <input type="number" step="any" value="" id="ecartementInput"
                                                                    class="form-control inputfield" name="ecartement">
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
                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">

                    <table class="table align-items-center justify-content-center mb-0 " id="export_table">
                        <thead>
                            <tr>
                                {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                <div class="check__item">
                                    <label>
                                        <input type="checkbox" class="default__check mt-3" name="checkAll"
                                            id="checkAll">
                                        <span class="custom__check"></span>
                                    </label>
                                </div>
                                </th> --}}
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    De</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Jusqu'à</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Parcelle</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Client</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Parcelle</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Poids Net</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Poids Com</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Prix Com</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @endif --}}
