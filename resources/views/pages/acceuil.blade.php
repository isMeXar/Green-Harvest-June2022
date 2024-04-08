@extends('layout')
@section('content')
    <div class="row">
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card shadow-lg">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Nombre de parcelles</p>
                                <h5 class="font-weight-bolder">
                                    {{ $num_parcel }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-sm-6">
            <div class="card shadow-lg">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Nombre de clients</p>
                                <h5 class="font-weight-bolder">
                                    {{ $num_client }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-sm-6 mb-xl-0 mt-4">
            <div class="card shadow-lg">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Export d'aujourd'hui</p>
                                <h5 class="font-weight-bolder">
                                    {{ $poids_com }} Kg
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow-ifno text-center rounded-circle">
                                {{-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> --}}
                                <i class="bi bi-graph-up-arrow opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-sm-6 mb-xl-0 mt-4">
            <div class="card shadow-lg">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Dechet d'aujourd'hui</p>
                                <h5 class="font-weight-bolder">
                                    {{ $poids_dechet }} Kg
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="bi bi-graph-down-arrow opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    {{-- <div class="row mt-4">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            <div class="card shadow-lg bg-white px-3">
                <div class="card-body p-3">
                    <div class="row">
                        <figure class="highcharts-figure" class="width: 20rem; height:15rem;">
                            <div id="container"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    {{-- <div class="row">
        <div class="col-12">
            <div class="card shadow-lg " style="height: 30rem">
                <div class="card-header pb-1 d-flex justify-content-between">
                    <h6>Dashboard</h6>
                    <div class="d-flex">
                        <h6 id="time"></h6>
                        <h6>&nbsp;&nbsp;&nbsp;{{ date('d-m-Y') }}</h6>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <hr>
                    <div class="d-flex justify-content-start align-items-center mx-4">
                        <div style="display: flex; flex-direction: column; justify-content: center; align-items-center">
                            <h4 class="text-dark mt-2">Bienvenue dans votre espace personel !</h4>
                            <h1 class="text-success mt-2">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
