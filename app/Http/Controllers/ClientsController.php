<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Client;

use function Ramsey\Uuid\v1;

class ClientsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Green Solution";
        $page = "Client";
        $clients = Client::all();

        $user_id = Auth::user()->id;
        $users = User::find($user_id);

        return view('pages.client')->with('title', $title)
            ->with('page', $page)
            ->with('clients', $clients)
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
            'nom' => 'required',
            'code_externe' => 'required',
            'email' => 'nullable|email',
            'type_list' => 'required',
            'telephone' => 'required|regex:/(0)[6-7][0-9]{8}/',
            'gsm' => 'nullable|regex:/(0)[5-7][0-9]{8}/',
            'fax' => 'nullable|regex:/(05)[0-9]{8}/',
            'ville' => 'required',
            'adresse' => 'required',
            'type_list' => 'required',
        ]);

        if (Client::where('code_externe', $request->input('code_externe'))->first() || Client::where('nom', $request->input('nom'))->first()) {
            return redirect('/Client')->with('warning', 'Already Exists');
        } else {
            Client::firstOrCreate([
                'nom' => $request->input('nom'),
                'adresse' => $request->input('adresse'),
                'ville' => $request->input('ville'),
                'pays' => $request->input('pays'),
                'telephone' => $request->input('telephone'),
                'gsm' => $request->input('gsm'),
                'fax' => $request->input('fax'),
                'email' => $request->input('email'),
                'ice' => $request->input('ice'),
                'if' => $request->input('if'),
                'code_externe' => $request->input('code_externe'),
                'observation' => $request->input('observation'),
                'type' => $request->get('type_list'),
            ]);


            return redirect('/Client')->with('success', 'Ajouté avec Succès !');
        }
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
        $edit = Client::find($id);
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
            'nom' => 'required',
            'code_externe' => 'required',
            'email' => 'nullable|email',
            'type_list' => 'required',
            'telephone' => 'required|regex:/(0)[6-7][0-9]{8}/',
            'gsm' => 'nullable|regex:/(0)[5-7][0-9]{8}/',
            'fax' => 'nullable|regex:/(05)[0-9]{8}/',
            'ville' => 'required',
            'adresse' => 'required',
        ]);

        $client = Client::find($id);
        $client->nom = $request->input('nom');
        $client->adresse = $request->input('adresse');
        $client->ville = $request->input('ville');
        $client->pays = $request->input('pays');
        $client->telephone = $request->input('telephone');
        $client->gsm = $request->input('gsm');
        $client->fax = $request->input('fax');
        $client->email = $request->input('email');
        $client->ice = $request->input('ice');
        $client->if = $request->input('if');
        $client->code_externe = $request->input('code_externe');
        $client->observation = $request->input('observation');
        $client->type = $request->get('type_list');
        $client->update();

        return redirect('/Client')->with('success', 'Mise à Jour Réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect('/Client')->with('success', 'Client est Supprimé');
    }
}
