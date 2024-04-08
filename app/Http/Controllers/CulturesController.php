<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Culture;
use App\Models\Variete;
use App\Models\Porte_greffe;


class CulturesController extends Controller
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

        $title = "Green Harvest";
        $page = "Culture";
        $varietes = Variete::all();
        $porte_greffes = Porte_greffe::all();

        $cultures = DB::table('cultures')
            ->Join('varietes', 'varietes.id', '=', 'cultures.variete_id')
            ->Join('porte_greffes', 'porte_greffes.id', '=', 'cultures.porte_greffe_id')
            ->select('cultures.*', 'varietes.variete', 'porte_greffes.porte_greffe')
            ->distinct()
            ->orderBy('varietes.variete', 'ASC')
            ->orderBy('cultures.culture', 'ASC')
            ->get();

        return view('pages.culture', [
            'title' => $title,
            'page' => $page,
            'varietes' => $varietes,
            'cultures' => $cultures,
            'users' => $users,
            'porte_greffes' => $porte_greffes,
        ]);
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
            'variete' => 'required',
            'porte_greffe' => 'required',
            'culture' => 'required',
        ]);


        $porte_greffes = Porte_greffe::firstOrCreate(['porte_greffe' => $request->input('porte_greffe')]);
        $porte_greffe_id = $porte_greffes->id;


        $varietes = Variete::firstOrCreate(['variete' => $request->input('variete')]);
        $variete_id = $varietes->id;

        if (!(Culture::where('culture', $request->input('culture'))->first())) {
            Culture::firstOrCreate(['porte_greffe_id' => $porte_greffe_id, 'variete_id' => $variete_id, 'culture' => $request->input('culture')]);

            return redirect('/Culture')->with('success', 'Ajouté Avec Succès');
        } else {
            return redirect('/Culture')->with('warning', 'Existe Déjà !');
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
        $edit = Culture::find($id);
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
            'culture' => 'required',
            'variete' => 'required',
            'porte_greffe' => 'required',
        ]);

        // $porte_greffes = Porte_greffe::where('porte_greffe', $request->input('porte_greffe'))->first();
        // $porte_greffe_id = $porte_greffes->id;

        // $varietes = Variete::where('variete', $request->input('variete'))->first();
        // $variete_id = $varietes->id;

        $cultures = Culture::find($id);
        $cultures->porte_greffe_id = $request->input('porte_greffe');
        $cultures->variete_id = $request->input('variete');
        $cultures->culture = $request->input('culture');
        $cultures->update();

        return redirect('/Culture')->with('success', 'Modification Réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cultures = Culture::find($id);
        $cultures->delete();
        return redirect('/Culture')->with('success', 'La culture est supprimée');
    }
}
