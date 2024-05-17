<?php

namespace App\Http\Controllers;

use App\Models\Resultat;
use Illuminate\Http\Request;
use App\Models\groupe;
use App\Models\Module;
use App\Models\Matiere;
use App\Models\Attribution;
use Auth;
use App\Models\Serie;
use App\Models\Niveau;
use App\Models\Eleve;
use App\Models\Region;
use Illuminate\Support\Facades\DB;
use App\Imports\ResultatImport;
use Maatwebsite\Excel\Facades\Excel;

class ResultatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vv=module::all()->where('dimunitif','=','bacsn')->count();
        $matiere=Matiere::all();
        $modES=module::all()->where('dimunitif','=','bacsn')->first();
        $serie=Serie::all();
        $niveau=Niveau::all();
        $matiere_count=Matiere::all()->count();
        
        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();
        return view('Back.deliberation.index',compact('matiere','matiere_count','attribut','modES','vv','serie','niveau'));
    }



    public function indexSN($id)
    {
        $vv=module::all()->where('dimunitif','=','bacsn')->count();
        $matiere=Matiere::all();
        $modES=module::all()->where('dimunitif','=','bacsn')->first();
        $serie=Serie::all()->where('niveau_id',$id);
        $niveau=Niveau::all();
        $niveau2=Niveau::all()->where('niveau','BacSN')->first();
        $serie2=Serie::all()->where('Design','bac s')->first();
        $matiere_count=Matiere::all()->count();
        $resultat_count = DB::table('resultats')
        ->join('eleves', 'resultats.eleve_id', '=', 'eleves.id')
        ->select('eleves.*', 'resultats.note')
        ->where('eleves.niveau_id', $niveau2->id)
        ->count();
        $resultat = DB::table('resultats')
        ->join('eleves', 'resultats.eleve_id', '=', 'eleves.id')
        ->select('eleves.*', 'resultats.note')
        ->where('eleves.niveau_id', $niveau2->id)
        ->where('eleves.serie_id',$serie2->id)
        ->orderBy('resultats.note', 'asc')
        ->get();
    

      
        // return response()->json(['list_ticket' => $list_ticket,'titre'=>$titre,'vv'=>$vv,'modES'=>$modES]);
    
        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();
        return view('Back.deliberation.indexSN',compact('resultat','resultat_count','attribut','modES','vv','serie','niveau','serie2'));
    }


    public function import(Request $request) 
{
    // dd(request()->all());
    $import = new ResultatImport($request); // Passer l'objet Request lors de l'instanciation
    
    Excel::import(new ResultatImport($request), $request->file('file'));
    return back();
}


public function reinitialiserSN($id)
{
    $recupere_id_eleve=Eleve::all()->where('serie_id',$id);
    foreach($recupere_id_eleve as $recupere_id_eleves){
        $verifie_resulte_eleve_count=Resultat::all()->where('eleve_id',$recupere_id_eleves->id)->count();
        if($verifie_resulte_eleve_count!=0){
            $verifie_resulte_eleve=Resultat::all()->where('eleve_id',$recupere_id_eleves->id)->first();
            $delete_result_eleve=Resultat::findOrFail($verifie_resulte_eleve->id);
            $delete_result_eleve->delete();
        }

    }
    return BACK()->with('message',"La base de données est reinitiaiser");

    
}


public function getListe($id)
{

    $html=" ";
    $titre=" ";
// $rid = $request->post('rid');
// $countries= DB::table('countries')->where('region_id', $rid)->get();
// dd($countries);
$recup_titre_serie=Serie::all()->where('id',$id)->first();

$verifie_eleve_serie=Eleve::all()->where('serie_id',$id);
$recup_niveau=Niveau::all()->where('niveau','BacSN')->first();
$list_ticket= DB::table('resultats')
->join('eleves', 'resultats.eleve_id', '=', 'eleves.id')
->join('ecoles', 'eleves.ecole_id','=','ecoles.id')
->join('regions','ecoles.region_id','=','regions.id')
->select('eleves.*', 'resultats.note','ecoles.Nom_Ecole','regions.Nom_Region')
->where('eleves.niveau_id', $recup_niveau->id)
->where('eleves.serie_id',$id)
->orderBy('resultats.note', 'asc')
->get();

$titre="Liste des resultats de ".$recup_niveau->Design." de la serie". $recup_titre_serie->serie;
return response()->json(['list_ticket' => $list_ticket,'titre'=>$titre]);



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
     * @param  \App\Models\Resultat  $resultat
     * @return \Illuminate\Http\Response
     */
    public function show(Resultat $resultat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resultat  $resultat
     * @return \Illuminate\Http\Response
     */
    public function edit(Resultat $resultat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resultat  $resultat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resultat $resultat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resultat  $resultat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resultat $resultat)
    {
        //
    }
}
