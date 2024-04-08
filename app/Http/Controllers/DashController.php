<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Harvest;
use App\Models\Parcel;
use App\Models\Client;
use App\Models\Export;
use App\Models\Dechet;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Green Harvest";
        $page = "Acceuil";

        // $recoltes = DB::table('harvests')
        // ->Join('exports', 'exports.harvest_id', '=', 'harvests.id')
        // ->Join('dechets', 'dechets.harvest_id', '=', 'harvests.id')
        // ->select('harvests.*', 'dechets.poids_dechet', 'exports.poids_com')
        // ->orderBy('harvests.jour_recolte', 'ASC')
        // ->get();

        // $poids_com = Export::sum('poids_com')->where('created_at = ?', Carbon::today());
        $poids_com = Export::whereDay('created_at', date('d'))->sum('poids_com');
        $poids_dechet = Dechet::whereDay('created_at', date('d'))->sum('poids_dechet');
        $num_client = Client::whereYear('created_at', date('Y'))->count();
        $num_parcel = Parcel::count();

        return view('pages.acceuil',[
            'title' => $title,
            'page' => $page,
            'num_parcel' => $num_parcel,
            'num_client' => $num_client,
            'poids_com' => $poids_com,
            'poids_dechet' => $poids_dechet,
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
