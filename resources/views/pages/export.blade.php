@extends('layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg mb-4">
                <div class="card-header pb-4 d-flex justify-content-between align-items-center">
                    <h6>Export</h6>
                    <input type="text" class="search form-control h-50 w-25" placeholder="Rechercher..">
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    {{-- <div class="table-responsive p-0">
                        <div class="d-flex justify-content-between align-items-center mx-4 mb-3">

                            <div class="row col-xl-6 col-sm-0 mb-xl-0">
                                <div class="form-group col-xl-6 col-sm-0 mb-xl-0">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <label for="select_culture" class="col-sm-3 text-sm form-label">De :</label>
                                        <input type="date" value="" class="form-control recolte_field">
                                    </div>
                                </div>
                                <div class="form-group col-xl-6 col-sm-0 mb-xl-0">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <label for="select_culture" class="col-sm-4 text-sm form-label">Jusqu'à
                                            :</label>
                                        <input type="date" value="" class="form-control recolte_field">
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

                    <table class="table align-items-center justify-content-center mb-0 results" id="export_table">
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
                                    Date</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Parcelle</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Variété</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Export Net</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Export Com</th>
                                {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Prix par Kg (Dh)</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Prix Total (Dh)</th> --}}
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Client</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exports as $export)
                                <tr>
                                    {{-- <td>
                                        <div class="d-flex px-3 mt-2">
                                            <div class="my-auto">
                                                <div class="check__item">
                                                    <label>
                                                        <input type="checkbox" class="default__check" name="export_id"
                                                            id="checka" value="{{ $export->id }}">
                                                        <span class="custom__check"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </td> --}}
                                    <td>
                                        <div class="d-flex px-3">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">{{ $export->date_recolte }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $export->serre }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $export->variete }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $export->poids_net }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 poids_t">{{ $export->poids_com }}</p>
                                    </td>
                                    {{-- <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $export->prix }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 prix_t">{{ $export->prix_total }}</p>
                                    </td> --}}
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $export->nom }}</p>
                                    </td>
                                    <td class="align-center">
                                        <div class="d-flex  justify-content-start align-items-center">
                                            {{-- <button
                                                    class="btn btn-dark px-3 mx-1 text-light" data-bs-toggle="modal"
                                                    data-bs-target="#viewModal" data-bs-whatever="@getbootstrap"><i 
                                                    class="bi bi-eye"></i></button> --}}
                                            <a href="{{ route('Export.edit', $export->id) }}"
                                                class="btn btn-info px-3 mx-1 text-light editRecord" data-bs-toggle="modal"
                                                data-id="{{ $export->id }}" data-bs-target="#editModal{{ $export->id }}"
                                                data-bs-whatever="@getbootstrap"><i class="bi bi-pencil-square"></i></a>
                                            {{-- <form
                                                    action="{{ action('App\Http\Controllers\ExportsController@destroy', [$export->id]) }}"
                                                    method="POST">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-danger px-3"><i class="bi bi-person-x"></i></a>
                                                </form> --}}
                                        </div>
                                    </td>
                                </tr>
                                <!-- Edit Modal -->

                                <div class="modal fade " style="margin-left: 150px;" id="editModal{{ $export->id }}"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl w-75">
                                        <div class="modal-content">
                                            <div
                                                class="px-4 modal-header d-flex justify-content-between align-items-center">
                                                <h6>Modifier Export</h6>
                                                <button type="button" class="btn btn-dark mt-2 px-4"
                                                    data-bs-dismiss="modal">Retour</button>
                                            </div>
                                            <div class="modal-body">
                                                <form
                                                    action="{{ action('App\Http\Controllers\ExportsController@update', [$export->id]) }}"
                                                    method="POST" id="edit_export" class="px-4 pt-4">
                                                    {{ method_field('PUT') }}
                                                    {{ csrf_field() }}

                                                    <div class="row border border-dark rounded-3 pb-4 mt-3"
                                                        style="margin-right: 1.5rem;margin-left: 1rem">
                                                        <label for=""
                                                            class="col-sm-3 text-sm form-label bg-gray-200"
                                                            style="position: relative; top:-.8rem;left:.5rem;width:80px;">Export</label>
                                                        <div class="row" style="padding: 0 3rem;grid-gap: 2rem">

                                                            <div class="row w-100">
                                                                <div class="form-group w-50">
                                                                    <label for="edit_poids_export"
                                                                        class="col-sm-8 mt-0 text-sm form-label"><span
                                                                            class="text-warning">*</span>Poids Net
                                                                        :</label>
                                                                    <div
                                                                        class="form-group col-xl-12 col-sm-0 mb-xl-0 m-0 p-0">
                                                                        <input type="number" step="any"
                                                                            value="{{ $export->poids_net }}"
                                                                            id="edit_poids_export_net{{ $export->id }}"
                                                                            class="form-control edit_field"
                                                                            name="poids_export_net" placeholder="Export">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group w-50">
                                                                    <label for="edit_poids_export"
                                                                        class="col-sm-8 mt-0 text-sm form-label"><span
                                                                            class="text-warning">*</span>Poids Commercial
                                                                        :</label>
                                                                    <div
                                                                        class="form-group col-xl-12 col-sm-0 mb-xl-0 m-0 p-0">
                                                                        <input type="number" step="any"
                                                                            value="{{ $export->poids_com }}"
                                                                            id="edit_poids_export{{ $export->id }}"
                                                                            class="form-control edit_field"
                                                                            name="poids_export_com" placeholder="Export">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            {{-- <div class="row w-100">

                                                                <div class="form-group w-50">
                                                                    <label for="edit_prix_export"
                                                                        class="col-sm-8 mt-0 text-sm form-label"><span
                                                                            class="text-warning">*</span>Prix par Kg
                                                                        :</label>
                                                                    <div
                                                                        class="form-group col-xl-12 col-sm-0 mb-xl-0 m-0 p-0">
                                                                        <input type="number" step="any"
                                                                            value="{{ $export->prix }}"
                                                                            id="edit_prix_export{{ $export->id }}"
                                                                            class="form-control edit_field" name="prix"
                                                                            placeholder="par Kilogramme">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group w-50">
                                                                    <label for="prix_total_export"
                                                                        class="col-sm-8 mt-0 text-sm form-label">Prix
                                                                        Totale
                                                                        :</label>
                                                                    <div
                                                                        class="form-group col-xl-12 col-sm-0 mb-xl-0 m-0 p-0">
                                                                        <input type="number" step="any"
                                                                            value="{{ $export->prix_total }}"
                                                                            id="prix_total_export{{ $export->id }}"
                                                                            class="form-control edit_field"
                                                                            name="prix_total" placeholder="Export" readonly>
                                                                    </div>
                                                                </div>

                                                            </div> --}}

                                                            <div class="form-group w-100">
                                                                <label for="edit_select_client"
                                                                    class="col-sm-8 mt-0 text-sm form-label"><span
                                                                        class="text-warning">*</span>Client
                                                                    :</label>
                                                                <div class="form-group col-xl-12 col-sm-0 mb-xl-0 m-0 p-0">
                                                                    <select name="client" id="edit_select_client"
                                                                        class="form-select edit_export_opt">
                                                                        <option value="">Choose a Client</option>
                                                                        @foreach ($clients as $client)
                                                                            <option value="{{ $client->id }}"
                                                                                {{ $export->client_id === $client->id ? 'selected' : '' }}>
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
                                                            <button type="button" id="clear_edit_export"
                                                                class="btn btn-danger float-end px-6 mx-1">Effacer</button>

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
                    <div style="border-top: 1px solid rgb(189, 189, 189); grid-gap: 3rem;" class="mx-2">

                        {{-- <div class="mt-3 mb-0">
                            <button class="btn bg-primary text-white" onclick="window.print()">Imprimer</button>
                            <button class="btn bg-success text-white">Modifier</button>
                        </div> --}}

                        <div class="d-flex justify-content-between align-items-center mx-3 mt-3">
                            <p>&nbsp;&nbsp;</p>
                            <p class="text-sm font-weight-bold">Poids Com Totale:&nbsp;&nbsp; <span
                                    id="poids_total_glbl"></span> Kg
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
