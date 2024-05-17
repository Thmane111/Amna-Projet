<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use App\Models\groupe;
use App\Models\Module;
use App\Models\Attribution;
use Auth;
use App\Models\Niveau;
use App\Models\Region;
use App\Models\SerieRegion;
use App\Imports\SerieRegionImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $vv=module::all()->where('dimunitif','=','serie')->count();
        $serie=SerieRegion::all();
        $serie1=Serie::all();
        $modES=module::all()->where('dimunitif','=','serie')->first();
        $niveau=Niveau::all(); 
        $region=Region::all();
        $serie_count=Serie::all()->count();
        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();
        return view('Back.serie.index2',compact('serie','serie_count','attribut','modES','vv','niveau','region','serie1'));
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
            'serie'=>'required|string',
          
            'caption'=>'required|string',


    ]);


    $save= new Serie;
    $save->matricule ="123";
    $save->serie=$request->serie;
    $save->Design=$request->caption;
    $save->niveau_id=$request->niveau_id;
  


   
    $save->etat=0;

    $save->save();
    return BACK()->with('message',"Serie enregistre !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function show(Serie $serie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modif=Serie::findOrFail($id);
        return view('Back.serie.edit',compact('modif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateDate=$request->validate([
            'serie'=>'required|string',
            'detail'=>'required|string',


    ]);


    $save= Serie::find($id);
    $save->serie =$request->serie;
    $save->niveau_id=$request->niveau_id;
    if($request->Description==null){
        $save->Description=$request->detail2;
    }else{
        $save->Description=$request->detail;
    }



    $save->update();
    return BACK()->with('message',"Modification reussi !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $des=Serie::findOrFail($request->id_f);
        $des->delete();
            return BACK()->with("message","Suppression reussi");
    }


    public function state(Request $request,$id)
    {
        $mod=Serie::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="serie activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="serie desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }



    public function import(Request $request) 
    {
        // dd(request()->all());
        $import = new SerieRegionImport($request); // Passer l'objet Request lors de l'instanciation
        
        Excel::import(new SerieRegionImport($request), $request->file('file'));
        return back();
    }
}
