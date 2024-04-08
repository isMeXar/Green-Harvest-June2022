<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Porte_greffe;
use App\Models\Culture;
use App\Models\Variete;
use App\Models\Produit;
use App\Models\Client;
use App\Models\Domaine;
use App\Models\Ferme;
use App\Models\Parcelle;


class PagesController extends Controller
{
    public function account(){
        $title="Green Harvest";
        $page= "Login";
        return view('auth layout.connect')->with('title',$title)->with('page',$page);
    }
    public function forgotpassword(){
        $title="Green Harvest";
        $page= "Mot de passe oublié";
        return view('auth layout.forgotpassword')->with('title',$title)->with('page',$page);
    }

    public function index(){
        $title="Green Harvest";
        $page= "Acceuil";

        $recoltes = DB::table('harvests')
        ->Join('exports', 'exports.harvest_id', '=', 'harvests.id')
        ->Join('dechets', 'dechets.harvest_id', '=', 'harvests.id')
        ->select('harvests.*', 'dechets.poids_dechet', 'exports.poids_com')
        ->orderBy('harvests.jour_recolte', 'ASC')
        ->get();

        return view('layout',[
            'title' => $title,
            'page' => $page,
            'recoltes' => $recoltes
        ]);
    }

    public function Facturation(){
        $title="Green Harvest";
        $page= "Facturation";
        return view('layout')->with('title',$title)->with('page',$page);
    }
    public function cda(){
        $title="Green Harvest";
        $page= "Chiffre d'affaires";
        return view('layout')->with('title',$title)->with('page',$page);
    }
    
    public function Profile(){
        $title="Green Harvest";
        $page= "Profile";
        return view('pages.profile')->with('title',$title)->with('page',$page);
    }
    public function Utilisateurs(){
        $title="Green Harvest";
        $page= "Utilisateurs";
        return view('layout')->with('title',$title)->with('page',$page);
    }
}
