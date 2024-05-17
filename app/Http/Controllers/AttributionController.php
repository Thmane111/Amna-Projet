<?php

namespace App\Http\Controllers;

use App\Models\Attribution;
use App\Models\groupe;
use App\Models\Admin;
use App\Models\Module;
use Illuminate\Http\Request;

class AttributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attribut=Attribution::all();
        $vv=module::all()->where('dimunitif','=','Attribution')->count();
        $modES=module::all()->where('dimunitif','=','Attribution')->first();
        $groupe=groupe::all()->where('etat','=',1);
        $attribut_count=Attribution::all()->count();
        $user=Admin::all();
        return view('Back.Attribution.index',compact('attribut','groupe','user','attribut_count','vv','modES'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Back.Attribution.add',compact('groupe','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $verifie=Attribution::all()->where('admin_id','=',$request->user_id)
        ->where('groupe_id','=',$request->groupe_id)->count();

        if($verifie==0){


        if($request->user_id==0){
            return BACK()->with('error',"Veuillez choisir un utilisateur");
        }elseif($request->groupe_id==0){
            return BACK()->with('error',"Veuillez choisir un groupe !");
        }else{
        $save= new Attribution;
        $save->admins_id=$request->user_id;
        $save->groupe_id=$request->groupe_id;
        $save->deletable=0;
        $save->etat=0;

        $save->save();
        return BACK()->with('message',"Acces enregistre !");
        }
    }else{
        return BACK()->with('error',"Cette attribution existe deja");
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribution  $attribution
     * @return \Illuminate\Http\Response
     */
    public function show(Attribution $attribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribution  $attribution
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribution $attribution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribution  $attribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if($request->user_id==0){
            return BACK()->with('error',"Veuillez choisir un utilisateur");
        }elseif($request->groupe_id==0){
            return BACK()->with('error',"Veuillez choisir un groupe !");
        }else{
        $save= Attribution::find($id);
        $save->admin_id=$request->user_id;
        $save->groupe_id=$request->groupe_id;

        $save->update();
        return BACK()->with('message',"Modification reussi !");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribution  $attribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $clients=Attribution::findOrFail($request->id_f);
        $clients->delete();
            return BACK()->with("message","Suppression reussi Avec Success");
    }


    public function state(Request $request,$id)
    {
        $mod=Attribution::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="Attribution Activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="Attribution Desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
