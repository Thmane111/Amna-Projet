<?php

namespace App\Http\Controllers;

use App\Models\navigation;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Icon;
use App\Models\Attribution;
use Auth;
class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vv=module::all()->where('dimunitif','=','navigation')->first();
        $mod_count=module::all()->where('dimunitif','=','navigation')->count();
        $mod=module::all()->where('etat','=',1);
        $navigation=navigation::all();
        $icon=Icon::all();
        $modES=module::all()->where('dimunitif','=','navigation')->first();
        $navigation_count=navigation::all()->count();
        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();
        return view('Back.navigation.index',compact('navigation','icon','navigation_count','attribut','modES','vv','mod','mod_count'));
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
            'navigation'=>'required|string'
    ]);

    $verifie=navigation::all()->where('navigation','=',$request->navigation)->count();

    if($verifie==0){
        $save= new navigation;
        $save->navigue=$request->navigation;
        if($request->icon==0){
            $save->icon_id =0;
        }else{
            $save->icon_id =$request->icon;
        }

        $save->deletable=0;
        $save->etat=1;


        $save->save();

        return BACK()->with('message',"Module enregistre !");
    }else{

        return BACK()->with('error',"dropwon existe deja !");
       }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function show(navigation $navigation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function edit(navigation $navigation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validateDate=$request->validate([
            'navigation'=>'required|string'
    ]);

    $verifie=navigation::all()->where('navigue','=',$request->navigation)
    ->where('id','!=',$id)
    ->count();

    if($verifie==0){
        $save= navigation::find($id);
        $save->navigue =$request->navigation;
        if($request->icon==0){
            $save->icon_id =$request->icon2;
        }else{
            $save->icon_id =$request->icon;
        }
        $save->update();
        return BACK()->with('message',"Modification reussi!");
    }else{

        return BACK()->with('error',"dropwon existe deja !");
       }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request,$id)
    {
        $clients=navigation::findOrFail($request->id_f);
        $clients->delete();
        return BACK()->with('message',"Suppression reussi Avec Success");
    }


    public function state(Request $request,$id)
    {
        $mod=navigation::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="dropwon Activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="dropwon Desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
