<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tache=Tache::all();
        $mod=Module::all();
        $tache_count=Tache::all()->count();
        return view('Back.Tache.index',compact('tache','tache_count','mod'));
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

            'tache'=>'required|string',

    ]);


    $verifie = Tache::where([
        'tache' => $request->tache,
        'module_id' => $request->module_id
    ])->count();

    if($verifie==0){
    $verifie1=Module::all()->where('id','=',$request->module_id)->first();

    $save= new Tache;
    $save->module_id =$request->module_id;
    $save->tache=$request->tache;
    $save->url=$verifie1->dimunitif.".".$request->url;
    $save->etat=0;


    $save->save();
    return BACK()->with('message',"Tâche enregistre !");
    }else{

        return BACK()->with('error',"tâche deja existe");
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voirs=Tache::All()->where('id','=',$id)->first();
        return  response()->json($voirs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function edit(Tache $tache)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateDate=$request->validate([

            'tache'=>'required|string',

    ]);

    $save= Tache::find($request->id);
    $save->tache=$request->tache;

    $save->update();
    return BACK()->with('message',"Modification reussi !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $clients=Tache::findOrFail($request->id_f);
        $clients->delete();
        return BACK()->with('message',"Suppression reussi Avec Success");
    }

    public function state(Request $request,$id)
    {
        $mod=Tache::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="Tâche Activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="Tâche Desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
