<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Culture;
use App\Models\Variete;
use App\Models\Produit;
use App\Models\Ferme;
use App\Models\Domaine;
use App\Models\Porte_greffe;
use App\Models\Serre;

class SerresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Green Camp";
        $page= "Parcelle";
        $cultures = Culture::all();
        $varietes = Variete::all();
        $domaines = Domaine::all();
        $fermes = Ferme::all();
        $produits = Produit::all();
        $parcelles = Serre::all();
        $porte_greffes = Porte_greffe::all();
        return view('pages.parcelle')->with('title',$title)
                                     ->with('page',$page)
                                     ->with('porte_greffes',$porte_greffes)
                                     ->with('cultures',$cultures)
                                     ->with('varietes',$varietes)
                                     ->with('produits',$produits)
                                     ->with('domaines',$domaines)
                                     ->with('parcelles',$parcelles)
                                     ->with('fermes',$fermes);
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
            'culture' => 'required',
            'variete' => 'required',
            'produit' => 'required',
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

        // ------ PRODUIT TABLE ----------
        // $culture_id = Culture::find($request->input('culture'));
        // $variete_id = Variete::find($request->input('variete'));

        $culture = Culture::firstOrCreate([
            'culture' => $request->get('culture')
        ]);
        $culture_id = $culture->id;

        $variete = Variete::firstOrCreate([
            'culture_id' => $culture_id,
            'variete' => $request->get('variete')
        ]);
        $variete_id = $variete->id;

        $produits = Produit::firstOrCreate([
            'variete_id' => $variete_id, 
            'produit' => $request->input('produit'),
        ]);
        $produit_id = $produits->id;

        // ------ Porte-Greffe TABLE ----------
        $porte_greffes = Porte_greffe::firstOrCreate(['porte_greffe' => $request->input('porte_greffe')]);
        $porte_greffe_id = $porte_greffes->id;

        // ------ PARCELLE TABLE ----------
        $parcelles = new Serre;
        $parcelles->ferme_id = $ferme_id;
        $parcelles->produit_id = $produit_id;
        $parcelles->porte_greffe_id = $porte_greffe_id; 
        $parcelles->parcelle = $request->get('parcelle');
        $parcelles->reference_technique = $request->input('reference_technique');
        $parcelles->densite = $request->input('densite');
        $parcelles->ecartement = $request->input('ecartement');
        $parcelles->nombre_plants = $request->input('nombre_plants');
        $parcelles->superficie = $request->input('superficie');
        $parcelles->status = $request->input('status');
        $parcelles->mode_plantation = $request->input('mode_plantation');
        $parcelles->zone = $request->input('zone');
        $parcelles->date_debut_travaux = $request->input('date_debut_travaux');
        $parcelles->date_surgreffage = $request->input('date_surgreffages');
        $parcelles->date_arrachage = $request->input('date_arrachage');
        $parcelles->date_fin_recolte = $request->input('date_fin_recolte');
        $parcelles->save();

        return redirect('/Parcelle/create')->with('success', 'Added Successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serre = Serre::find($id);
        $serre->delete();
        return redirect('/Parcelle/create')->with('success', 'Parcelle is Deleted');
    }
}
