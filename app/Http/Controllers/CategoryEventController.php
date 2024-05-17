<?php

namespace App\Http\Controllers;

use App\Models\CategoryEvent;
use Illuminate\Http\Request;

class CategoryEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $vv=module::all()->where('dimunitif','=','groupe')->first();
        $categoryevent=CategoryEvent::all();
        // $modES=module::all()->where('dimunitif','=','groupe')->first();
        $categoryevent_count=CategoryEvent::all()->count();
        // $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();
        return view('Espace-Admin.type_event.index',compact('categoryevent','categoryevent_count'));
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
            'nom_event'=>'required|string'



    ]);


    $save= new CategoryEvent;
    $save->nom =$request->nom_event;

    if($request->detail==null){
        $save->detail=" ";
    }else{
        $save->detail=$request->detail;
    }


    $save->etat=0;

    $save->save();
    return BACK()->with('message',"Category event enregistre !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryEvent  $categoryEvent
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryEvent $categoryEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryEvent  $categoryEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryEvent $categoryEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryEvent  $categoryEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateDate=$request->validate([
            'nom_event'=>'required|string',



    ]);


    $save= CategoryEvent::find($request->id);
    $save->nom =$request->nom_event;

    if($request->detail==null){
        $save->detail=$request->detail2;
    }else{
        $save->detail=$request->detail;
    }



    $save->update();
    return BACK()->with('message',"Modification reussi !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryEvent  $categoryEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request,$id)
    {
        $des=CategoryEvent::findOrFail($request->id_f);
        $des->delete();
            return BACK()->with("message","Suppression reussi");
    }

    public function state(Request $request,$id)
    {
        $mod=CategoryEvent::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="categorie evenement activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="categorie evenement desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
