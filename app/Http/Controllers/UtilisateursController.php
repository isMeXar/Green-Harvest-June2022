<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Role;
use App\Models\Utilisateur;

class UtilisateursController extends Controller
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
        $title = "Green Harvest";
        $page = "Utilisateurs";

        $roles = Role::all();

        $users = DB::table('utilisateurs')
            ->join('roles', 'roles.id', "=", 'utilisateurs.role_id')
            ->select('utilisateurs.*', 'roles.role')
            ->where("role_id", "!=", "1")
            ->get();

        return view('pages.utilisateur', [
            'title' => $title,
            'page' => $page,
            'roles' => $roles,
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('add_role')) {

            $this->validate($request, [
                'role' => 'required',
            ]);

            $roles = Role::updateOrCreate([
                'role' => $request->input('role'),
                'afficher_statistics' => $request->input('home_statistics'),
                'gerer_parcelle' => $request->input('isparcelle'),
                'gerer_produit' => $request->input('isproduit'),
                'gerer_client' => $request->input('isclient'),
                'ajouter_recolte' => $request->input('isadd_recolte'),
                'modifier_recolte' => $request->input('isedit_recolte'),
                'supprimer_recolte' => $request->input('isdelete_recolte'),
                'gerer_export' => $request->input('isprofile'),
                'gerer_dechet' => $request->input('isadd_user'),
                'gerer_profile' => $request->input('isedit_user'),
                'ajouter_utilisateur' => $request->input('isdelete_user'),
                'modifier_utilisateur' => $request->input('isadd_role'),
                'supprimer_utilisateur' => $request->input('isexport'),
                'gerer_role' => $request->input('isdechet'),
            ]);

            return redirect('/Utilisateur/create')->with('success', 'Role Added Successfully');
        }
        if ($request->has('add_user')) {

            $this->validate($request, [
                'select_role' => 'required',
                'nom' => 'required',
                'prenom' => 'required',
                'telephone' => 'required',
                'email' => 'required|email|unique:utilisateurs',
                // 'password' => 'required',
            ]);

            
            // do{
            //     $hashed_random_password = Hash::make(Str::random(8));
            // }while(Utilisateur::where('password', $hashed_random_password)->exists());
            $hashed_random_password = Str::random(8);

            Utilisateur::firstOrCreate([
                'role_id' => $request->input('select_role'),
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'telephone' => $request->input('telephone'),
                'pays' => $request->input('pays'),
                'ville' => $request->input('ville'),
                'adresse' => $request->input('adresse'),
                'code_postal' => $request->input('isdelete_recolte'),
                'email' => $request->input('email'),
                'password' => $hashed_random_password,
            ]);

            return redirect('/Utilisateur/create')->with('success', 'User Added Successfully');
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
        $edit = Utilisateur::find($id);
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
        $users = Utilisateur::find($id);
        $users->delete();

        return redirect('/Utilisateur/create')->with('success', 'Utilisateur is supprimé');
    }
}
