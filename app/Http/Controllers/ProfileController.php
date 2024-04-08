<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Green Harvest";
        $page = "Profile";
        $user_id = Auth::user()->id;
        $users = User::find($user_id);
        // ->Join('roles', 'users.role_id');

        return view('pages.profile',[
            'title' => $title,
            'page' => $page,
            'users' => $users,
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
        User::find($id);
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
            'email' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
        ]);

        $old_password = User::where('id', $id)->value('password');
        if(!empty($request->input('old_password'))) {
            if(Hash::check($request->input('old_password'), $old_password) && ($request->input('password') == $request->input('confirm_password'))){
                User::where('id', $id)->update([
                    'nom' => $request->input('nom'),
                    'prenom' =>$request->input('prenom'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'telephone' =>$request->input('telephone'),
                    'ville' => $request->input('ville'),
                    'adresse' =>$request->input('adresse'),
                    'pays' => $request->input('pays'),
                    'prenom' =>$request->input('prenom'),
                ]);
                return redirect('/Profile')->with('success', 'Updated Successfully !');
            }else{
                return redirect('/Profile')->with('warning', 'Try again !');
            }
        }else{
            User::where('id', $id)->update([
                'nom' => $request->input('nom'),
                'prenom' =>$request->input('prenom'),
                'email' => $request->input('email'),
                'telephone' =>$request->input('telephone'),
                'ville' => $request->input('ville'),
                'adresse' =>$request->input('adresse'),
                'pays' => $request->input('pays'),
                'prenom' =>$request->input('prenom'),
            ]);
            return redirect('/Profile')->with('success', 'Updated Successfully !');
        }

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
