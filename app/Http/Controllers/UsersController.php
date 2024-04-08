<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Role;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Green Harvest";
        $page = "Utilisateurs";

        $roles = Role::all();

        $user_id = Auth::user()->id;
        $users = User::find($user_id);

        $user_tbl = DB::table('users')
            ->join('roles', 'roles.id', "=", 'users.role_id')
            ->select('users.*', 'roles.role')
            // ->where("role_id", "!=", "1")
            ->get();

        return view('pages.utilisateur', [
            'title' => $title,
            'page' => $page,
            'roles' => $roles,
            'users' => $users,
            'user_tbl' => $user_tbl,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
                'gerer_export' => $request->input('isexport'),
                'gerer_dechet' => $request->input('isdechet'),
                'gerer_profile' => $request->input('isprofile'),
                'ajouter_utilisateur' => $request->input('isadd_user'),
                'modifier_utilisateur' => $request->input('isedit_user'),
                'supprimer_utilisateur' => $request->input('isdelete_user'),
                'gerer_role' => $request->input('isadd_role'),
            ]);

            return redirect('/Utilisateur')->with('success', 'Role Added Successfully');
        }
        if ($request->has('add_user')) {

            $this->validate($request, [
                'select_role' => 'required',
                'nom' => 'required',
                'prenom' => 'required',
                'telephone' => 'required',
                'email' => 'required|email|unique:users',
                // 'password' => 'required',
            ]);

            // $hashed_random_password = Hash::make($request->input('password'));

            User::firstOrCreate([
                'role_id' => $request->input('select_role'),
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'telephone' => $request->input('telephone'),
                'pays' => $request->input('pays'),
                'ville' => $request->input('ville'),
                'adresse' => $request->input('adresse'),
                'code_postal' => $request->input('code_postal'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            return redirect('/Utilisateur')->with('success', 'User Added Successfully');
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
        $edit = User::find($id);
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
            'select_role' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            // 'password' => 'required',
        ]);

        $users = User::find($id);
        $users->role_id = $request->input('select_role');
        $users->nom = $request->input('nom');
        $users->prenom = $request->input('prenom');
        $users->telephone = $request->input('telephone');
        $users->pays = $request->input('pays');
        $users->ville = $request->input('ville');
        $users->adresse = $request->input('adresse');
        $users->code_postal = $request->input('code_postal');
        $users->email = $request->input('email');
        $users->update();

        return redirect('/Utilisateur')->with('success', 'User Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();

        return redirect('/Utilisateur')->with('success', 'Utilisateur is supprimé');
    }
}
