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

class ExportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $users = User::find($user_id);
        $title="Green Harvest";
        $page= "Export";
        $clients = Client::where('type', 'Société')->get();
        $exports = DB::table('exports')
        ->Join('harvests', 'harvests.id', '=', 'exports.harvest_id')
        ->Join('parcels', 'parcels.id', '=', 'harvests.parcel_id')
        ->Join('serres', 'serres.id', '=', 'parcels.serre_id')
        ->Join('cultures', 'cultures.id', '=', 'parcels.culture_id')
        ->Join('varietes', 'varietes.id', '=', 'cultures.variete_id')
        ->Join('clients', 'clients.id', '=', 'exports.client_id')
        ->select('exports.*', 'harvests.date_recolte', 'serres.serre', 'cultures.culture', 'varietes.variete', 'clients.nom')
        ->distinct()
        ->orderBy('date_recolte', 'DESC')
        ->orderBy('serre', 'DESC')
        ->get();

        return view('pages.export')
        ->with('title',$title)
        ->with('page',$page)
        ->with('clients',$clients)
        ->with('users' ,$users)
        ->with('exports',$exports);
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
        //
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
        $edit = Export::find($id);
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
            'poids_export_com' => 'required',
            'poids_export_net' => 'required',
            // 'prix' => 'required',
            // 'prix_total' => 'required',
            'client' => 'required',
        ]);
        // $prix = (float)($request->input('prix'));
        $poids_export = (float)($request->input('poids_export'));
        // $prix_total = (float)($prix * $poids_export);

        $exports = Export::find($id);
        $exports->client_id = $request->input('client');
        $exports->poids_com = $request->input('poids_export_com');
        $exports->poids_net = $request->input('poids_export_net');
        // $exports->prix = $prix;
        // $exports->prix_total = $request->input('prix_total');
        $exports->update();


        return redirect('/Export')->with('success', 'Modification Réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $exports = Export::find($id);
        // $exports->delete();

        // return redirect('/Export')->with('success', 'L\'export est supprimée');
    }
}
