<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ChiffresController extends Controller
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
        $page= "Chiffre d'affaires";

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

        return view('pages.chiffre')
        ->with('title', $title)
        ->with('page', $page)
        ->with('exports', $exports)
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
        //
    }
}
