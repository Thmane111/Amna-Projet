<?php

namespace App\Http\Controllers;

use App\Models\sous_categorie;
use App\Models\categorie;
use Illuminate\Http\Request;

class Sous_CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sous_cat=sous_categorie::all();
        $cat=categorie::all()->where('etat','=',1);
        $sous_cat_count=sous_categorie::all()->count();
        return view('Espace-Admin.module-market-place.type-categorie.index',compact('sous_cat','sous_cat_count','cat'));
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
            'sous_cat'=>'required|string',

            'categorie'=>'required|string',

    ]);
     $verifie=sous_categorie::all()->where('nom_type','=',$request->sous_cat)->count();

     if($verifie==0){
    $save= new sous_categorie;
    $save->nom_type =$request->sous_cat;
    $save->categorie_id=$request->categorie;
    $save->deletable=0;
    $save->etat=0;

    $save->save();
    return BACK()->with('message',"enregistre reussi!");
}else{
    return BACK()->with('error',"type catégorie existe deja");
}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sous_categorie  $sous_categorie
     * @return \Illuminate\Http\Response
     */
    public function show(sous_categorie $sous_categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sous_categorie  $sous_categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(sous_categorie $sous_categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sous_categorie  $sous_categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validateDate=$request->validate([
            'sous_cat'=>'required|string',


    ]);
     $verifie=sous_categorie::all()->where('nom_type','=',$request->sous_cat)
     ->where('id','!=',$request->id)
     ->count();

     if($verifie==0){
        $save=sous_categorie::find($request->id);
    $save->nom_type =$request->sous_cat;
    if($request->categorie==0){
        $save->categorie_id=$request->categorie2;
    }else{
        $save->categorie_id=$request->categorie;
    }



    $save->update();
    return BACK()->with('message',"enregistre reussi!");
}else{
    return BACK()->with('error',"type catégorie existe deja");
}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sous_categorie  $sous_categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $cat_del=sous_categorie::findOrFail($request->id);
        $cat_del->delete();
            return BACK()->with("message","Suppression reussi Avec Success");
    }

    public function state(Request $request,$id)
    {
        $mod=sous_categorie::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="type de categorie activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="type de categorie desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
