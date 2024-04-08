<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Produit;
use App\Models\Culture;
use App\Models\Variete;
use App\Models\Porte_greffe;

class ProduitsController extends Controller
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
        $page = "Produit";
        $cultures = Culture::all();
        $varietes = Variete::all();
        $porte_greffes = Porte_greffe::all();

        $produits = DB::table('produits')
            ->Join('varietes', 'varietes.id', '=', 'produits.variete_id')
            ->Join('cultures', 'cultures.id', '=', 'produits.culture_id')
            ->Join('porte_greffes', 'porte_greffes.id', '=', 'cultures.porte_greffe_id')
            ->select('produits.*', 'varietes.variete', 'cultures.culture', 'porte_greffes.porte_greffe')
            ->distinct()
            ->orderBy('cultures.culture', 'ASC')
            ->get();

        return view('pages.produit', [
            'title' => $title,
            'page' => $page,
            'produits' => $produits,
            'varietes' => $varietes,
            'cultures' => $cultures,
            'users' => $users,
            'porte_greffes' => $porte_greffes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
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
            'select_culture' => 'required',
            'select_variete' => 'required',
            'porte_greffe' => 'required',
            'produit' => 'required',
        ]);


        $porte_greffes = Porte_greffe::firstOrCreate(['porte_greffe' => $request->input('porte_greffe')]);
        $porte_greffe_id = $porte_greffes->id;


        $culture = Culture::firstOrCreate(['porte_greffe_id' => $porte_greffe_id, 'culture' => $request->input('select_culture')]);
        $culture_id = $culture->id;

        $varietes = Variete::firstOrCreate(['variete' => $request->input('select_variete')]);
        $variete_id = $varietes->id;

        if (!(Produit::where('produit', $request->input('produit'))->first())) {
            Produit::firstOrCreate(['culture_id' => $culture_id, 'variete_id' => $variete_id, 'produit' => $request->input('produit')]);

            return redirect('/Produit')->with('success', 'Added Successfully');
        } else {
            return redirect('/Produit')->with('warning', 'Exists Already');
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
        $edit = Produit::find($id);
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
            'produit' => 'required',
            'variete_select' => 'required',
            'culture_select' => 'required',
        ]);

        $cultures = Culture::where('culture', $request->input('culture_select'))->first();
        $culture_id = $cultures->id;
        $varietes = Variete::where('variete', $request->input('variete_select'))->first();
        $variete_id = $varietes->id;

        $produit = Produit::find($id);
        $produit->culture_id = $culture_id;
        $produit->variete_id = $variete_id;
        $produit->produit = $request->input('produit');
        $produit->update();

        return redirect('/Produit')->with('success', 'Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit = Produit::find($id);
        $produit->delete();
        return redirect('/Produit')->with('success', 'Product is Deleted');
    }
}
