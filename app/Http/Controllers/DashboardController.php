<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Parcel;
use App\Models\Client;
use App\Models\Export;
use App\Models\Dechet;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $title = "Green Harvest";
        $page = "Acceuil";
        $poids_com = Export::whereDay('created_at', date('d'))->sum('poids_com');
        $poids_dechet = Dechet::whereDay('created_at', date('d'))->sum('poids_dechet');
        $num_client = Client::whereYear('created_at', date('Y'))->count();
        $num_parcel = Parcel::count();

        $user_id = Auth::user()->id;
        $users = User::find($user_id);
        return view('pages.acceuil',[
            'title' => $title,
            'page' => $page,
            'users' => $users,
            'num_parcel' => $num_parcel,
            'num_client' => $num_client,
            'poids_com' => $poids_com,
            'poids_dechet' => $poids_dechet,
            'poids_dechet' => $poids_dechet,
        ]);
        
    }
}
