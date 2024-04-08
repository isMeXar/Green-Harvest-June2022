@extends('layout')

@section('content')
    @if (Auth::user()->role->gerer_produit)
        <div class="row mb-3">
            <div class="col-xl-12 col-sm-0 mb-xl-0 mb-3">
                <div class="card shadow-lg">
                    <div class="card-body p-0 pt-2 pb-1">

                        <div class="px-4 d-flex justify-content-between align-items-center">
                            <h6>Produit</h6>
                            <button class="btn p-0 mt-0" type="button" data-bs-toggle="collapse"
                                data-bs-target="#add_produit" aria-expanded="false" aria-controls="add_produit">
                                <input type="checkbox" class="hidden openach" id="second_checkbox" name="pages[]" hidden />
                                <label class="text-center p-0" style="cursor: pointer;" for="second_checkbox"><i
                                        class="bi bi-plus-circle-fill text-dark fa-2x"></i></label>
                            </button>
                        </div>

                        <form action="{{ action('App\Http\Controllers\ProduitsController@store') }}" method="POST"
                            id="add_produit" class="px-4 pt-2 collapse">
                            @csrf
                            <div>
                                <div class="row mb-2">
                                    <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mb-3">
                                        <label for="select_culture" class="col-sm-3 mt-2 text-sm form-label"><span
                                                class="text-warning">*</span>Culture</label>
                                        <div class="col-sm-11 d-flex align-items-center mt-1" id="nomRow">
                                            <select name="select_culture" id="select_culture"
                                                class="form-select culture_opt">
                                                <option value=""></option>
                                                @foreach ($cultures as $culture)
                                                    <option value="{{ $culture->culture }}">{{ $culture->culture }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-primary text-light px-2 py-0 mb-0"
                                                data-bs-toggle="modal" data-bs-target="#addCultureeModal"
                                                data-bs-whatever="@getbootstrap" style="margin-left: 10px">
                                                <i class="bi bi-plus fa-2x"></i>
                                            </button>
                                        </div>
                                        <div class="form-group col-xl-2 col-sm-0 mb-xl-0">
                                            <div class="modal fade" id="addCultureeModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ajouter
                                                                Culture</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="mb-3">
                                                                    <label for="new_culture"
                                                                        class="col-sm-5 mt-2 text-sm form-label">Culture
                                                                        :</label>
                                                                    <input type="text" class="form-control"
                                                                        id="new_culture">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Fermer</button>
                                                            <button type="button" class="btn btn-info"
                                                                onclick="addCulture()"
                                                                data-bs-dismiss="modal">Ajouter</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mb-3">
                                        <label for="select_porte_greffe" class="col-sm-3 mt-2 text-sm form-label"><span
                                                class="text-warning">*</span>Porte-greffe
                                            :</label>
                                        <div class="col-sm-12 d-flex align-items-center mt-1" id="nomRow">
                                            <div class="col-sm-10 d-flex align-items-center mt-1">
                                                <select name="porte_greffe" id="select_porte_greffe"
                                                    class="form-select parcelle_opt">
                                                    <option value=""></option>
                                                    @foreach ($porte_greffes as $porte_greffe)
                                                        <option value="{{ $porte_greffe->porte_greffe }}">
                                                            {{ $porte_greffe->porte_greffe }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-2 d-flex align-items-center mt-1 mx-2">
                                                <button type="button" class="btn btn-primary text-light px-2 py-0 mb-0"
                                                    data-bs-toggle="modal" data-bs-target="#addPorteModal"
                                                    data-bs-whatever="@getbootstrap">
                                                    <i class="bi bi-plus fa-2x"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group col-xl-2 col-sm-0 mb-xl-0">
                                            <div class="modal fade" id="addPorteModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ajouter
                                                                Porte-Greffe</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="mb-3">
                                                                    <label for="new_porte_greffe"
                                                                        class="col-sm-5 mt-2 text-sm form-label">Porte-Greffe
                                                                        :</label>
                                                                    <input type="text" class="form-control"
                                                                        id="new_porte_greffe">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Fermer</button>
                                                            <button type="button" class="btn btn-info"
                                                                onclick="addPorteGreffe()"
                                                                data-bs-dismiss="modal">Ajouter</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-2">
                                    <div class="form-group col-xl-6 col-sm-0 mb-xl-0 mb-3">
                                        <label for="select_variete" class="col-sm-3 mt-2 text-sm form-label"><span
                                                class="text-warning">*</span>Variété</label>
                                        <div class="col-sm-11 d-flex align-items-center mt-1" id="nomRow">
                                            <select name="select_variete" id="select_variete"
                                                class="form-select produit_opt">
                                                <option value=""></option>
                                                @foreach ($varietes as $variete)
                                                    <option value="{{ $variete->variete }}">{{ $variete->variete }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-primary text-light px-2 py-0 mb-0"
                                                data-bs-toggle="modal" data-bs-target="#addVarieteModal"
                                                data-bs-whatever="@getbootstrap" style="margin-left: 10px">
                                                <i class="bi bi-plus fa-2x"></i>
                                            </button>
                                        </div>
                                        <div class="form-group col-xl-2 col-sm-0 mb-xl-0">
                                            <div class="modal fade" id="addVarieteModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ajouter
                                                                Variété</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="mb-3">
                                                                    <label for="new_variete"
                                                                        class="col-sm-5 mt-2 text-sm form-label">Variété
                                                                        :</label>
                                                                    <input type="text" class="form-control"
                                                                        id="new_variete">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Fermer</button>
                                                            <button type="button" class="btn btn-info"
                                                                onclick="addVariete()"
                                                                data-bs-dismiss="modal">Ajouter</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-xl-5 col-sm-0 mb-xl-0">
                                        <label for="produitInput" class="col-sm-3 mt-2 text-sm form-label"><span
                                                class="text-warning">*</span>Produit</label>
                                        <div class="col-sm-12 d-flex align-items-center mt-1" id="nomRow">
                                            <input type="text" name="produit" id="produitInput"
                                                class="produit_field form-control mr-3 mb-3">
                                        </div>
                                    </div>

                                </div>



                                <div class="col-sm-8 mt-5">
                                    <button type="submit" name="produit_form"
                                        class="btn btn-primary float-end px-6 ">Ajouter</button>
                                    <button type="button" id="clear_produit"
                                        class="btn btn-danger float-end px-6 mx-2">Effacer</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header pb-4 d-flex justify-content-between">
                        <h6>Table des Produits</h6>
                        <input type="text" class="search form-control h-50 w-25" placeholder="Rechercher..">
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0 mx-2">

                            <table class="table align-items-center justify-content-center mb-0 results">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Culture</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Variété</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Produit</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Porte-Greffe</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Created at</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produits as $produit)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-3">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $produit->culture }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $produit->variete }}</p>
                                            </td>
                                            <td class="w-25">
                                                <p class="text-sm font-weight-bold mb-0">{{ $produit->produit }}</p>
                                            </td>
                                            <td class="w-25">
                                                <p class="text-sm font-weight-bold mb-0">{{ $produit->porte_greffe }}
                                                </p>
                                            </td>
                                            <td>
                                                <span
                                                    class="text-xs font-weight-bold">{{ date('d/m/Y', strtotime($produit->created_at)) }}</span>
                                            </td>
                                            <td class="align-center">
                                                <div class="d-flex justify-content-start align-items-center"
                                                    style="grid-gap: .1rem;">
                                                    <a href="{{ route('Produit.edit', $produit->id) }}"
                                                        data-id="{{ $produit->id }}"
                                                        class="btn btn-info px-3 mx-1 text-light editProduitBtn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $produit->id }}"
                                                        data-bs-whatever="@getbootstrap"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    <form
                                                        action="{{ action('App\Http\Controllers\ProduitsController@destroy', [$produit->id]) }}"
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

                                        <div class="modal fade " style="margin-left: 138px;margin-top: 70px;"
                                            id="editModal{{ $produit->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div
                                                        class="px-4 modal-header d-flex justify-content-between align-items-center">
                                                        <h6>Modifier Produit</h6>
                                                        <button type="button" class="btn btn-dark mt-2 px-4"
                                                            data-bs-dismiss="modal">Retour</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ action('App\Http\Controllers\ProduitsController@update', [$produit->id]) }}"
                                                            method="POST" id="edit_client" class="px-4 pt-1">
                                                            {{ method_field('PUT') }}
                                                            {{ csrf_field() }}

                                                            <div class="row mb-3">
                                                                <div class="form-group col-xl-6 col-sm-0 mb-xl-0">
                                                                    <label for="sel_culture"
                                                                        class="col-sm-3 mt-2 text-sm form-label"><span
                                                                            class="text-warning">*</span>Culture</label>
                                                                    <div class="col-sm-12 d-flex align-items-center"
                                                                        id="nomRow">
                                                                        <select name="culture_select"
                                                                            id="sel_culture{{ $produit->id }}"
                                                                            class="form-select produit_opt">
                                                                            <option value=""></option>
                                                                            @foreach ($cultures as $culture)
                                                                                <option value="{{ $culture->culture }}"
                                                                                    {{ $produit->culture === $culture->culture ? 'selected' : '' }}>
                                                                                    {{ $culture->culture }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-xl-6 col-sm-0 mb-xl-0">
                                                                    <label for="sel_variete"
                                                                        class="col-sm-3 mt-2 text-sm form-label"><span
                                                                            class="text-warning">*</span>Variété</label>
                                                                    <div class="col-sm-12 d-flex align-items-center"
                                                                        id="nomRow">
                                                                        <select name="variete_select"
                                                                            id="sel_variete{{ $produit->id }}"
                                                                            class="form-select produit_opt">
                                                                            <option value=""></option>
                                                                            @foreach ($varietes as $variete)
                                                                                <option value="{{ $variete->variete }}"
                                                                                    {{ $produit->variete === $variete->variete ? 'selected' : '' }}>
                                                                                    {{ $variete->variete }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-xl-12 col-sm-0 mb-xl-0 mb-3">
                                                                    <label for="editProduit"
                                                                        class="col-sm-3 mt-2 text-sm form-label"><span
                                                                            class="text-warning">*</span>Produit</label>
                                                                    <div class="col-sm-12 d-flex">
                                                                        <input type="text" name="produit"
                                                                            id="editProduit{{ $produit->id }}"
                                                                            class="produit_field form-control mr-3 mb-3"
                                                                            value="{{ $produit->produit }}">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-sm-9 mt-5">
                                                                <button type="submit"
                                                                    class="btn btn-primary float-end px-6 ">Modifier</button>
                                                                <button type="button" id="clear_produit_modal"
                                                                    class="btn btn-danger float-end px-6 mx-2">Effacer</button>
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
    @endif
@endsection
