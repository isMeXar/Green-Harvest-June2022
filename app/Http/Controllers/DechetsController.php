<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Client;
use App\Models\Dechet;

class DechetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="Green Harvest";
        $page= "Dechet";
        $user_id = Auth::user()->id;
        $users = User::find($user_id);
        $clients = Client::where('type', 'Marché Local')->get();
        $dechets = DB::table('dechets')
        ->Join('harvests', 'harvests.id', '=', 'dechets.harvest_id')
        ->Join('parcels', 'parcels.id', '=', 'harvests.parcel_id')
        ->Join('serres', 'serres.id', '=', 'parcels.serre_id')
        ->Join('cultures', 'cultures.id', '=', 'parcels.culture_id')
        ->Join('varietes', 'varietes.id', '=', 'cultures.variete_id')
        ->leftJoin('clients', 'clients.id', '=', 'dechets.client_id')
        ->select('dechets.*', 'harvests.date_recolte','serres.serre', 'cultures.culture', 'varietes.variete', 'clients.nom')
        ->distinct()
        ->orderBy('date_recolte', 'DESC')
        ->orderBy('serre', 'DESC')
        ->get();

        return view('pages.dechet')
        ->with('title',$title)
        ->with('page',$page)
        ->with('clients',$clients)
        ->with('users' ,$users)
        ->with('dechets',$dechets);
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
        $edit = Dechet::find($id);
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
            'poids_dechet' => 'required',
            'prix' => 'required',
            'client' => 'required',
            'prix_total' => 'required',
        ]);
        $prix = (float)($request->input('prix'));
        $poids_dechet = (float)($request->input('poids_dechet'));
        $prix_total = (float)($prix * $poids_dechet);

        $dechets = Dechet::find($id);
        $dechets->client_id = $request->input('client');
        $dechets->poids_dechet = $request->input('poids_dechet');
        $dechets->prix = $prix;
        $dechets->prix_total = $prix_total;
        $dechets->update();


        return redirect('/Dechet')->with('success', 'Mise à Jour Réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $dechets = Dechet::find($id);
        // $dechets->delete();

        // return redirect('/Dechet')->with('success', 'Dechet est supprimé !');
    }
}
