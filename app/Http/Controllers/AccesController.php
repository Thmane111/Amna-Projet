<?php

namespace App\Http\Controllers;

use App\Models\Acces;
use App\Models\module;
use App\Models\groupe;
use Illuminate\Http\Request;

class AccesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mod=module::all()->where('etat','=',1);
        $vv=module::all()->where('dimunitif','=','acces')->count();
        $modES=module::all()->where('dimunitif','=','acces')->first();
        $groupe=groupe::all()->where('etat','=',1);
        $acces=acces::all();
        $acces_count=acces::all()->count();
        return view('Back.acces.index',compact('mod','groupe','acces','acces_count','vv','modES'));
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
        $verifie=Acces::all()->where('module_id','=',$request->module_id)
        ->where('groupe_id','=',$request->groupe_id)->count();

        if($verifie==0)
        {

            if($request->module_id==0){
                return BACK()->with('error',"veuillez renseigner le module !");
            }elseif($request->groupe_id==0){
                return BACK()->with('error',"veuillez renseigner le groupe !");
            }else{


    $save= new acces;
    $save->groupe_id=$request->groupe_id;
    $save->module_id=$request->module_id;
    $save->deletable=0;

    $save->etat=0;

    $save->save();
    return BACK()->with('message',"Acces enregistre !");
            }
        }else{
            return BACK()->with('error',"Acces existe deja !");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Acces  $acces
     * @return \Illuminate\Http\Response
     */
    public function show(Acces $acces)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Acces  $acces
     * @return \Illuminate\Http\Response
     */
    public function edit(Acces $acces)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Acces  $acces
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if($request->module_id==0){
            return BACK()->with('error',"Veuillez choisir un module");
        }elseif($request->groupe_id==0){
            return BACK()->with('error',"Veuillez choisir un groupe !");
        }else{
        $save= Acces::find($id);
        $save->module_id_id=$request->module_id;
        $save->groupe_id=$request->groupe_id;

        $save->update();
        return BACK()->with('message',"Modification reussi !");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acces  $acces
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $clients=Acces::findOrFail($request->id_f);
        $clients->delete();
            return BACK()->with("message","Suppression reussi Avec Success");

    }

    public function state(Request $request,$id)
    {
        $mod=Acces::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="Acces Activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="Acces Desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
