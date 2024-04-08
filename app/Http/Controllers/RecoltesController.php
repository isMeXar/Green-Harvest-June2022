<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Unite;
use App\Models\Ferme;
use App\Models\Client;
use App\Models\Parcel;
use App\Models\Harvest;
use App\Models\Export;
use App\Models\Dechet;

use Ramsey\Uuid\Type\Integer;

class RecoltesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="Green Harvest";
        $page= "Récolte";
        $fermes = Ferme::all();
        $unites = Unite::orderBy('conteneur', 'ASC')->orderBy('unite_par_kg', 'ASC')->get();
        $parcelles = Parcel::all();
        $clients = Client::where('type', 'Société')->get();

        $parcelles = DB::table('parcels')
        ->Join('serres', 'serres.id', '=', 'parcels.serre_id')
        ->select('parcels.*', 'serres.serre')
        ->where('status','En cours')
        ->orderBy('serres.serre', 'ASC')
        ->get();

        // $recoltes = Harvest::all();
        $recoltes = DB::table('harvests')
        ->Join('parcels', 'parcels.id', '=', 'harvests.parcel_id')
        ->Join('serres', 'serres.id', '=', 'parcels.serre_id')
        ->Join('fermes', 'fermes.id', '=', 'serres.ferme_id')
        ->Join('cultures', 'cultures.id', '=', 'parcels.culture_id')
        ->Join('varietes', 'varietes.id', '=', 'cultures.variete_id')
        ->Join('unites', 'unites.id', '=', 'harvests.unite_id')
        ->Join('dechets', 'dechets.harvest_id', '=', 'harvests.id')
        ->Join('exports', 'exports.harvest_id', '=', 'harvests.id')
        ->Join('clients', 'clients.id', '=', 'exports.client_id')
        ->select('harvests.*', 'serres.serre', 'fermes.ferme','cultures.culture', 'varietes.variete','exports.caisse_com', 'exports.poids_com', 'dechets.caisse_dechet', 'dechets.poids_dechet', 'unites.unite_par_kg', 'unites.conteneur', 'clients.nom'
        )
        ->distinct()
        ->orderBy('date_recolte', 'DESC')
        ->orderBy('serre', 'DESC')
        ->get();

        $user_id = Auth::user()->id;
        $users = User::find($user_id);

        return view('pages.recolte')
        ->with('title',$title)
        ->with('page',$page)
        ->with('fermes',$fermes)
        ->with('parcelles',$parcelles)
        ->with('clients',$clients)
        ->with('users' ,$users)
        ->with('recoltes',$recoltes)
        ->with('unites',$unites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
            'ferme' => 'required',
            'parcelle' => 'required',
            'caisse_net' => 'required',
            'caisse_dechet' => 'required',
            'unite' => 'required',
            'client' => 'required',
        ]);

        $caisse_net = (float)$request->input('caisse_net');
        $caisse_dechet = (float)$request->input('caisse_dechet');
        $caisse_com = (float)($caisse_net - $caisse_dechet);

        $unite = (float)($request->input('unite'));
        $poids_net = (float)($caisse_net * $unite);
        $export_poids_net = (float)($caisse_com * $unite);
        $poids_dechet = (float)($caisse_dechet * $unite);



        $unites = Unite::firstOrCreate([
            'conteneur' => $request->input('conteneur'),
            'unite_par_kg' => $request->input('unite'),
            'created_at' => date('Y-m-d', time()),
            'updated_at' => date('Y-m-d', time()),
        ]);
        $unite_id = $unites->id;

        // ------ PARCELLE TABLE ----------
        $recoltes = Harvest::firstOrCreate([
            'parcel_id' => $request->input('parcelle'),
            'unite_id' => $unite_id,
            'caisse_net' => $request->input('caisse_net'),
            'poids_net' => $poids_net,
            'date_recolte' => $request->input('date_recolte'),
            'created_at' => date('Y-m-d', time()),
            'updated_at' => date('Y-m-d', time()),
        ]);
        $recolte_id = $recoltes->id;

        // ------ Export TABLE ----------
        $exports = new Export;
        $exports->harvest_id = $recolte_id;
        $exports->client_id = $request->input('client');
        $exports->caisse_com = $caisse_com;
        $exports->poids_net = $export_poids_net;
        $exports->poids_com = $export_poids_net;
        $exports->save();

        // ------ Dechet TABLE ----------
        $dechets = new Dechet;
        $dechets->harvest_id = $recolte_id;
        $dechets->caisse_dechet = $caisse_dechet;
        $dechets->poids_dechet = $poids_dechet;
        $dechets->save();

        return redirect('/Recolte')->with('success', 'Ajouté avec Succès !');
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
        $edit = Harvest::find($id);
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
            'ferme' => 'required',
            'parcelle' => 'required',
            'caisse_net' => 'required',
            'caisse_dechet' => 'required',
            'caisse_com' => 'required',
            'poids_net' => 'required',
            'poids_com' => 'required',
            'poids_dechet' => 'required',
            'unite' => 'required',
            'client' => 'required',
        ]);

        $unites = Unite::where('unite_par_kg', $request->input('unite'))->first();
        $unites_id = $unites->id;

        $caisse_net = (float)$request->input('caisse_net');
        $caisse_dechet = (float)$request->input('caisse_dechet');
        $caisse_com = (float)($caisse_net - $caisse_dechet);

        $unite = (float)($request->input('unite'));
        $poids_net = (float)($caisse_net * $unite);
        $poids_com = (float)($caisse_com * $unite);
        $poids_dechet = (float)($caisse_dechet * $unite);

        Harvest::where('id', $id)
        ->update([
            'parcel_id' => $request->input('parcelle'),
            'unite_id' =>$unites_id,
            'caisse_net' => $request->input('caisse_net'),
            'poids_net' => $poids_net,
            'date_recolte' => $request->input('date_recolte'),
        ]);

        Dechet::where('harvest_id', $id)
        ->update([
            'caisse_dechet' => $request->input('caisse_dechet'),
            'poids_dechet' => $poids_dechet,
        ]);

        Export::where('harvest_id', $id)
        ->update([
            'client_id' => $request->input('client'),
            'caisse_com' => $request->input('caisse_com'),
            'poids_com' => $poids_com,
        ]);

        return redirect('/Recolte')->with('success', 'Mise à Jour Réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recoltes = Harvest::find($id);
        $recoltes->delete();

        return redirect('/Recolte')->with('success', 'Recolte est supprimé !');
    }
}
