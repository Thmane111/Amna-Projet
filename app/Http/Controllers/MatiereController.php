<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Models\groupe;
use App\Models\Module;
use App\Models\Attribution;
use Auth;
use App\Models\Serie;
use App\Models\Niveau;
use Illuminate\Support\Facades\DB;
use App\Imports\MatiereImport;
use Maatwebsite\Excel\Facades\Excel;
class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vv=module::all()->where('dimunitif','=','matiere')->count();
        $matiere=Matiere::all();
        $modES=module::all()->where('dimunitif','=','matiere')->first();
        $serie=Serie::all();
        $niveau=Niveau::all();
        $matiere_count=Matiere::all()->count();
        
        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();
        return view('Back.matiere.index',compact('matiere','matiere_count','attribut','modES','vv','serie','niveau'));
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
        $validateDate=$request->validate([
            'matiere'=>'required|string',
            'coeff'=>'required|string',
            


    ]);


    $save= new Matiere;
  
    $save->Nom_Matiere=$request->matiere;
    $save->Coefficient=$request->coeff;
    $save->serie_id=$request->serie_id;
 

   
    $save->etat=0;

    $save->save();
    return BACK()->with('message',"Serie enregistre !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function show(Matiere $matiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Matiere $matiere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matiere $matiere)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matiere $matiere)
    {
        //
    }


    public function getMatiere($id)
{
    $titre=Serie::all()->where('id',$id)->first();







    $vv=module::all()->where('dimunitif','=','matiere')->count();
    $matiere=Matiere::all();
    $modES=module::all()->where('dimunitif','=','matiere')->first();
    $serie=Serie::all();
    $niveau=Niveau::all();
    $matiere_count=Matiere::all()->count();
    
    $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();

    // $vq_event=Event::all()->where('user_id',Auth::user()->id)->first();
    $list_ticket = DB::table('matieres')
    ->join('series', 'matieres.serie_id', '=', 'series.id')
    ->select('matieres.*', 'series.serie')
    ->where('matieres.serie_id', $id)
    ->get();

        // $list_ticket=Eleve::all();
        return response()->json(['list_ticket' => $list_ticket,'titre'=>$titre,'vv'=>$vv,'modES'=>$modES]);

}

public function import(Request $request) 
{
    // dd(request()->all());
    $import = new MatiereImport($request); // Passer l'objet Request lors de l'instanciation
    
    Excel::import(new MatiereImport($request), $request->file('file'));
    return back();
}
}
