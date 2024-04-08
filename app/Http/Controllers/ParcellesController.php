<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Serre;
use App\Models\Culture;
use App\Models\Variete;
use App\Models\Ferme;
use App\Models\Domaine;
use App\Models\Porte_greffe;
use App\Models\Parcel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ParcellesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Green Harvest";
        $page = "Parcelle";
        $cultures = Culture::all();
        $varietes = Variete::all();
        $domaines = Domaine::all();
        $fermes = Ferme::all();
        $serres = Serre::all();
        $porte_greffes = Porte_greffe::all();
        $parcelles = Parcel::all();

        $user_id = Auth::user()->id;
        $users = User::find($user_id);

        $parcelles = DB::table('parcels')
        ->Join('serres', 'serres.id', '=', 'parcels.serre_id')
        ->Join('fermes', 'fermes.id', '=', 'serres.ferme_id')
        ->Join('domaines', 'domaines.id', '=', 'fermes.domaine_id')
        ->Join('cultures', 'cultures.id', '=', 'parcels.culture_id')
        ->Join('varietes', 'varietes.id', '=', 'cultures.variete_id')
        ->Join('porte_greffes', 'porte_greffes.id', '=', 'cultures.porte_greffe_id')
        ->select('parcels.*', 'serres.serre', 'fermes.ferme' , 'domaines.domaine', 'varietes.variete', 'cultures.culture', 'porte_greffes.porte_greffe')
        ->distinct()
        ->orderBy('parcels.date_debut_travaux', 'DESC')->orderBy('serres.serre', 'ASC')
        ->get();

        return view('pages.parcelle')->with('title', $title)
            ->with('page', $page)
            ->with('porte_greffes', $porte_greffes)
            ->with('cultures', $cultures)
            ->with('varietes', $varietes)
            ->with('domaines', $domaines)
            ->with('serres', $serres)
            ->with('parcelles', $parcelles)
            ->with('fermes', $fermes)
            ->with('users' ,$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'domaine' => 'required',
            'ferme' => 'required',
            'serre' => 'required',
            'variete' => 'required',
            'culture' => 'required',
            'date_debut_travaux' => 'required',
            'reference_technique' => 'integer|digits_between:4,10',
        ]);

        // ------ DOMAINE TABLE ----------
        $domaines = Domaine::firstOrCreate([
            'domaine' => $request->input('domaine')
        ]);
        $domaine_id = $domaines->id;

        // ------ FERME TABLE ----------
        $fermes = Ferme::firstOrCreate([
            'domaine_id' => $domaine_id,
            'ferme' => $request->input('ferme')
        ]);
        $ferme_id = $fermes->id;

        // ------ Serre TABLE ----------
        $serres = Serre::firstOrCreate([
            'ferme_id' => $ferme_id,
            'serre' => $request->input('serre')
        ]);
        $serres_id = $serres->id;

        // $cultures = Culture::where('culture', $request->input('culture'))->first();
        // $culture_id = $cultures->id;

        // ------ PARCELLE TABLE ----------
        $parcelles = new Parcel;
        $parcelles->serre_id = $serres_id;
        $parcelles->culture_id = $request->input('culture');
        $parcelles->reference_technique = $request->input('reference_technique');
        $parcelles->densite = $request->input('densite');
        $parcelles->ecartement = $request->input('ecartement');
        $parcelles->nombre_plants = $request->input('nombre_plants');
        $parcelles->superficie = $request->input('superficie');
        $parcelles->status = $request->input('status');
        $parcelles->mode_plantation = $request->input('mode_plantation');
        $parcelles->date_debut_travaux = $request->input('date_debut_travaux');
        $parcelles->date_surgreffage = $request->input('date_surgreffage');
        $parcelles->date_arrachage = $request->input('date_arrachage');
        $parcelles->date_fin_recolte = $request->input('date_fin_recolte');
        $parcelles->save();

        return redirect('/Parcelle')->with('success', 'Ajouté Avec Succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Parcel::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'domaine' => 'required',
            'ferme' => 'required',
            'serre' => 'required',
            'variete' => 'required',
            'culture' => 'required',
            'date_debut_travaux' => 'required',
            'reference_technique' => 'integer|digits_between:4,10',
        ]);

        // $cultures = Culture::where('culture', $request->input('culture'))->first();
        // $culture_id = $cultures->id;

        // ------ PARCELLE TABLE ----------

        $parcelles = Parcel::findOrFail($id);

        $parcelles->serre_id = $request->input('serre');
        $parcelles->culture_id = $request->input('culture');
        $parcelles->reference_technique = $request->reference_technique;
        $parcelles->densite = $request->densite;
        $parcelles->ecartement = $request->ecartement;
        $parcelles->nombre_plants = $request->input('nombre_plants');
        $parcelles->superficie = $request->input('superficie');
        $parcelles->status = $request->input('status');
        $parcelles->mode_plantation = $request->input('mode_plantation');
        $parcelles->date_debut_travaux = $request->input('date_debut_travaux');
        $parcelles->date_surgreffage = $request->input('date_surgreffage');
        $parcelles->date_arrachage = $request->input('date_arrachage');
        $parcelles->date_fin_recolte = $request->input('date_fin_recolte');

        $parcelles->update();

        return redirect('/Parcelle')->with('success', 'Modification Réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parcelles = Parcel::find($id);
        $parcelles->delete();
        return redirect('/Parcelle')->with('success', 'La culture est supprimée');
    }
}
