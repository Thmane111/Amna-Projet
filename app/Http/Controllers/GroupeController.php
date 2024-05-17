<?php

namespace App\Http\Controllers;

use App\Models\groupe;
use App\Models\Module;
use App\Models\Attribution;
use Auth;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vv=module::all()->where('dimunitif','=','groupe')->first();
        $groupe=groupe::all();
        $modES=module::all()->where('dimunitif','=','groupe')->first();
        $groupe_count=groupe::all()->count();
        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();
        return view('Espace-Admin.groupe.index',compact('groupe','groupe_count','attribut','modES','vv'));
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
            'nom_groupe'=>'required|string',
            'caption'=>'required|string',


    ]);


    $save= new groupe;
    $save->nom_groupe =$request->nom_groupe;
    $save->caption=$request->caption;
    if($request->detail==null){
        $save->detail=" ";
    }else{
        $save->detail=$request->detail;
    }

    $save->deletable=0;
    $save->etat=0;

    $save->save();
    return BACK()->with('message',"Groupe enregistre !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function show(groupe $groupe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modif=groupe::findOrFail($id);
        return view('Espace-Admin.groupe.edit',compact('modif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateDate=$request->validate([
            'nom_groupe'=>'required|string',
            'caption'=>'required|string',


    ]);


    $save= groupe::find($id);
    $save->nom_groupe =$request->nom_groupe;
    $save->caption =$request->caption;
    if($request->detail==null){
        $save->detail=$request->detail2;
    }else{
        $save->detail=$request->detail;
    }

    $save->deletable=0;
    $save->etat=0;

    $save->save();
    return BACK()->with('message',"Modification reussi !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $des=groupe::findOrFail($request->id_f);
        $des->delete();
            return BACK()->with("message","Suppression reussi");
    }


    public function state(Request $request,$id)
    {
        $mod=groupe::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="groupe activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="groupe desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
